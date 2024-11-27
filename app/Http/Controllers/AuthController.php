<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function login(Request $request)
    {    

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password))
        {
            throw ValidationException::withMessages([
                'email' => ['The provide credential are incorrect'],
            ]);
        }

        $user->tokens()->delete();
        return $user->createToken("token_api")->plainTextToken;       
    }

    public function logout(){
        $user = auth()->user();
        $user->tokens()->delete();

        return response()->json([
            'message' => 'logout successfully'
        ], 200);
    }

    public function me(){
        return response(['data' => auth()->user()]);
    }
}
