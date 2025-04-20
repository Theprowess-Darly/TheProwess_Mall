<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);
     
        $user = User::where('email', $request->email)->first();
     
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Les informations fournies sont incorrectes.'],
            ]);
        }
     
        // Attribution des capacités en fonction du rôle
        $abilities = [];
        switch ($user->role) {
            case 'admin':
                $abilities = ['admin'];
                break;
            case 'vendor':
                $abilities = ['vendor'];
                break;
            case 'customer':
                $abilities = ['customer'];
                break;
            case 'delivery':
                $abilities = ['delivery'];
                break;
        }
     
        return response()->json([
            'token' => $user->createToken($request->device_name, $abilities)->plainTextToken,
            'user' => $user
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        
        return response()->json(['message' => 'Déconnexion réussie']);
    }
    
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}