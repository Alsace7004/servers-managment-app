<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class DomaineController extends Controller
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

        /* $domaines = Domaine::query()->select('id','nom_domaine','server_id','registre','date_expiration','status','created_at')
                    ->orderBy('id','desc'); */
                    $domaines = Domaine::join('servers','servers.id','=','domaines.server_id')
                        ->select('domaines.id','nom_domaine','server_id','registre','domaines.date_expiration','domaines.status','domaines.created_at','servers.name')
                        ->where('domaines.is_deleted',false)
                        ->orderBy('id','desc');
        if($searchValue){
            $domaines->where(function($query) use ($searchValue){
                $query->where('nom_domaine','like','%'.$searchValue.'%')
                    ->orWhere('servers.name','like','%'.$searchValue.'%')
                    ->orWhere('registre','like','%'.$searchValue.'%');
            });
        }
        return response()->json([
            'status'=>true,
            'domaines'=>$domaines->paginate($length)
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
        $data = $request->only(['nom_domaine','server_id','registre','date_expiration']);
        $validator = Validator::make($data,[
            'nom_domaine'       =>['required','string','unique:domaines','min:2','max:75','regex:/^(?!:\/\/)(?=.{1,255}$)((.{1,63}\.){1,127}(?![0-9]*$)[a-z0-9-]+\.?)$/i'],
            'server_id'         =>'required',
            'registre'          =>'required|string|min:2|max:75',
            'date_expiration'   =>'required|date|after:today',
        ],[
            'nom_domaine.required'  =>'Veuillez remplir ce champ',
            'nom_domaine.min'       =>'Trop court',
            'nom_domaine.max'       =>'Trop long',
            'nom_domaine.regex'     =>'nom de domaine invalide',
            'nom_domaine.unique'    =>'Cette valeur existe déjà',

            'server_id.required'    =>'Veuillez remplir ce champ',

            'registre.required'     =>'Veuillez remplir ce champ',
            'registre.min'          =>'Trop court',
            'registre.max'          =>'Trop long',

            'date_expiration.required'  =>'Veuillez remplir ce champ',
            'date_expiration.date'      =>'Veuillez entrer une date',
            'date_expiration.after'     =>"Cette date doit etre ulterieure à la date d'aujourd'hui",
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
        if(Domaine::create($data)){
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
    public function show(Domaine $domaine)
    {
        //
        $domaines = Domaine::join('servers','servers.id','=','domaines.server_id')
            ->select('domaines.id','nom_domaine','server_id','registre','domaines.date_expiration','domaines.status','domaines.created_at','servers.name')
            ->where('domaines.id',$domaine->id)->get();
        return $domaines;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Domaine $domaine)
    {
        //
        $data = $request->only(['nom_domaine','server_id','registre','date_expiration']);
        $validator = Validator::make($data,[
            //'nom_domaine'       =>'required|string|min:2|max:75',
            'nom_domaine' => ['required','string','min:2','max:100',
                Rule::unique('domaines')->ignore($domaine->id)
            ],
            'server_id'         =>'required',
            'registre'          =>'required|string|min:2|max:75',
            'date_expiration'   =>'required|date|after:today',
        ],[
            'nom_domaine.required'  =>'Veuillez remplir ce champ',
            'nom_domaine.unique'    =>'Valeur déjà utilisé.',
            'nom_domaine.min'       =>'Trop court',
            'nom_domaine.max'       =>'Trop long',
            'server_id.required'    =>'Veuillez remplir ce champ',
            'registre.required'         =>'Veuillez remplir ce champ',
            'registre.min'              =>'Trop court',
            'registre.required'         =>'Trop long',
            'date_expiration.required'  =>'Veuillez remplir ce champ',
            'date_expiration.date'      =>'Veuillez entrer une date',
            'date_expiration.after'     =>"Cette date doit etre ulterieure à la date d'aujourd'hui",
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
        if($domaine->update($data)){
            return ['status'=>true];
        }
        return ['status'=>false];

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domaine $domaine)
    {
        //
        if($domaine){
            $domaine->is_deleted = true;
            if($domaine->save()){
                return ['status'=>true];
            }
            return ['status'=>false];
        }
        return ['status'=>false];
    }
}
