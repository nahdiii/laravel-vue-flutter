<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class ApiLoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(
            [
                'email' => $request->email, 
                'password' => $request->password
            ]
            )) {
            $user = Auth::user();
            $token = $user->createToken('user')->accessToken;
            $data['user'] = $user;
            $data['token'] = $token;

            return response()->json([
                'success' => true, 
                'data' => $data, 
                'pesan' => 'Login Berhasil',
                'token' => $token,
            ], 200);

            // 200 itu artinya SUKSES
        }else{
            return response()->json([
                'success' => false, 
                'data' => '', 
                'pesan' => 'Login Gagal'
            ], 401);
            // 401 itu artinya error unauthorized
        }
    }
}
