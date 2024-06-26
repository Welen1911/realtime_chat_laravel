<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id', '<>', auth()->user()->id)->get();
        return $users;
    }

    public function me()
    {
        $user = auth()->user();

        return $user;
    }
}
