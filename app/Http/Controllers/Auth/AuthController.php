<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected function setLocale()
    {
        $locale = Session::get('locale', 'en');
        App::setLocale($locale);
        return $locale;
    }

    public function showRegister()
    {
        $this->setLocale();
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->setLocale();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('/');
    }

    public function showLogin()
    {
        $this->setLocale();
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->setLocale();
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => $request->session()->get('locale') === 'ar' ? 'بيانات الاعتماد المقدمة لا تطابق سجلاتنا.' : 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
