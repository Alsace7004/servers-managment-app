<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
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

        $staff= Staff::join('departements','departements.id','=','staff.departement_id')
                    ->join('type_staff','type_staff.id','=','staff.type_staff_id')
                    ->select('staff.id','staff.nom','staff.prenom','staff.adresse','staff.email','staff.created_at','departements.nom_departement','type_staff.type_staff')
                    ->where('staff.is_deleted',false)
                    ->orderBy('id','desc');
        if($searchValue){
            $staff->where(function($query) use($searchValue){
                $query
                    ->where("staff.nom","like","%".$searchValue."%")
                    ->orWhere("staff.email","like","%".$searchValue."%")
                    ->orWhere("staff.prenom","like","%".$searchValue."%")
                    ->orWhere("staff.adresse","like","%".$searchValue."%")
                    ->orWhere("type_staff.type_staff","like","%".$searchValue."%")
                    ->orWhere("departements.nom_departement","like","%".$searchValue."%");
            });
        }
        return response()->json([
            'status'=>true,
            'staff'=>$staff->paginate($length)
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
        $data = $request->only(['nom','prenom','email','adresse','type_staff_id','departement_id']);
        $validator = Validator::make($data,[
            'nom'               =>'required|string|min:2|max:100',
            'prenom'            =>'required|string|min:2|max:100',
            'email'             =>'required|email|min:2|max:100',
            'adresse'           =>'required|string|min:2|max:100',
            'type_staff_id'     =>'required',
            'departement_id'    =>'required',
        ],[
            'nom.required'      =>'Veuillez remplir ce champ',
            'nom.min'           =>'Trop court',
            'nom.max'           =>'Trop long',
            'prenom.required'   =>'Veuillez remplir ce champ',
            'prenom.min'        =>'Trop court',
            'prenom.max'        =>'Trop long',
            'email.required'    =>'Veuillez remplir ce champ',
            'email.email'       =>'Veuillez entrer une adresse email valid',
            'email.min'         =>'Trop court',
            'email.max'         =>'Trop long',
            'adresse.required'  =>'Veuillez remplir ce champ',
            'adresse.min'       =>'Trop court',
            'adresse.max'       =>'Trop long',
            'type_staff_id.required'=>'Veuillez remplir ce champ',
            'departement_id.required'=>'Veuillez remplir ce champ',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
        return $staff;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        //
        if($staff){
            $staff->is_deleted = true;
            if($staff->save()){
                return ['status'=>true];
            }
            return ['status'=>false];
        }
        return ['status'=>false];
    }
}
