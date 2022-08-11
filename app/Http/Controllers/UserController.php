<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(int $id = null)
    {
        try {
            $user = User::find($id);          
        } catch (Exception $e) {
            return "No such user (" . $id . ")";
        }

        return view('index', compact('user'));
    }
}
