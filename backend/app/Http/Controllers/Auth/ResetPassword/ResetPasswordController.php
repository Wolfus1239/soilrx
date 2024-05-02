<?php

namespace App\Http\Controllers\Auth\ResetPassword;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPassword\StoreRequest;
use App\Service\Auth\ResetPasswordService;

class ResetPasswordController extends Controller
{
    public function resetPassword(StoreRequest $request)
    {
        $data=$request->validated();
        $status = (new ResetPasswordService)->reset($data);
        return response()->json($status, 200);
}
}
