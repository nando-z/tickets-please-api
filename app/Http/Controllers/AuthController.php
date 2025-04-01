<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiLoginRequest as LoginRequest;
use App\Http\Requests\ApiRegisterRequest as RegisterRequest;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Register a new user
    public function register(RegisterRequest $request)
    {
        $user = User::create(
            $request->only('name', 'email', 'password') + [
                'email_verified_at' => now(),
                'remember_token' => $request->get('remember_token'),
            ]
        );

        // Create a token for the user after creation
        $token = $user->createToken('API TOKEN FOR ' . $user->email)->plainTextToken;

        return response()->json(
            [
                'message' => 'User created successfully',
                'user' => $user,
                'status' => 201,
                'token' => $token,
            ],
            201
        );
    }


    // Login a user
    public function login(LoginRequest $request)
    {
        // Validate the request
        $request->validated(
            $request->all()
        );
        // and return it in the response
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(
                [
                    'message' => 'Invalid credentials',
                    'errors' => [
                        'password' => ['The provided credentials are incorrect.'],
                        'email' => ['The provided credentials are incorrect.'],
                    ],
                    'status' => 401,
                ],
                401
            );
        }
        // If the user is found and the password is correct, create a new token for the user
        // and return it in the response
        $user = User::firstWhere('email', $request->get('email'));

        return response()->json(
            [
                'user' => $user,
                'message' => 'Authenticated',
                'token' => $user->createToken('API TOKEN FOR ' . $user->email)->plainTextToken,
            ],
            200
        );
    }
}
