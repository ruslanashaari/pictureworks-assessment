<?php

namespace App\Http\Controllers;

use DB;
use Exception;
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
        try {
            DB::beginTransaction();

            $user = User::find($request->id);

            if (!$user) {
                return "No such user (" . $request->id . ")";         
            }

            $user->appendComments($request->comments);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            return abort(500, 'Could not update database: ' . $e->getMessage());
        }

        return view('index', compact('user'));
    }
}
