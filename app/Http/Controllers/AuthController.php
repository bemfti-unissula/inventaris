<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\CreateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use stdClass;

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

        // Login user setelah registrasi
        Auth::login($user);

        // Redirect ke halaman dashboard dengan pesan
        return redirect()->route('inventaris')
            ->with('success', 'Registrasi berhasil!');
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login.page')
            ->with('status', 'Password berhasil direset! Silakan login dengan password baru.');
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
}
