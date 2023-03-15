<?php

namespace App\Http\Controllers;

use App\Models\TypeOutil;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class TypeOutilController extends Controller
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
        $type_outils = TypeOutil::query()
        ->select('id','name','created_at')
        ->where('is_deleted',false)
        ->orderBy('id','desc');
        //
        if($searchValue){
            $type_outils->where(function($query) use($searchValue){
                $query->where('name','like',"%".$searchValue."%");
            });
        }
        //
        return response()->json([
            'status'=>true,
            'type_outils'=>$type_outils->paginate($length)
        ]);
    }
    public function getTypeOutils(){
        $type_outils = TypeOutil::query()
            ->select('id','name','created_at')
            ->where('is_deleted',false)
            ->orderBy('id','desc')
            ->get();
        return response()->json([
            'status'=>true,
            'type_outils'=>$type_outils
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
        $data = $request->only(['name']);
        $validator = Validator::make($data,[
            'name'             =>'required|min:2|max:50|unique:type_outils'
        ],[
            'name.required'    =>'veuillez remplir ce champ',
            'name.min'         =>'Trop court',
            'name.max'         =>'Trop long',
            'name.unique'      =>'Cette valeur existe déjà',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
        if(TypeOutil::create($data)){
            return ['status'=>true];
        }
        return ['status'=>false];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeOutil  $typeOutil
     * @return \Illuminate\Http\Response
     */
    public function show(TypeOutil $type_outil)
    {
        //
        return $type_outil;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeOutil  $typeOutil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeOutil $type_outil)
    {
        //
        $data = $request->only(['name']);
        $validator = Validator::make($data,[
            'name'=>['required','min:2','max:50',Rule::unique('type_outils','name')->ignore($type_outil)]
        ],[
            'name.required'    =>'veuillez remplir ce champ',
            'name.min'         =>'Trop court',
            'name.max'         =>'Trop long',
            'name.unique'      =>'Cette valeur existe déjà',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
        if($type_outil->update($data)){
            return ['status'=>true];
        }
        return ['status'=>false];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeOutil  $typeOutil
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeOutil $type_outil)
    {
        //
        if($type_outil){
            $type_outil->is_deleted = true;
            if($type_outil->save()){
                return ['status'=>true];
            }
            return ['status'=>false];
        }
        return ['status'=>false];
    }
}
