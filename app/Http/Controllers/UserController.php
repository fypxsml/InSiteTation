<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('dashboard.user.search', compact('users'));
    }

    public function show($id)
    {
        $user = User::where('staffID', '=', $id)->first();

        return view('dashboard.user.detail', compact('user'));
    }
}
