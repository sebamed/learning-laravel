<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;

use Validator;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->only(['email', 'password']);

        if(Auth::attempt($credentials)) {
            $user = Auth::user();
            $success['token'] = $user->createToken('secret', ['*'])->accessToken;
            return response()->json(['success' => $success], 200);
        } else {
            return response()->json(['error' => 'Bad credentials'], 401);
        }
    }

    public function register(Request $request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $user->sendEmailVerificationNotification();

        $success['name'] = $user->name;
        return response()->json(['success' => $success], 201);
    }
}
