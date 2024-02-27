<?php

namespace Pshenichniyinfo\AdminPanel\Http\Controllers\Auth;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pshenichniyinfo\AdminPanel\Http\Controllers\Controller;
use Pshenichniyinfo\AdminPanel\Http\Middleware\AuthenticatesAdmin;
use Pshenichniyinfo\AdminPanel\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function login(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin-panel::auth.pages.login');
    }

    public function auth(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            return redirect()->route('admin.dashboard')
                ->with('You have Successfully loggedin');
        }

        return redirect("admin.login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
