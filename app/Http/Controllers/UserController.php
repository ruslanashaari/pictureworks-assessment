<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserPostRequest;

class UserController extends Controller
{
    public function index(int $id)
    {
        $user = User::find($id);

        if (!$user) {
            return "No such user (" . $id . ")";         
        }

        return view('index', compact('user'));
    }

    public function store(UserPostRequest $request)
    {
        $user = User::find($request->id);

        if (!$user) {
            return "No such user (" . $id . ")";         
        }

        $user->appendComments($request->comments);

        return view('index', compact('user'));
    }
}
