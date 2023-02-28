<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;


class AuthController extends Controller
{
    //
    //login
    public function login(request $request){
        $data = $request->only('email','password');
        $validator = Validator::make($data,[
            'email'=>'required|email',
            'password'=>'required|min:8'
        ],[
            'email.required'    =>'Veuillez remplir ce champ',
            'email.email'       =>'Veuillez entrer une adresse email valide',
            'password.required' =>'Veuillez remplir ce champ',
            'password.min'      =>'Trop court',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
        if(auth()->attempt($data)){
            $request->session()->regenerate();
            return response()->json([
                'status'=>true,
                'user_role'=>auth()->user()->roles->pluck('name'),
                'user_permission'=>Auth::user()->getPermissionsViaRoles()->pluck('name'),
                'user'=>auth()->user(),
                'access_token'=>auth()->user()->createToken("Token")->plainTextToken
                //'access_token'=>auth()->user()->createToken('authToken')->accessToken
            ]);
        }
        return response()->json([
            'status'=>false,
            'message'=>'Email ou mot de passe incorrecte'
        ],Response::HTTP_UNAUTHORIZED);
    }
    //register
    public function register(){

    }
    //logout
    public function logout(Request $request)
    {
        //auth()->user()->token()->delete()
        //dd(Auth::user());
        //dd($request->user()->tokens()->delete());
        //dd(auth()->user()->tokens()->delete());
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
        return ['status'=>true];

        /* if($request->user()->tokens()->delete()){
            return ['status'=>true];
        }
        return ['status'=>false]; */
    }

}
