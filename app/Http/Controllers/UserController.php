<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //

    public function index(Request $request){
        $length = $request->input('length');
        $searchValue = $request->input('search');
        /* $users = DB::SELECT("SELECT 
        DISTINCT u.id,u.name,u.email,r.name as role_name 
        FROM users u inner join roles r inner join model_has_roles 
        WHERE u.id = model_has_roles.model_id and r.id = model_has_roles.role_id
        ORDER BY u.id DESC");
        $users = $users[0]; */
        /***************************************************/
        /***************************************************/
        $users = User::query()->select('id','name','email','created_at')->where('is_deleted',false)->orderBy('id','desc');
        if($searchValue){
            $users->where(function($query) use ($searchValue){
                $query->where('name','like','%'.$searchValue.'%')
                      ->orWhere('email','like','%'.$searchValue.'%');
            });
        }
        return response()->json([
            'status'=>true,
            'users'=>$users->paginate($length),
        ]);
    }
    public function userList(){
        $users = User::query()
                        ->select('id','email')
                        ->where('is_deleted',false)
                        ->orderBy('id','desc')->get();
        return response()->json([
            'status'=>true,
            'users'=>$users
        ]);
    }
    public function store(Request $request){

        
         $data = $request->only(['name','email','password','roles']);
        //dd($data);
        $validator = Validator::make($data,[
            'name'=>'required|string|min:2|max:100',
            'email'=>'required|email|unique:users',
            'password'=>'required|string|min:8',
            'roles' => 'required'
        ],[
            'name.required'=>'Veuillez remplir ce champ',
            'name.string'=>'Veuillez entrer des chaines de caractère',
            'name.min'=>'Trop court...',
            'name.max'=>'Trop long...',
            'email.required'=>'Veuillez remplir ce champ',
            'email.email'=>'Veuillez entrer une adresse mail valide',
            'email.unique'=>'Mail déjà utilisé.',
            'password.required'=>'Veuillez remplir ce champ',
            'password.string'=>'Veuillez entrer des chaines de caractère',
            'password.min'=>'Trop court...',
            'roles.required'=>'Veuillez remplir ce champ...',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
        
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        if($user->save()){
            $user->assignRole($data['roles']);
            return ['status'=>true];
        }
        return ['status'=>false];
    }

    public function show(User $user)
    {
        //
        $user = DB::SELECT("SELECT u.id,u.name,
        u.email,r.id as role_id,
        r.name as role_name from roles r,users u, model_has_roles 
        where u.id = $user->id AND 
        r.id = model_has_roles.role_id 
        and model_has_roles.model_id = $user->id");
        $user = $user[0];
        return $user;
    }
    public function showUser(User $user){
        //get user+his role
        $user = DB::SELECT("SELECT u.id,u.name,
        u.email,r.id as role_id,
        r.name as role_name from roles r,users u, model_has_roles 
        where u.id = $user->id AND 
        r.id = model_has_roles.role_id 
        and model_has_roles.model_id = $user->id");
        $user = $user[0];
        $role_id = $user->role_id;
        //get that role Permissions
        $rolePermissions  = DB::SELECT("SELECT
            role_has_permissions.permission_id,
            permissions.name,permissions.slug
            FROM role_has_permissions,roles,permissions    
            WHERE roles.id = role_has_permissions.role_id 
            AND permissions.id = role_has_permissions.permission_id
            AND role_has_permissions.role_id =('.$role_id.')");
        //return results
        return response()->json([
            'user'=>$user,
            'rolePermissions'=>$rolePermissions
        ]);
    }
    public function update(Request $request, User $user)
    {
        //
        $data = $request->only(['name','email','roles']);
        $validator = Validator::make($data,[
            'name'=>'required|string|min:2|max:100',
            'email' => ['required','email',
                Rule::unique('users')->ignore($user->id)
            ],
            'roles' => 'required'
        ],[
            'name.required'=>'Veuillez remplir ce champ',
            'name.string'=>'Veuillez entrer des chaines de caractère',
            'name.min'=>'Trop court...',
            'name.max'=>'Trop long...',
            'email.required'=>'Veuillez remplir ce champ',
            'email.email'=>'Veuillez entrer une adresse mail valide',
            'email.unique'=>'Mail déjà utilisé.',
            'roles.required'=>'Veuillez remplir ce champ...',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if($user->save()){
            $user->syncRoles($request->roles);
            return ["status"=>true];
        }
        return ["status"=>false];
    }
    public function destroy(Request $request,User $user)
    {
        //
        if($user){
            $user->is_deleted = true;
            if($user->save()){
                return ['status'=>true];
            }
            return ['status'=>false];
        }
        return ['status'=>false];
    }

    public function getAuthUserInfo(){
        $id = auth()->user()->id;
        $user =  DB::SELECT("SELECT 
        DISTINCT u.id,u.name,u.email,r.name as role_name 
        FROM users u inner join roles r inner join model_has_roles 
        WHERE u.id = model_has_roles.model_id and r.id = model_has_roles.role_id
        and u.id =$id");
        $user = $user[0];
        return $user;
    }
}
