<?php

namespace App\Http\Controllers;

use App\Models\Outil;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class OutilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $length      = $request->input('length');
        $searchValue = $request->input('search');
        //
        $outils = Outil::join('type_outils','outils.type_outil_id','type_outils.id')
                        ->select('outils.id','outils.name as nom_outil','outils.username','outils.url','type_outils.name as nom_type_outil','outils.created_at')
                        ->where('outils.is_deleted',false)
                        ->orderBy('outils.id','desc');
        //
                        if($searchValue){
                            $outils->where(function($query) use($searchValue){
                                $query->where('outils.name','like',"%".$searchValue."%");
                                $query->orWhere('username','like',"%".$searchValue."%");
                                $query->orWhere('outils.url','like',"%".$searchValue."%");
                                $query->orWhere('type_outils.name','like',"%".$searchValue."%");
                            });
                        }
        //
        return response()->json([
            'status'=>true,
            'outils'=>$outils->paginate($length)
        ]);
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
        $data = $request->only(['name','username','password','url','type_outil_id']);
        //dd($data);
        $validator = Validator::make($data,[
            'name'                      =>'required|string|unique:outils|min:2|max:50',
            'username'                  =>'required|string|min:2|max:50',
            'password'                  =>'required|string|min:8',
            'url'                       =>'nullable|string|url|unique:outils|min:2|max:100',
            'type_outil_id'             =>'required|integer',
        ],[
            'name.required'             =>'Veuillez remplir ce champ',
            'name.unique'               =>'Cette valeur existe déjà',
            'name.min'                  =>'Trop court',
            'name.max'                  =>'Trop long',
            //
            'username.required'         =>'Veuillez remplir ce champ',
            'username.min'              =>'Trop court',
            'username.max'              =>'Trop long',
            //
            'password.required'         =>'Veuillez remplir ce champ',
            'password.min'              =>'Trop court',
            //
            'url.url'                   =>'Veuillez entrer une URL',
            'url.min'                   =>'Trop court',
            'url.max'                   =>'Trop long',
            'url.unique'                =>'Cette valeur existe déjà',
            //
            'type_outil_id.required'    =>'Veuillez remplir ce champ',
            'type_outil_id.integer'     =>'Veuillez remplir ce champ',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
        if(Outil::create($data)){
            return ['status'=>true];
        }
        return ['status'=>false];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outil  $outil
     * @return \Illuminate\Http\Response
     */
    public function show(Outil $outil)
    {
        //
        $outils = Outil::join('type_outils','outils.type_outil_id','type_outils.id')
                        ->select('outils.id','outils.name','outils.username','outils.url','outils.type_outil_id','outils.created_at')
                        ->where('outils.id',$outil->id)->get();
        return $outils;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outil  $outil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outil $outil)
    {
        //
        $data = $request->only(['name','username','password','url','type_outil_id']);
        $validator = Validator::make($data,[
            'name'          =>['required','string',Rule::unique('outils','name')->ignore($outil->id),'min:2','max:50'],
            'username'      =>'required|string|min:2|max:50',
            'password'      =>'nullable|string|min:8',
            'url'           =>['nullable','string',Rule::unique('outils','url')->ignore($outil->id),'url','min:2','max:100'],
            'type_outil_id' =>'required|integer',
        ],[
            'name.required'             =>'Veuillez remplir ce champ',
            'name.unique'               =>'Cette valeur existe déjà',
            'name.min'                  =>'Trop court',
            'name.max'                  =>'Trop long',
            //
            'username.required'         =>'Veuillez remplir ce champ',
            'username.min'              =>'Trop court',
            'username.max'              =>'Trop long',
            //
            //'password.required'         =>'Veuillez remplir ce champ',
            'password.min'              =>'Trop court',
            //
            //'url.required'              =>'Veuillez remplir ce champ',
            'url.url'                   =>'Veuillez entrer une URL',
            'url.min'                   =>'Trop court',
            'url.max'                   =>'Trop long',
            'url.unique'                =>'Cette valeur existe déjà',
            //
            'type_outil_id.required'    =>'Veuillez remplir ce champ',
            'type_outil_id.integer'     =>'Veuillez remplir ce champ',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
        if($outil->update($data)){
            return ['status'=>true];
        } 
        return ['status'=>false]; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outil  $outil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outil $outil)
    {
        //
        if($outil){
            $outil->is_deleted = true;
            if($outil->save()){
                return ['status'=>true];
            }
            return ['status'=>false];
        }
        return ['status'=>false];
    }
}
