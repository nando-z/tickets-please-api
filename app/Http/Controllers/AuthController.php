<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiLoginRequest as LoginRequest;
use App\Http\Requests\ApiRegisterRequest as RegisterRequest;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use \App\Traits\ApiResponses;
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

        return $this->success(
            'User created successfully',
            [
                'user' => $user,
                'token' => $token,
            ],

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

            return $this->error(
                'Invalid credentials',
                [
                    'password' => ['The provided credentials are incorrect.'],
                    'email' => ['The provided credentials are incorrect.'],
                ],
                401
            );
        }
        // If the user is found and the password is correct, create a new token for the user
        // and return it in the response
        $user = User::firstWhere('email', $request->get('email'));



        return $this->ok(
            'Authenticated',
            [
                'user' => $user,
                'token' => $user->createToken('API TOKEN FOR ' . $user->email)->plainTextToken,
            ]
        );
    }

    public function logout(Request $request)
    {
        // Revoke the token that was used to authenticate the request
        $request->user()->currentAccessToken()->delete();

        return $this->ok('Logged out successfully');
    }
}
