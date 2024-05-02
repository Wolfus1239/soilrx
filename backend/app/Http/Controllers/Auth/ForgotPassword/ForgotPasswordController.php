<?php

namespace App\Http\Controllers\Auth\ForgotPassword;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPassword\StoreRequest;
use App\Service\Auth\ForgotPasswordService;

class ForgotPasswordController extends Controller
{
    public function forgotPassword(StoreRequest $request)
    {
        $data=$request->validated();
        $status = (new ForgotPasswordService)->sendResetLink($data);
        return response()->json($status, 200);
}
}
