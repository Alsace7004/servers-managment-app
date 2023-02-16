<?php

namespace App\Http\Controllers;

//use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $length = $request->input('length');
        $searchValue = $request->input('search');
        $roles = Role::query()->select('id','name','created_at')->orderBy('id','desc');
        if($searchValue){
            $roles->where(function($query) use ($searchValue){
                $query->where('name','like','%'.$searchValue.'%');
            });
        }
        return response()->json([
            'status'=>true,
            'roles'=>$roles->paginate($length)
        ]);
    }

    public function roleList(){
        $roles = Role::query()->select('id','name')->get();
        return response()->json([
            'status'=>true,
            'roles'=>$roles
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
        $data = $request->only(['name','permission','guard_name']);
        //dd($data);
        $validator = Validator::make($data,[
            'name'          =>'required|string|unique:roles,name|min:2|max:20',
            'guard_name'=>'required|string',
            'permission'    => 'required',
        ],[
            'name.required' =>'Veuillez remplir ce champ',
            'name.unique'   =>'Cette valeur existe déjà',
            'name.min'      =>'Trop court',
            'name.max'      =>'Trop long',
            'permission.required'=>'Veuillez choisir une permission',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
        $role = Role::create([
            'name'      =>$data['name'],
            'guard_name'=>$data['guard_name'],
            
        ]);
        //$role = Role::create(['guard_name'=>$request->input('guard_name'),'name'=>$request->input('name')]);
        if($role->syncPermissions($request->get('permission'))){
            return ['status'=>true];
        }
        return ['status'=>false];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
        ->where("role_has_permissions.role_id",$role->id)
        ->get();
        return response()->json([
            'role'=>$role,
            'rolePermissions'=>$rolePermissions
        ]);
    }

    public function showRole(Role $role)
    {
        //
        //$role = Role::find($id);
        /* $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$role->id)
            ->get(); */
        $rolePermissions  = DB::SELECT("SELECT
            role_has_permissions.permission_id
            FROM role_has_permissions,roles,permissions    
            WHERE roles.id = role_has_permissions.role_id 
            AND permissions.id = role_has_permissions.permission_id
            AND role_has_permissions.role_id =('.$role->id.')");
        return response()->json([
            'role'=>$role,
            'rolePermissions'=>$rolePermissions
        ]);
    }

    /**
     * Update the specified resource in storage.
     * //Rule::unique('roles')->ignore($role->id)
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
        //dd($role->toArray());
        //dd($request->all());
        $message = [
            'name.required'=>'Veuillez remplir ce champ',
            'name.min'=>'Trop court',
            'name.max'=>'Trop long',
            'permission.max'=>'Veuillez choisir une permission',
        ];
        $this->validate($request,[
            'name'=>[
                'required','string','min:2','max:20'
            ],
            'guard_name'=>'required|string',
            'permission'=>'required'
        ],$message);
        $role->name = $request->input('name');
        $role->guard_name = $request->input('guard_name');

        if($role->save()){
            $role->syncPermissions($request->input('permission'));
            return ["status"=>true];
        }
        return ["status"=>false];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        if($role->delete()){
            return ['status'=>true,];
        }
        return ['status'=>false];
    }
}
