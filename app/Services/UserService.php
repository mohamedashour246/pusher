<?php


namespace App\Services;


use App\Models\User;

class UserService
{
    public function getUser($user_id)
    {
        return User::where('id',$user_id)->first();
    }

    public function createUser($data)
    {

    }
}
