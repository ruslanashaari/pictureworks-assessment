<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
