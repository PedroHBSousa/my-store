<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users', ['users' => $users]);
    }

    public function show(User $user)
    {
        // $user->teams()->attach(1);
        return $user->load('teams');
        $user->posts()->create([
            'title' => 'My First Post',
            'content' => 'This is my first post content.',
        ]);

        return view('user', ['user' => $user]);
    }
}
