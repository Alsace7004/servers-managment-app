<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
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
        $data = $request->only(['nom','prenom','email','adresse','type_staff_id','departement_id','photo','role_id']);
        $lastName = $data['prenom'];
        $firstName = $data['nom'];
        $validator = Validator::make($data,[
            //'nom'=>'required|string|min:2|max:100|unique:staff,nom,NULL,id,prenom,'.$data['prenom'],
            'nom' => [
                'required','string','min:2','max:100',
                Rule::unique('staff', 'nom')->where(function ($query) use ($lastName) {
                    return $query->where('prenom', $lastName);
                })
            ],
            //'prenom'=>'required|string|min:2|max:100',
            'prenom' => [
                'required','string','min:2','max:100',
                Rule::unique('staff', 'prenom')->where(function ($query) use ($firstName) {
                    return $query->where('nom', $firstName);
                })
            ],
            'email'             =>'required|email|unique:staff',
            'adresse'           =>'required|string|min:2|max:100',
            'type_staff_id'     =>'required',
            'departement_id'    =>'required',
            'role_id'           =>'required',
            'photo'             =>'required|file|mimes:jpeg,png,jpg,svg|max:1024',
        ],[
            'nom.required'      =>'Veuillez remplir ce champ',
            'nom.min'           =>'Trop court',
            'nom.max'           =>'Trop long',
            'nom.unique'        =>'Nom déjà utilisé.',
            //
            'prenom.required'   =>'Veuillez remplir ce champ',
            'prenom.min'        =>'Trop court',
            'prenom.max'        =>'Trop long',
            'prenom.unique'     =>'Prenom déjà utilisé.',
            //
            'email.required'    =>'Veuillez remplir ce champ',
            'email.email'       =>'Veuillez entrer une adresse email valid',
            'email.unique'      =>'Mail déjà utilisé.',
            //
            'adresse.required'  =>'Veuillez remplir ce champ',
            'adresse.min'       =>'Trop court',
            'adresse.max'       =>'Trop long',
            //
            'type_staff_id.required'    =>'Veuillez remplir ce champ',
            'departement_id.required'   =>'Veuillez remplir ce champ',
            'role_id.required'          =>'Veuillez remplir ce champ',
            //
            'photo.required'            =>'Veuillez choisir une image',
            'photo.file'                =>'Veuillez choisir une image',
            'photo.mimes'               =>'Non autorisé',
            'photo.max'                 =>'Image trop lourde',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
        if($image=($request->file('photo'))){
            $destinationPath = public_path('img_path/Staff');
            $staffImage = date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath,$staffImage);
            $data['photo']=$staffImage;
        }
        if(Staff::create($data)){
            return ['status'=>true];
        }
        return ['status'=>false];
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
        $data = $request->only(['nom','prenom','email','adresse','type_staff_id','departement_id','photo','role_id']);
        $firstName = $data['nom'];
        $lastName  = $data['prenom'];
        $validator = Validator::make($data,[
            //'nom'               =>'required|string|min:2|max:100',
            'nom' => [
                'required','string','min:2','max:100',
                Rule::unique('staff', 'nom')->where(function ($query) use ($lastName) {
                    return $query->where('prenom', $lastName);
                })->ignore($staff->id)
            ],
            //'prenom'            =>'required|string|min:2|max:100',
            'prenom' => [
                'required','string','min:2','max:100',
                Rule::unique('staff', 'prenom')->where(function ($query) use ($firstName) {
                    return $query->where('nom', $firstName);
                })->ignore($staff->id)
            ],
            'email' => ['required','email',
                Rule::unique('staff')->ignore($staff->id)
            ],
            'adresse'           =>'required|string|min:2|max:100',
            'type_staff_id'     =>'required',
            'departement_id'    =>'required',
            'role_id'           =>'required',
            //'photo'           =>'required|file|mimes:jpeg,png,jpg,svg|max:1024',
        ],[
            'nom.required'      =>'Veuillez remplir ce champ',
            'nom.min'           =>'Trop court',
            'nom.max'           =>'Trop long',
            'nom.unique'        =>'Nom déjà utilisé.',
            //
            'prenom.required'   =>'Veuillez remplir ce champ',
            'prenom.min'        =>'Trop court',
            'prenom.max'        =>'Trop long',
            'prenom.unique'      =>'Prenom déjà utilisé.',
            //
            'email.required'    =>'Veuillez remplir ce champ',
            'email.email'       =>'Veuillez entrer une adresse email valid',
            'email.unique'      =>'Mail déjà utilisé.',
            //
            'adresse.required'  =>'Veuillez remplir ce champ',
            'adresse.min'       =>'Trop court',
            'adresse.max'       =>'Trop long',
            //
            'type_staff_id.required'    =>'Veuillez remplir ce champ',
            'departement_id.required'   =>'Veuillez remplir ce champ',
            'role_id.required'          =>'Veuillez remplir ce champ',
            //
            'photo.required'            =>'Veuillez choisir une image',
            'photo.file'                =>'Veuillez choisir une image',
            'photo.mimes'               =>'Non autorisé',
            'photo.max'                 =>'Image trop lourde',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
        //delete the existing file in public_path and add new one
        $image_path = "img_path/Staff/".$staff->photo;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
        //
        if($image=($request->file('photo'))){
            $destinationPath = public_path('img_path/Staff');
            $staffImage = date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath,$staffImage);
            $data['photo']=$staffImage;
        }
        if($staff->update($data)){
            return ['status'=>true];
        }
        return ['status'=>false];
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
