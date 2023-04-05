<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
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
        //dd($request->all());
        $data = $request->only(['nom','prenom','email','adresse','type_staff_id','departement_id','photo','role_id','password','checked']);
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
            'password'          =>'required|string|min:8',
        ],[
            'nom.required'      =>'Veuillez remplir ce champ',
            'nom.min'           =>'Trop court',
            'nom.max'           =>'Trop long',
            'nom.unique'        =>'Ce nom existe déjà pour ce prénom.',
            //
            'prenom.required'   =>'Veuillez remplir ce champ',
            'prenom.min'        =>'Trop court',
            'prenom.max'        =>'Trop long',
            'prenom.unique'     =>'Ce prénom existe déjà pour ce nom.',
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
            //
            'password.required'         =>'Veuillez remplir ce champ',
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
        /***********************************************/
        $staff = new Staff();
        $staff->nom = $data['nom'];
        $staff->prenom = $data['prenom'];
        $staff->email = $data['email'];
        $staff->adresse = $data['adresse'];
        $staff->type_staff_id = $data['type_staff_id'];
        $staff->departement_id = $data['departement_id'];
        $staff->checked = $data['checked'];
        $staff->photo = $data['photo'];
        $staff->password = bcrypt($data['password']);
        if($staff->save()){
            $staff->assignRole($data['role_id']);
            return ['status'=>true];
        }
        return ['status'=>false];
        /***********************************************/
        /* $data['password'] = bcrypt($data['password']);
        if(Staff::create($data)){
            return ['status'=>true];
        }
        return ['status'=>false]; */
        /***********************************************/
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
        //return $staff;
        $staff = DB::SELECT("SELECT s.id,s.nom,s.prenom,s.adresse,s.email,s.photo,s.departement_id,s.type_staff_id,
		r.id as role_id,r.name as role_name 
        FROM roles r,staff s, model_has_roles 
        where s.id = $staff->id
        AND r.id = model_has_roles.role_id 
        AND model_has_roles.model_id = $staff->id;");
        $staff = $staff[0];
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
            'nom.unique'        =>'Ce nom existe déjà pour ce prénom.',
            //
            'prenom.required'   =>'Veuillez remplir ce champ',
            'prenom.min'        =>'Trop court',
            'prenom.max'        =>'Trop long',
            'prenom.unique'      =>'Ce prénom existe déjà pour ce nom.',
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
            if($request->file('photo') === null){
                if($staff->update($data)){
                    $staff->syncRoles($data['role_id']);
                    return ['status'=>true];
                }
                return ['status'=>false];
            }else{
                if(File::exists($image_path)) {
                    File::delete($image_path);
                    DB::SELECT("UPDATE staff SET photo = 0 WHERE id = $staff->id");
                        if($image=($request->file('photo'))){
                            $destinationPath = public_path('img_path/Staff');
                            $staffImage = date('YmdHis').".".$image->getClientOriginalExtension();
                            $image->move($destinationPath,$staffImage);
                            $data['photo']=$staffImage;
                        }
                        if($staff->update($data)){
                            $staff->syncRoles($data['role_id']);
                            return ['status'=>true];
                        }
                        return ['status'=>false];
                }else{
                        if($image=($request->file('photo'))){
                            $destinationPath = public_path('img_path/Staff');
                            $staffImage = date('YmdHis').".".$image->getClientOriginalExtension();
                            $image->move($destinationPath,$staffImage);
                            $data['photo']=$staffImage;
                        }
                        if($staff->update($data)){
                            $staff->syncRoles($data['role_id']);
                            return ['status'=>true];
                        }
                        return ['status'=>false];
                }
            }  
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

    public function updateStaffPassword(Request $request, $id){
        //dd($id);
        $staffPassword = DB::SELECT("SELECT password FROM staff WHERE id = $id");
        $staffPassword = $staffPassword[0]->password;
        //dd($staffPassword);
        $data = $request->only(['old_password','new_password']);
        
        $validator = Validator::make($data,[
            'old_password'=>'required|string|min:8',
            'new_password'=>'required|string|min:8',
        ],[
            'old_password.required' =>'Veuillez remplir ce champ',
            'old_password.min'      =>'Trop court',

            'new_password.required' =>'Veuillez remplir ce champ',
            'new_password.min'      =>'Trop court',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }

        //on do les verifications
        if (!Hash::check($data['old_password'],$staffPassword)){
            return response()->json([
                'status'=>false,
                'message'=>'mot de passe incorrecte !!!'
            ]);
        }else{
            // going to update
            $finalPassword = bcrypt($data['new_password']);
            DB::UPDATE("UPDATE staff SET password = '$finalPassword' WHERE id = $id");
            DB::UPDATE("UPDATE staff SET checked = 0 WHERE id = $id");
            return response()->json([
                'status'=>true,
                'message'=>'Mot de passe mise à jour avec succèss !!!'
            ]);
        }
    }
    //get count
    public function getCountStaffs(){
        $staffs = Staff::query()
                    ->where('is_deleted',false)
                    ->count();
        return response()->json([
            'staffs'=>$staffs
        ]);
    }
    //get Selected User Info
    public function getSelectedUserInfo($id){
        
        $user = DB::SELECT("SELECT staff.nom,staff.prenom,staff.photo,departements.nom_departement 
        FROM staff,departements 
        WHERE staff.departement_id = departements.id
        AND staff.id = $id");

        return response()->json([
            'status'=>true,
            'user'=>$user
        ]);
    }
}
