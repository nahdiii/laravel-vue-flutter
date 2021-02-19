<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public $successStatus = 200;
   public function postLogin(Request $request)
    {
        $data = $request->validate([
            'email' => 'email|required',
            'password' => 'required' 
        ]);
       
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/');
        }else {
				return response()->json(['error'=>'Unauthorised'], 401);
		}
    }        
    
}
