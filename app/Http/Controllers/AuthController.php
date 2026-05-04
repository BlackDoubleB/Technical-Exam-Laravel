<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
{
    $credentials = $request->validated();

    if (!Auth::attempt($credentials)) {
        return response()->json([
            'message' => 'Credenciales incorrectas'
        ], 401);
    }

    $user = $request->user();

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'token' => $token
    ]);
}
}
