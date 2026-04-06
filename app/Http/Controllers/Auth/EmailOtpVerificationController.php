<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserReferred;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmailOtpVerificationController extends Controller
{
    public function verify(Request $request)
    {
        $request->validate([
            'code' => ['required', 'string'],
        ]);

        $user = $request->user();

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('user.dashboard');
        }

        if (! $user->email_otp || ! $user->email_otp_expires_at || $user->email_otp_expires_at->isPast()) {
            return back()->withErrors(['code' => __('The verification code is expired. Please request a new one.')]);
        }

        if (! Hash::check((string) $request->get('code'), (string) $user->email_otp)) {
            return back()->withErrors(['code' => __('The verification code is invalid.')]);
        }

        if ($user->markEmailAsVerified()) {
            $user->clearEmailOtp();
            event(new Verified($user));
            event(new UserReferred($request->cookie('invite'), $user));
        }

        return redirect()->route('user.dashboard');
    }
}
