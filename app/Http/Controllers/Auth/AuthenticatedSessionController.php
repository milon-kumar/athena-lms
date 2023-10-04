<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        $title = "Login";
        return view('auth.user_Login',compact('title'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {

        $request->authenticate();

        $request->session()->regenerate();


        //return redirect()->intended(RouteServiceProvider::HOME);
        if (auth()->check() && auth()->user()->type == 'super_admin' || auth()->user()->type == 'admin'){
            toast('Login Successfully... :)','success');
            return  redirect()->route('admin.dashboard');
        }elseif (auth()->check() && auth()->user()->type == 'student'){
            toast('Login Successfully... :)','success');
            return redirect()->route('student.dashboard');
        }else{
            toast('Access Denied......:(','error');
            return redirect()->route('frontend.home');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        toast('Logout Successfully... :)','success');
        return redirect('/');
    }
}
