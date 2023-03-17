<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
     public function login(Request $request)
    {

        $credentials = $request->only(['email', 'password']);

        if(Auth::attempt($credentials))
        {
            $token = $request->user()->createToken('auth_token')->plainTextToken;
            return $this->respondWithToken($token);
        }
        return response()->json([
            'error' => true
        ]);
    }
     protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer'
        ]);
    }

    public function register() {
        $validator = Validator::make(request()->all(), [
            "name" => 'required',
                "email" => 'required|email|unique:users',
                "password" => 'required',
                "status" => 'required',
                "level" => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Error Gagal Register']);
        }

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'status' => request('status'),
            'level' => request('level'),
        ]);

        if ($user) {
            return response()->json(['message' => 'Berhasil daftar']);
        } else {
            return response()->json(['message' => 'Error Gagal Register']);
        }
        
    }
}
