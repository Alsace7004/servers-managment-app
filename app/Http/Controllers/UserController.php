<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //

    public function index(){
        $users = User::query()->select('id','name','email','created_at');
        return response()->json([
            'status'=>true,
            'users'=>$users->paginate(3),
        ]);
    }
    public function store(Request $request){
        $data = $request->only(['name','email','password']);
        $validator = Validator::make($data,[
            'name'=>'required|string|min:2|max:100',
            'email'=>'required|email|unique:users',
            'password'=>'required|string|min:8',
        ],[
            'name.required'=>'Ce champ est obligatoire',
            'name.string'=>'Veuillez entrer des chaines de caractère',
            'name.min'=>'Trop court...',
            'name.max'=>'Trop long...',
            'email.required'=>'Ce champ est obligatoire',
            'email.email'=>'Veuillez entrer une adresse mail valide',
            'email.unique'=>'Mail déjà utilisé.',
            'password.required'=>'Ce champ est obligatoire',
            'password.string'=>'Veuillez entrer des chaines de caractère',
            'password.min'=>'Trop court...',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        if($user->save()){
            return ['status'=>true];
        }
        return ['status'=>false];
    }
}
