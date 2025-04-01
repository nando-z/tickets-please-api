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

    public function register(RegisterRequest $request)
    {
        $user = User::create(
            $request->only('name', 'email', 'password') + [
                'email_verified_at' => now(),
                'remember_token' => $request->get('remember_token'),
            ]
        );

        $token = $user->createToken('API TOKEN FOR ' . $user->email)->plainTextToken;

        return $this->success('User created successfully', [
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->error('Invalid credentials', [
                'email' => ['The provided credentials are incorrect.'],
                'password' => ['The provided credentials are incorrect.'],
            ], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('API TOKEN FOR ' . $user->email)->plainTextToken;

        return $this->ok([
            'user' => $user,
            'token' => $token,
        ], 'Login authenticated. Welcome back, ' . $user->name);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->ok('Logged out successfully');
    }
}
