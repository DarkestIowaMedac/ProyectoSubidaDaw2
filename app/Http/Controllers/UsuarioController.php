<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function idUsuario()
    {
        $user = Auth::user();
        
        if (!$user) {
            return response()->json(['error' => 'No autenticado'], 401);
        }
        
        return response()->json(['user_id' => $user->id]);
    }
}

