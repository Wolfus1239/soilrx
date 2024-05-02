<?php

namespace app\Service\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;

class RegisterService
{
    public function store($data)
    {
        $user = User::create($data);
        event(new Registered($user));
    }
}
