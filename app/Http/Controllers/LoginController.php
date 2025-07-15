<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
   public function login(Request $request){
    //dd($request-> all());
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);
    $user = User::where('email', $request->email)->first();
    if($user){
        if(Hash::check($request->password, $user->password)){
            Auth::login($user);
           switch($user->role){
               case 'admin':

                   return redirect()->intended('site.settings');
               default:
                   return redirect()->intended('');
              
           }
    }
   }
}
}

   
