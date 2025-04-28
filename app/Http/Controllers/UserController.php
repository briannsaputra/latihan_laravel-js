<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $user = 'ben';
        return Inertia('User/All', [
            'user' => $user
        ]);
    }
}
