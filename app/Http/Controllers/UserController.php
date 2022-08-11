<?php

namespace App\Http\Controllers;

use DB;
use Hash;
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
            return response("No such user (" . $id . ")", 404); 
        }

        return view('index', compact('user'));
    }

    public function store(UserPostRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = User::find($request->id);

            if (!$user) {
                return response("No such user (" . $request->id . ")", 404); 
            }

            if (!Hash::check($request->password, $user->password)) {
                return response('Invalid password', 401);
            }

            $user->appendComments($request->comments);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            return abort(500, 'Could not update database: ' . $e->getMessage());
        }

        return response('OK', 200);
    }
}
