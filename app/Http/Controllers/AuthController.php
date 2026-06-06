<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return $this->redirectByRole(Auth::user());
        }
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        if (Auth::check()) {
            return $this->redirectByRole(Auth::user());
        }
        return view('auth.register');
    }

    public function login(Request $request)
    {
        if (Auth::check()) {
            return $this->redirectByRole(Auth::user());
        }

        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->intended(route('dashboard'))
                    ->with('success', 'Login berhasil! Selamat datang, ' . $user->name . '.');
            } elseif ($user->role === 'user') {
                return redirect()->intended(route('user.dashboard'))
                    ->with('success', 'Login berhasil! Selamat datang, ' . $user->name . '.');
            }

            // Role tidak dikenal
            Auth::logout();
            return back()->withErrors([
                'email' => 'Akun Anda tidak memiliki akses. Hubungi administrator.',
            ]);
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function register(Request $request)
    {
        if (Auth::check()) {
            return $this->redirectByRole(Auth::user());
        }

        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role'     => 'nullable|in:admin,user',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Jika tidak ada admin sama sekali di DB, bisa daftar sebagai admin.
            // Selain itu, registrasi publik default ke role 'user'.
            $roleDefault = User::where('role', 'admin')->exists() ? 'user' : 'admin';

            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'role'     => $roleDefault,
            ]);

            Auth::login($user);

            return $this->redirectByRole($user)
                ->with('success', 'Registrasi berhasil! Selamat datang, ' . $user->name . '.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal melakukan registrasi: ' . $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')
            ->with('success', 'Anda telah berhasil logout.');
    }

    // =========================================================
    //  HELPER
    // =========================================================

    /**
     * Redirect berdasarkan role user yang sedang login.
     */
    private function redirectByRole(User $user): \Illuminate\Http\RedirectResponse
    {
        return match ($user->role) {
            'admin' => redirect()->route('dashboard'),
            'user'  => redirect()->route('user.dashboard'),
            default => redirect('/login'),
        };
    }
}