<?php

namespace App\Http\Controllers;

use App\Models\TypeStaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TypeStaffController extends Controller
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

        $typeStaff = TypeStaff::query()
                                ->select('id','type_staff','created_at')
                                ->where('is_deleted',false)
                                ->orderBy('id','desc');
        if($searchValue){
            $typeStaff->where(function($query) use($searchValue){
                $query->where('type_staff','like','%'.$searchValue.'%');
            });
        }
        return response()->json([
            'status'=>true,
            'typeStaff'=>$typeStaff->paginate($length)
        ]);

    }

    public function typeStaffList(){
        $typeStaff = TypeStaff::query()->select('id','type_staff')
                                ->where('is_deleted',false)
                                ->orderBy('id','desc')->get();
        
        return response()->json([
            'status'=>true,
            'typeStaff'=>$typeStaff
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
        $data = $request->only(['type_staff']);
        $validator = Validator::make($data,[
            'type_staff'            =>'required|string|min:2|max:100'
        ],[
            'type_staff.required'   =>'Veuillez remplir ce champ',
            'type_staff.min'        =>'Trop court',
            'type_staff.max'        =>'Trop long',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
        if(TypeStaff::create($data)){
            return ['status'=>true];
        } 
        return ['status'=>false];  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeStaff  $typeStaff
     * @return \Illuminate\Http\Response
     */
    public function show(TypeStaff $typeStaff)
    {
        //
        return $typeStaff;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeStaff  $typeStaff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeStaff $typeStaff)
    {
        //
        $data = $request->only(['type_staff']);
        $validator = Validator::make($data,[
            'type_staff'            =>'required|string|min:2|max:100'
        ],[
            'type_staff.required'   =>'Veuillez remplir ce champ',
            'type_staff.min'        =>'Trop court',
            'type_staff.max'        =>'Trop long',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
        if($typeStaff->update($data)){
            return ['status'=>true];
        } 
        return ['status'=>false]; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeStaff  $typeStaff
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeStaff $typeStaff)
    {
        //
        if($typeStaff){
            $typeStaff->is_deleted = true;
            if($typeStaff->save()){
                return ['status'=>true]; 
            }
            return ['status'=>false]; 
        }
        return ['status'=>false]; 
    }
}
