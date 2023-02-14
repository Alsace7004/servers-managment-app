<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $servers = Server::query()->select('id','name','username','url_connexion','created_at')->orderBy('id','desc');
        return response()->json([
            'status'=>true,
            'servers'=>$servers->paginate(3)
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
        $data = $request->only(['name','username','password','url_connexion','description']);
        //dd($data);
        $validator = Validator::make($data,[
            'name'          =>'required|string|unique:servers|min:2|max:50',
            'username'      =>'required|string|min:2|max:50',
            'password'      =>'required|string|min:8',
            'url_connexion' =>'required|string|url|min:2|max:100',
            'description'   =>'required|string|min:2|max:255',
        ],[
            'name.required'             =>'Veuillez remplir ce champ',
            'name.unique'               =>'Cette valeur existe déjà',
            'name.min'                  =>'Trop court',
            'name.max'                  =>'Trop long',
            'username.required'         =>'Veuillez remplir ce champ',
            'username.min'              =>'Trop court',
            'username.max'              =>'Trop long',
            'password.required'         =>'Veuillez remplir ce champ',
            'password.min'              =>'Trop court',
            'url_connexion.required'    =>'Veuillez remplir ce champ',
            'url_connexion.url'         =>'Veuillez entrer une URL',
            'url_connexion.min'         =>'Trop court',
            'url_connexion.max'         =>'Trop long',
            'description.required'      =>'Veuillez remplir ce champ',
            'description.min'           =>'Trop court',
            'description.max'           =>'Trop long',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
        $ser                = new Server();
        $ser->name          = $data['name'];
        $ser->username      = $data['username'];
        $ser->password      = $data['password'];
        $ser->url_connexion = $data['url_connexion'];
        $ser->description   = $data['description'];
        if($ser->save()){
            return ['status'=>true];
        }
        return ['status'=>false];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function show(Server $server)
    {
        //
        return $server;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Server $server)
    {
        //Rule::unique('roles')->ignore($role->id)
        $data = $request->only(['name','username','password','url_connexion','description']);
        $validator = Validator::make($data,[
            'name'          =>['required','string',Rule::unique('servers')->ignore($server->id),'min:2','max:50'],
            'username'      =>'required|string|min:2|max:50',
            'password'      =>'required|string|min:8',
            'url_connexion' =>'required|string|url|min:2|max:100',
            'description'   =>'required|string|min:2|max:255',
        ],[
            'name.required'             =>'Veuillez remplir ce champ',
            'name.unique'               =>'Cette valeur existe déjà',
            'name.min'                  =>'Trop court',
            'name.max'                  =>'Trop long',
            'username.required'         =>'Veuillez remplir ce champ',
            'username.min'              =>'Trop court',
            'username.max'              =>'Trop long',
            'password.required'         =>'Veuillez remplir ce champ',
            'password.min'              =>'Trop court',
            'url_connexion.required'    =>'Veuillez remplir ce champ',
            'url_connexion.url'         =>'Veuillez entrer une URL',
            'url_connexion.min'         =>'Trop court',
            'url_connexion.max'         =>'Trop long',
            'description.required'      =>'Veuillez remplir ce champ',
            'description.min'           =>'Trop court',
            'description.max'           =>'Trop long',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
            $server->name          = $data['name'];
            $server->username      = $data['username'];
            $server->password      = $data['password'];
            $server->url_connexion = $data['url_connexion'];
            $server->description   = $data['description'];
            if($server->save()){
                return ['status'=>true];
            }
            return ['status'=>false];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Server  $server
     * @return \Illuminate\Http\Response
     */
    public function destroy(Server $server)
    {
        //
        if($server->delete()){
            return ['status'=>true,];
        }
        return ['status'=>false];
    }
}
