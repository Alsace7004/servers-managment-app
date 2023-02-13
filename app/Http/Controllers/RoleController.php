<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::query()->select('id','name','created_at');
        return response()->json([
            'status'=>true,
            'roles'=>$roles->paginate(3)
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
        //dd($data);
        $validator = Validator::make($data,[
            'name'=>'required|string|min:2|max:20'
        ],[
            'name.required'=>'Veuillez remplir ce champ',
            'name.min'=>'Trop court',
            'name.max'=>'Trop long',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
        $r = Role::create($data);
        if($r){
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
        return $role;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
        $this->validate($request,[
            'name'=>'required',
        ]);
        $role->name = $request->input('name');
        if($role->save()){
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
