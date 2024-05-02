<?php

namespace App\Http\Controllers\Auth\VerifyEmail;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\VerifiesEmails;
class VerifyEmailController extends Controller
{
    use VerifiesEmails;
    public function verify(Request $request)
    {
        $id = $request->route('id');
        $expires = $request->query('expires');
        $hash = $request->query('hash');
        $user = User::find($id);

        if (!$user || !hash_equals($hash, sha1($user->getEmailForVerification())) || (int) $expires < time()) {
            return response()->json(['error' => 'This link is not trusted'], 403);
        }

        $user->markEmailAsVerified();

        return redirect('https://soilrx.abdrashitov-academy.ru/login');
    }
}
