<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DepartementController extends Controller
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

        $departements = Departement::join('users','users.id','=','departements.user_id')
                                    ->select('departements.id','departements.nom_departement','users.email','departements.created_at')
                                    ->where('departements.is_deleted','=',false)
                                    ->orderBy('departements.id','desc');
        if($searchValue){
            $departements->where(function($query) use($searchValue){
                $query->where('departements.nom_departement','like','%'.$searchValue.'%')
                    ->orWhere('users.email','like','%'.$searchValue.'%');
            });
        }
        return response()->json([
            'status'=>true,
            'departements'=>$departements->paginate($length)
        ]);
    }
    public function getDepartementFriends(){
        $departId = Auth::user()->departement_id;//work
        $authUserId = Auth::user()->id;//work

        $departementFriends = DB::SELECT("SELECT staff.id,staff.nom,staff.prenom,staff.photo,departements.nom_departement 
        FROM staff,departements 
        WHERE staff.departement_id = departements.id
        AND staff.departement_id =".$departId."
        AND staff.id != ".$authUserId."");

        return response()->json([
            'status'=>true,
            'departementFriends'=>$departementFriends
        ]);
    }
    public function departementList(){
        $departements = Departement::query()->select('id','nom_departement')
                                    ->where('is_deleted',false)
                                    ->orderBy('id','desc')->get();
        
        return response()->json([
            'status'=>true,
            'departements'=>$departements
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
        $data = $request->only(['nom_departement','user_id']);
        $validator = Validator::make($data,[
            'nom_departement'           =>'required|string|unique:departements|min:2|max:100',
            'user_id'                   =>'required'
        ],[
            'nom_departement.required'  =>'Veuillez remplir ce champ',
            'nom_departement.unique'    =>'Cette valeur existe déjà',
            'nom_departement.min'       =>'Trop court',
            'nom_departement.max'       =>'Trop long',
            'user_id.required'          =>'Veuillez remplir ce champ',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
        if(Departement::create($data)){
            return ['status'=>true];
        }
        return ['status'=>false];   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function show(Departement $departement)
    {
        //
        return $departement;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departement $departement)
    {
        //
        $data = $request->only(['nom_departement','user_id']);
        $validator = Validator::make($data,[
            'nom_departement' => ['required','string','min:2','max:100',
                Rule::unique('departements')->ignore($departement->id)
            ],
            'user_id'                   =>'required'
        ],[
            'nom_departement.required'  =>'Veuillez remplir ce champ',
            'nom_departement.unique'    =>'Valeur déjà utilisé.',
            'nom_departement.min'       =>'Trop court',
            'nom_departement.max'       =>'Trop long',
            'user_id.required'          =>'Veuillez remplir ce champ',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
        if($departement->update($data)){
            return ['status'=>true];
        }
        return ['status'=>false]; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departement $departement)
    {
        //
        if($departement){
            $departement->is_deleted = true;
            if($departement->save()){
                return ['status'=>true];
            }
            return ['status'=>false]; 
        }
        return ['status'=>false]; 
    }
    //
    public function getCountDepartements(){
        $departements = Departement::query()
                                    ->where('is_deleted',false)
                                    ->count();
        return response()->json([
            'departements'=>$departements
        ]);
    }
}
