<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\CategorieServeur;
use Illuminate\Support\Facades\Validator;

class CategorieServeurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $catgeorie_serveurs = CategorieServeur::query()
        ->select('id','categorie_serveur_name','created_at')
        ->orderBy('id','desc')
        ->get();
        return response()->json([
            'status'=>true,
            'categorie_serveurs'=>$catgeorie_serveurs
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
        
        $data = $request->only(['categorie_serveur_name']);
        $validator = Validator::make($data,[
            'categorie_serveur_name'             =>'required|min:2|max:50|unique:categorie_serveurs'
        ],[
            'categorie_serveur_name.required'    =>'veuillez remplir ce champ',
            'categorie_serveur_name.min'         =>'Trop court',
            'categorie_serveur_name.max'         =>'Trop long',
            'categorie_serveur_name.unique'      =>'Cette valeur existe déjà',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
        if(CategorieServeur::create($data)){
            return ['status'=>true];
        }
        return ['status'=>false];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategorieServeur  $categorieServeur
     * @return \Illuminate\Http\Response
     */
    public function show(CategorieServeur $categorieServeur)
    {
        //
        return $categorieServeur;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategorieServeur  $categorieServeur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategorieServeur $categorieServeur)
    {
        //
        $data = $request->only(['categorie_serveur_name']);
        $validator = Validator::make($data,[
            'categorie_serveur_name'=>['required','min:2','max:50',
            Rule::unique('categorie_serveur_name')->ignore($categorieServeur)]
        ],[
            'categorie_serveur_name.required'    =>'veuillez remplir ce champ',
            'categorie_serveur_name.min'         =>'Trop court',
            'categorie_serveur_name.max'         =>'Trop long',
            'categorie_serveur_name.uniques'     =>'Cette valeur existe déjà',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
        if($categorieServeur->update($data)){
            return ['status'=>true];
        }
        return ['status'=>false];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategorieServeur  $categorieServeur
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategorieServeur $categorieServeur)
    {
        //
        if($categorieServeur->delete()){
            return ['status'=>true];
        }
        return ['status'=>false];
    }
}
