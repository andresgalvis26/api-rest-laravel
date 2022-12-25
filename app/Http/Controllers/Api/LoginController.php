<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User; // Importar modelo para inicar sesión invocar esto
use Illuminate\Support\Facades\Auth; // Clase para manejar la autenticación proporcionado por Laravel

class LoginController extends Controller
{
    public function login(Request $request) 
    {
        $this->validateLogin($request);

        if (Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'token' => $request->user()->createToken($request->name)->plainTextToken,
                'message' => 'Success'
            ]);
        }

        return response()->json([
            'message' => 'Unauthorized'
        ], 401);
    }

    public function validateLogin(Request $request)
    {
        return $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required' // Desde donde se conecta el usuario
        ]);
    }
}
