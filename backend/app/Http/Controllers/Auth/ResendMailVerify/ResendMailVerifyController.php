<?php

namespace App\Http\Controllers\Auth\ResendMailVerify;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ResendMailVerifyController extends Controller
{
    public function resend(Request $request)
    {
        $user_email = $request->input('email');

        $user_db = User::where('email', $user_email)->first();

        if ($user_db === null) {
            return response('Email not find', 400);
        }

        if ($user_db->email_verified_at !==  null) {
            return response('Email already verified', 400);
        }

        $user_db->sendEmailVerificationNotification();
        return response('Email not verified, Email verification link has been resent to your email', '200');
    }
}

