<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\User;
use App\Mail\Register;
use App\Mail\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\CreateRequest;
use App\Http\Requests\Auth\InputEmail;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('contacts.email', $credentials['email'])->first();

        if (!$user->email_verified_at) {
            $token = JWTAuth::getJWTProvider()->encode([
                'user_id' => $user->_id,
                'purpose' => 'email_verification',
                'exp' => now()->addMinutes(30)->timestamp,
                'iat' => now()->timestamp
            ]);

            Mail::to($user->contacts['email'])->send(new Register($token));

            return redirect()->route('email.sent')
                ->with('email', $user->contacts['email'])
                ->with('success', 'Email verifikasi telah dikirim ulang');
        }

        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Jika cocok, login-kan user secara manual
            Auth::login($user, $request->has('remember'));
            // Regenerasi session untuk keamanan
            $request->session()->regenerate();
            // Redirect ke halaman yang dituju
            return redirect()->route('inventaris');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register()
    {
        return view('auth.register');
    }
    public function create(CreateRequest $request)
    {
        $contacts = new stdClass;
        $contacts->email = $request->validated('email');
        $contacts->phone = $request->validated('phone');

        $user = new user();
        $user->name = $request->validated('name');
        $user->contacts = $contacts;
        $user->fakultas = $request->validated('fakultas');
        $user->role = 'user'; // Atur role default sebagai user
        $user->password = Hash::make($request->validated('password'));
        $user->terms = $request->validated('terms');
        $user->save();

        // Buat token verifikasi email dengan ekspirasi 30 menit
        $payload = [
            'user_id' => $user->_id,
            'purpose' => 'email_verification',
            'exp' => now()->addMinutes(30)->timestamp,
            'iat' => now()->timestamp
        ];

        $token = JWTAuth::getJWTProvider()->encode($payload);
        Mail::to($user->contacts->email)->send(new Register($token));

        // Redirect ke halaman email sent notification
        return redirect()->route('email.sent')
            ->with('email', $user->contacts->email)
            ->with('success', 'Email verifikasi telah dikirim ulang');
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        // Validasi email
        $request->validate([
            'email' => 'required|email'
        ]);

        // Cari user berdasarkan email
        $user = User::where('contacts.email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan.']);
        }

        // Buat token reset password dengan ekspirasi 30 menit
        $payload = [
            'user_id' => $user->_id,
            'email' => $user->contacts['email'],
            'purpose' => 'password_reset',
            'exp' => now()->addMinutes(30)->timestamp,
            'iat' => now()->timestamp
        ];

        $token = JWTAuth::getJWTProvider()->encode($payload);

        // Kirim email reset password
        Mail::to($user->contacts['email'])->send(new ResetPassword($token));

        return back()->with('success', 'Link reset password telah dikirim ke email Anda. Silakan cek email (termasuk folder SPAM).');
    }

    public function showResetForm(Request $request)
    {
        $token = $request->query('token');

        if (!$token) {
            return redirect()->route('password.request')
                ->with('error', 'Token reset password tidak valid.');
        }

        return view('auth.reset-password')->with('token', $token);
    }

    public function resetPassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'token' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        try {
            // Decode token
            $payload = JWTAuth::getJWTProvider()->decode($request->token);

            // Validasi payload
            if (
                !isset($payload['user_id']) ||
                !isset($payload['purpose']) ||
                $payload['purpose'] !== 'password_reset'
            ) {
                throw new \Exception('Token tidak valid untuk reset password');
            }

            // Cek ekspirasi
            if (isset($payload['exp']) && $payload['exp'] < now()->timestamp) {
                throw new \Exception('Token sudah expired');
            }

            // Cari user dan update password
            $user = User::find($payload['user_id']);
            if (!$user) {
                throw new \Exception('User tidak ditemukan');
            }

            // Update password
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('login.page')
                ->with('success', 'Password berhasil direset! Silakan login dengan password baru.');
        } catch (\Exception $e) {
            return back()->with('error', 'Token reset password tidak valid atau sudah expired. ' . $e->getMessage());
        }
    }

    /**
     * Display the user's profile form.
     */
    public function profile(Request $request)
    {
        return view('auth.profile', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'fakultas' => ['nullable', 'string', 'max:255'],
        ]);

        $user = Auth::user();

        // Update contacts object
        $contacts = new stdClass;
        $contacts->email = $request->email;
        $contacts->phone = $request->phone;

        $user->name = $request->name;
        $user->password = $user->password; // Keep existing password
        $user->contacts = $contacts;
        $user->fakultas = $request->fakultas;
        $user->save();

        return redirect()->route('profile.edit')->with('status', 'Profile berhasil diperbarui!');
    }

    /**
     * Update the user's password.
     */
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        // Check current password
        if (!Hash::check($validated['current_password'], $request->user()->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak benar.']);
        }

        $user = $request->user();

        $user->password = Hash::make($validated['password']);

        $user->save();

        return redirect()->route('profile.edit')->with('status', 'Password berhasil diperbarui!');
    }

    /**
     * Verify email dengan JWT token
     */
    public function verifyEmail(Request $request)
    {
        $token = $request->query('token');

        if (!$token) {
            return redirect()->route('login.page')
                ->with('error', 'Token verifikasi tidak valid.');
        }

        try {
            // Decode token
            $payload = JWTAuth::getJWTProvider()->decode($token);

            // Validasi payload
            if (
                !isset($payload['user_id']) ||
                !isset($payload['purpose']) ||
                $payload['purpose'] !== 'email_verification'
            ) {
                throw new \Exception('Token tidak valid untuk verifikasi email');
            }

            // Cek ekspirasi
            if (isset($payload['exp']) && $payload['exp'] < now()->timestamp) {
                throw new \Exception('Token sudah expired');
            }

            // Cari user dan verifikasi email
            $user = User::find($payload['user_id']);
            if (!$user) {
                throw new \Exception('User tidak ditemukan');
            }

            // Update email_verified_at
            $user->email_verified_at = now();
            $user->save();

            // Redirect ke halaman dashboard dengan pesan sukses
            return redirect()->route('inventaris')
                ->with('success', 'Email berhasil diverifikasi!');
        } catch (\Exception $e) {
            return redirect()->route('login.page')
                ->with('error', 'Token verifikasi tidak valid atau sudah expired. ' . $e->getMessage());
        }
    }

    /**
     * Halaman notifikasi email verifikasi sudah dikirim
     */
    public function emailSent()
    {
        // Jika tidak ada email di session, redirect ke login
        if (!session('email')) {
            return redirect()->route('login.page');
        }

        return view('auth.email-sent');
    }

    /**
     * Kirim ulang email verifikasi
     */
    public function resendVerificationEmail(Request $request)
    {
        $email = $request->query('email');

        if (!$email) {
            return redirect()->route('login.page')
                ->with('error', 'Email tidak valid.');
        }

        // Validasi email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->route('login.page')
                ->with('error', 'Format email tidak valid.');
        }

        $user = User::where('contacts.email', $email)->first();

        if (!$user) {
            return redirect()->route('login.page')
                ->with('error', 'Email tidak terdaftar.');
        }

        if ($user->email_verified_at) {
            return redirect()->route('login.page')
                ->with('success', 'Email sudah terverifikasi');
        }

        // Buat token verifikasi email baru
        $payload = [
            'user_id' => $user->_id,
            'purpose' => 'email_verification',
            'exp' => now()->addMinutes(30)->timestamp,
            'iat' => now()->timestamp
        ];

        $token = JWTAuth::getJWTProvider()->encode($payload);
        Mail::to($email)->send(new Register($token));

        return redirect()->route('email.sent')
            ->with('email', $email)
            ->with('success', 'Email verifikasi telah dikirim ulang');
    }
}
