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
        $roles = Role::query()->select('id','name','guard_name','created_at')
                        ->where('is_deleted',false)
                        ->orderBy('id','desc');
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
        $roles = Role::query()->select('id','name')
                        ->where('is_deleted',false)
                        ->where('guard_name','web')
                        ->get();
        return response()->json([
            'status'=>true,
            'roles'=>$roles
        ]);
    }
    public function staffRoleList(){
        $roles = Role::query()->select('id','name')
                        ->where('is_deleted',false)
                        ->where('guard_name','staffs')
                        ->get();
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
        $name = $data['name'];
        $guard_name = $data['guard_name'];
        //dd($data);
        $validator = Validator::make($data,[
            'name'          =>['required','string','min:2','max:20',
                            Rule::unique('roles','name')->where(function($query) use($guard_name){
                                return $query->where('guard_name',$guard_name);
                            })
            ],
            'guard_name'    =>['required','string','min:2','max:20',
                            Rule::unique('roles','guard_name')->where(function($query) use($name){
                                return $query->where('name',$name);
                            })
            ],
            'permission'    => 'required',
        ],[
            'name.required' =>'Veuillez remplir ce champ',
            'name.unique'   =>'Ce role existe déjà pour ce guard',
            'name.min'      =>'Trop court',
            'name.max'      =>'Trop long',
            //
            'guard_name.required' =>'Veuillez remplir ce champ',
            'guard_name.unique'   =>'Ce guard existe déjà pour ce role',
            'guard_name.min'      =>'Trop court',
            'guard_name.max'      =>'Trop long',
            //
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
        $data = $request->role;
        //dd($data);
        //dd($role->toArray());
       // dd($request->role['permission']);
        //dd($request->role2);
        $tab = $request->role2; //les permissions
        //$b = array_values($tab);
        $a=array();
        foreach ($tab as $key => $value) { 
            if ($value == true) array_push($a,$key);
        } 
        // dd($a);
        //die();
        //dd($request->role['permission']);
        //dd($request->role['guard_name']);
        $name = $request->role['name'];
        $guard_name = $request->role['guard_name'];
        $validator = Validator::make($data,[
            'name' => ['required','string','min:2','max:20',
                Rule::unique('roles','name')->where(function($query) use($guard_name){
                    return $query->where('guard_name',$guard_name);
                })->ignore($role->id)
            ],
            'guard_name'=>['required','string','min:2','max:20',
                Rule::unique('roles','guard_name')->where(function($query) use($name){
                    return $query->where('name',$name);
                })->ignore($role->id)
            ],
        ],[
            'name.required' =>'Veuillez remplir ce champ',
            'name.unique'   =>'Ce role existe déjà pour ce guard',
            'name.min'      =>'Trop court',
            'name.max'      =>'Trop long',
            //
            'guard_name.required' =>'Veuillez remplir ce champ',
            'guard_name.unique'   =>'Ce guard existe déjà pour ce role',
            'guard_name.min'      =>'Trop court',
            'guard_name.max'      =>'Trop long',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
        /* $role->name = $request->input('name');
        $role->guard_name = $request->input('guard_name'); */
        $role->name = $request->role['name'];
        $role->guard_name = $request->role['guard_name'];

        if($role->save()){
            //$role->syncPermissions($request->input('permission'));
            $role->syncPermissions($a);
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
        if($role){
            $role->is_deleted = true;
            if($role->save()){
                return ['status'=>true];
            }
            return ['status'=>false];
        }
        return ['status'=>false];
    }
}
