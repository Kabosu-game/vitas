<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmailOtpController extends Controller
{
    public function resend(Request $request)
    {
        if (! setting('email_verification', 'permission')) {
            return response()->json([
                'status' => false,
                'message' => 'Email verification is disabled',
            ], 404);
        }

        $request->validate([
            'email' => ['required', 'string'],
        ]);

        $email = (string) $request->get('email');
        $column = filter_var($email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $user = User::where($column, $email)->first();

        if (! $user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found',
            ], 404);
        }

        if ($user->hasVerifiedEmail()) {
            return response()->json([
                'status' => true,
                'message' => 'Email already verified',
            ]);
        }

        $user->sendEmailVerificationNotification();

        return response()->json([
            'status' => true,
            'message' => 'Verification code sent successfully',
        ]);
    }

    public function verify(Request $request)
    {
        if (! setting('email_verification', 'permission')) {
            return response()->json([
                'status' => false,
                'message' => 'Email verification is disabled',
            ], 404);
        }

        $request->validate([
            'email' => ['required', 'string'],
            'code' => ['required', 'string'],
        ]);

        $email = (string) $request->get('email');
        $column = filter_var($email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $user = User::where($column, $email)->first();

        if (! $user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found',
            ], 404);
        }

        if ($user->hasVerifiedEmail()) {
            return response()->json([
                'status' => true,
                'message' => 'Email already verified',
                'token' => $user->createToken('auth_token')->plainTextToken,
            ]);
        }

        if (! $user->email_otp || ! $user->email_otp_expires_at || $user->email_otp_expires_at->isPast()) {
            return response()->json([
                'status' => false,
                'message' => 'The verification code is expired',
            ], 422);
        }

        if (! Hash::check((string) $request->get('code'), (string) $user->email_otp)) {
            return response()->json([
                'status' => false,
                'message' => 'The verification code is invalid',
            ], 422);
        }

        if ($user->markEmailAsVerified()) {
            $user->clearEmailOtp();
            event(new Verified($user));
        }

        return response()->json([
            'status' => true,
            'message' => 'Email verified successfully',
            'token' => $user->createToken('auth_token')->plainTextToken,
        ]);
    }
}
