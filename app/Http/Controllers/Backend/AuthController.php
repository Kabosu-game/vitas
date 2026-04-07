<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * @return Application|Factory|View
     */
    public function loginView()
    {
        return view('backend.auth.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @return RedirectResponse
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $attemptResult = $this->guard()->attempt($credentials);
        Log::info('Admin login attempt', ['email' => $credentials['email'], 'result' => $attemptResult]);
        if ($attemptResult) {
            $request->session()->regenerate();

            return redirect()->intended('admin');
        }

        notify()->warning(__('The provided credentials do not match our records.'));

        return back();
    }

    /**
     * @return Guard|StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
