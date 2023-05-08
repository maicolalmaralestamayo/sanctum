<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registrar(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return $user;
    }

    public function tokenizar(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            
        }

        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken($request->dispositivo);
            return $token->plainTextToken;
        }else {
            return 'problemas de usuario y contraseña';
        }
    }

    public function revocar($id_token)
    {
        $user = User::find(1);
        $user->tokens()->where('id', $id_token)->delete();
        // return 
    }
}

// 