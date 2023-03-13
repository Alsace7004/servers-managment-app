<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\CategoriePermission;
use Illuminate\Support\Facades\Validator;

class CategoriePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $catgeorie_permissions = CategoriePermission::query()
        ->select('id','categorie_permission_name','created_at')
        ->orderBy('id','desc')
        ->get();
        return response()->json([
            'status'=>true,
            'catgeorie_permissions'=>$catgeorie_permissions
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
        $data = $request->only(['categorie_permission_name']);
        $validator = Validator::make($data,[
            'categorie_permission_name'=>'required|min:2|max:50|unique:categorie_permissions'
        ],[
            'categorie_permission_name.required'    =>'veuillez remplir ce champ',
            'categorie_permission_name.min'         =>'Trop court',
            'categorie_permission_name.max'         =>'Trop long',
            'categorie_permission_name.unique'     =>'Cette valeur existe déjà',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
        if(CategoriePermission::create($data)){
            return ['status'=>true];
        }
        return ['status'=>false];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoriePermission  $categoriePermission
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriePermission $categorie_permission)
    {
        //
        return $categorie_permission;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoriePermission  $categoriePermission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriePermission $categorie_permission)
    {
        //
        $data = $request->only(['categorie_permission_name']);
        $validator = Validator::make($data,[
            'categorie_permission_name'=>['required','min:2','max:50',
            Rule::unique('categorie_permission_name')->ignore($categorie_permission)]
        ],[
            'categorie_permission_name.required'    =>'veuillez remplir ce champ',
            'categorie_permission_name.min'         =>'Trop court',
            'categorie_permission_name.max'         =>'Trop long',
            'categorie_permission_name.uniques'     =>'Cette valeur existe déjà',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
        if($categorie_permission->update($data)){
            return ['status'=>true];
        }
        return ['status'=>false];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoriePermission  $categoriePermission
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriePermission $categorie_permission)
    {
        //
        if($categorie_permission->delete()){
            return ['status'=>true];
        }
        return ['status'=>false];
    }
}
