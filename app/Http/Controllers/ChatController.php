<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function chatForm($user_id,UserService $userService)
    {
        $receiver = $userService->getUser($user_id);
    }
}
