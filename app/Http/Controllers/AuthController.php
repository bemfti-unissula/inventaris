<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\CreateRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
        
        if ($user && Hash::check($credentials['password'], $user->contacts['password'])) {
            // Jika cocok, login-kan user secara manual
            Auth::login($user, $request->has('remember'));
            // Regenerasi session untuk keamanan
            $request->session()->regenerate();
            // Redirect ke halaman yang dituju
            return redirect()->route('dashboard');
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
        $user->role = 'user'; // Atur role default sebagai user
        $user->password = Hash::make($request->validated('password'));
        $user->terms = $request->validated('terms');
        $user->save();

        // Login user setelah registrasi
        Auth::login($user);

        // Redirect ke halaman dashboard dengan pesan
        return redirect()->route('dashboard')
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
}
