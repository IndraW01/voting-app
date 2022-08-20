<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return response()->view('auth.login');
    }

    public function store(LoginRequest $loginRequest)
    {
        $validateLogin = $loginRequest->validated();

        if(Auth::attempt($validateLogin)) {
            $loginRequest->session()->regenerate();

            return redirect()->intended(route('dashboard.voting'));
        }

        return back()->withErrors(['failed' => 'Login Anda Gagal'])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login.create');
    }
}
