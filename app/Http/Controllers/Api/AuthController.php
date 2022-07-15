<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function createUser(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ];

        $this->validate($request, $rules);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $data['verified'] = User::UNVERIFIED_USER;
        $data['verified_token'] = User::generateVerificationCode();
        $data['admin'] = User::REGULAR_USER;

        $user = User::create($data);

        $token = $user->createToken('sanctum-api-token')->plainTextToken;

        return response()->json([
            'status' => 201,
            'message' => 'User Created Successfully',
            'token' => $token
        ]);
    }

    public function loginUser(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $this->validate($request, $rules);

        if(!Auth()->attempt($request->only(['email', 'password']))) {
            return response()->json([
                'status' => 401,
                'message' => 'Email & password does not match with our record.'
            ]);
        } 

        $user = User::where('email', $request->email)->first();

        $token = $user->createToken('sanctum-api-token')->plainTextToken;

        return response()->json([
            'status' => 201,
            'message' => 'User Loggged In Successfully',
            'token' => $token
        ]);
    }
}
