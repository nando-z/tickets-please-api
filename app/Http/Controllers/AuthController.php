<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiLoginRequest as LoginRequest;
use App\Http\Requests\ApiRegisterRequest as RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use \App\Traits\ApiResponses;

    /**
     * Handle user registration.
     *
     * @param RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        // Create a new user
        $user = User::create($request->only('name', 'email', 'password'));

        // Generate a token for the user (1-month expiration)
        $token = $user->createToken(
            "API TOKEN FOR {$user->email}",
            ['*'],
            now()->addMonth()
        )->plainTextToken;

        // Return success response
        return $this->success('User created successfully', [
            'user' => $user,
            'token' => $token,
        ]);
    }

    /**
     * Handle user login.
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        // Attempt to authenticate the user
        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->error('Invalid credentials', [
                'email' => ['The provided credentials are incorrect.'],
                'password' => ['The provided credentials are incorrect.'],
            ], 401);
        }

        // Retrieve the authenticated user
        $user = User::where('email', $request->email , 'token' , $request->token)->first();

        // Return success response without generating a token
        return $this->ok("Login successful...",
        [
            "token"=>$user->token_get_all()
        ]);
    }

    /**
     * Handle user logout.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        // Revoke all access tokens for the user
        $request->user()->currentAccessToken()->delete();

        // Return success response
        return $this->ok('Logged out successfully.');
    }
}
