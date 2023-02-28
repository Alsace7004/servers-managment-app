<?php

namespace App\Http\Controllers;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $permissions = Permission::query()->select('id','name','created_at')->orderBy('id','desc');
        return response()->json([
            'status'=>true,
            'permissions'=>$permissions->paginate(3)
        ]);
    }
    public function permissionList(){
        $permissions = Permission::query()->select('id','name','slug')->orderBy('id','desc')->get();
        return response()->json([
            'status'=>true,
            'permissions'=>$permissions
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
            'name'=>'required|string|unique:roles|min:2|max:20'
        ],[
            'name.required'=>'Veuillez remplir ce champ',
            'name.unique'=>'Cette valeur existe déjà',
            'name.min'=>'Trop court',
            'name.max'=>'Trop long',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
        if(Permission::create($data)){
            return ['status'=>true];
        }
        return ['status'=>false];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
        return $permission;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        //
        $message = [
            'name.required'=>'Veuillez remplir ce champ',
            'name.min'=>'Trop court',
            'name.max'=>'Trop long',
        ];
        $this->validate($request,[
            'name'=>[
                'required','string','min:2','max:20'
            ],
        ],$message);
        $permission->name = $request->input('name');
        if($permission->save()){
            return ["status"=>true];
        }
        return ["status"=>false];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
        if($permission->delete()){
            return ['status'=>true,];
        }
        return ['status'=>false];
    }

    public function getAuthUserPermissionAndRole(){
        return auth()->check()?auth()->user()->jsPermissions():0;
    }
}
