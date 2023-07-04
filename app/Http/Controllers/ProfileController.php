<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        //
        $data = $request->only(['name','email','last_password','new_password']);
        $validator = Validator::make($data,[
            'name' => ['required','string','min:2','max:100',
                Rule::unique('users')->ignore($user->id)
            ],
            'email' => ['required','email',
                Rule::unique('users')->ignore($user->id)
            ],
            'last_password'     => 'required|string|min:8',
            'new_password'      => 'required|string|min:8',
        ],[
            'name.required'     =>'Veuillez remplir ce champ',
            'name.string'       =>'Veuillez entrer des chaines de caractère',
            'name.min'          =>'Trop court...',
            'name.max'          =>'Trop long...',
            'name.unique'       =>'Cette valeur existe déjà...',
            'email.required'    =>'Veuillez remplir ce champ',
            'email.email'       =>'Veuillez entrer une adresse mail valide',
            'email.unique'              =>'Mail déjà utilisé.',
            'last_password.required'    =>'Veuillez remplir ce champ...',
            'new_password.required'     =>'Veuillez remplir ce champ...',
            'last_password.min'         =>'Trop court...',
            'new_password.min'          =>'Trop court...',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }

        //on do les verifications
        if (!Hash::check($data['last_password'],$user->password)){
            return response()->json([
                'status'=>false,
                'message'=>'mot de passe incorrecte !!!'
            ]);
        }else{
            
            // going to update
            $finalPassword = bcrypt($data['new_password']);

            if($user->where('id',$user->id)->update([
                'name'=>$data['name'],
                'email'=>$data['email'],
                'password'=>$finalPassword,
            ])){
                return response()->json([
                    'status'=>true,
                    'message'=>'Mot de passe mise à jour avec succèss !!!'
                ]); 
            }
            return ['status'=>false];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
