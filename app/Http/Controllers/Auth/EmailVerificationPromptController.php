<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @return mixed
     */
    public function __invoke(Request $request)
    {

        if (! setting('email_verification', 'permission')) {
            return redirect()->route('user.dashboard');
        }

        $user = $request->user();
        if (! $user->hasVerifiedEmail()) {
            $shouldSend = ! $user->email_otp || ! $user->email_otp_expires_at || $user->email_otp_expires_at->isPast();
            if ($shouldSend) {
                $user->sendEmailVerificationNotification();
            }
        }

        return $request->user()->hasVerifiedEmail()
            ? redirect()->intended(RouteServiceProvider::HOME)
            : view('frontend::auth.verify-email');
    }
}
