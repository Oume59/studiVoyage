<?php

namespace App\Controllers;

use App\Services\ConfirmService;

class RegisterController extends Controller
{
    public function confirm($token)
    {
        if ($token) {
            $confirmService = new ConfirmService();
            $confirmService->confirm($token);
        }
    }
}
