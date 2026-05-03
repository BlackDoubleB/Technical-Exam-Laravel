<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
     function register(RegisterRequest $request){
       $data = $request->validated();
       $user = User::create($data);
  
       return response()->json([
        'message' => 'User register',
        'user' => $user
    ]);
    }

    public function login(LoginRequest $request)
    {
        // 1. Validar datos
        $credentials = $request->validated();

        // 2. Intentar autenticación
        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => ['Las credenciales son incorrectas.'],
            ]);
        }

        // 3. Obtener usuario autenticado
        $user = $request->user();

        // borrar tokens anteriores
        $user->tokens()->delete();

        // 4. Crear token 
        $token = $user->createToken('auth_token')->plainTextToken;

        // 5. Respuesta
        return response()->json([
            'message' => 'Login correcto',
            'token' => $token,
            'user' => $user,
        ]);
    }
}
