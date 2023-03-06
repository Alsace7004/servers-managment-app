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
        //if(Auth::guard('web')->attempt($data) || Auth::guard('staffs')->attempt($data)){
        if(Auth::guard('web')->attempt($data)){
            $request->session()->regenerate();
            return response()->json([
                'status'=>true,
                'user_role'=>Auth::guard('web')->user()->roles->pluck('name'),
                'user_permission'=>Auth::guard('web')->user()->getPermissionsViaRoles()->pluck('name'),
                'user'=>Auth::guard('web')->user(),
                'access_token'=>Auth::guard('web')->user()->createToken("Token")->plainTextToken
            ]);
        }else if(Auth::guard('staffs')->attempt($data)){
                $request->session()->regenerate();
                return response()->json([
                    'status'=>true,
                    'user_role'=>Auth::guard('staffs')->user()->roles->pluck('name'),
                    'user_permission'=>Auth::guard('staffs')->user()->getPermissionsViaRoles()->pluck('name'),
                    'user'=>Auth::guard('staffs')->user(),
                    'access_token'=>Auth::guard('staffs')->user()->createToken("Token")->plainTextToken
                    //'access_token'=>auth()->user()->createToken('authToken')->accessToken
                ]);
        }else{
            /* return response()->json([
                'status'=>false,
                'message'=>"je suis le else"
            ]); */
            return response()->json([
                'status'=>false,
                'message'=>'Email ou mot de passe incorrecte'
            ],Response::HTTP_UNAUTHORIZED);
        }
        
    }
    //StaffLogin
    public function staffLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Auth::guard('staff')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return response()->json([
                'message'=>'je suis connecté en tant que staff',
                'user'=>auth()->user()
            ]);
        }
        return response()->json([
            'status'=>false,
            'message'=>'Email ou mot de passe incorrecte pour le staffeur'
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
        //Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
        return ['status'=>true];

        /* if($request->user()->tokens()->delete()){
            return ['status'=>true];
        }
        return ['status'=>false]; */
    }

}
