<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ServerController extends Controller
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

        $servers = Server::query()
                        ->select('id','name','username','url_connexion','date_expiration','status','created_at')
                        ->where('is_deleted',false)
                        ->orderBy('id','desc');
        
        if($searchValue){
            $servers->where(function($query) use ($searchValue){
                $query->where('name','like','%'.$searchValue.'%')
                        ->orWhere('username','like','%'.$searchValue.'%')
                        ->orWhere('url_connexion','like','%'.$searchValue.'%');
            });
        }
        return response()->json([
            'status'=>true,
            'servers'=>$servers->paginate($length)
        ]);
    }
    public function serverList(){
        $servers = Server::query()
                            ->select('id','name')
                            ->where('is_deleted',false)
                            ->orderBy('id','desc')->get();
        
        return response()->json([
            'status'=>true,
            'servers'=>$servers
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
        $data = $request->only(['name','username','password','url_connexion','description','date_expiration']);
        //dd($data);
        $validator = Validator::make($data,[
            'name'                      =>'required|string|unique:servers|min:2|max:50',
            'username'                  =>'required|string|min:2|max:50',
            'password'                  =>'required|string|min:8',
            'url_connexion'             =>'required|string|url|unique:servers|min:2|max:100',
            'description'               =>'required|string|min:2|max:255',
            'date_expiration'           =>'required|date|after:today',
        ],[
            'name.required'             =>'Veuillez remplir ce champ',
            'name.unique'               =>'Cette valeur existe d??j??',
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
            'url_connexion.unique'      =>'Cette valeur existe d??j??',
            'description.required'      =>'Veuillez remplir ce champ',
            'description.min'           =>'Trop court',
            'description.max'           =>'Trop long',
            'date_expiration.required'  =>'Veuillez remplir ce champ',
            'date_expiration.date'      =>'Veuillez entrer une date',
            'date_expiration.after'     =>"Cette date doit etre ulterieure ?? la date d'aujourd'hui",
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
        $ser                    = new Server();
        $ser->name              = $data['name'];
        $ser->username          = $data['username'];
        $ser->password          = $data['password'];
        $ser->url_connexion     = $data['url_connexion'];
        $ser->description       = $data['description'];
        $ser->date_expiration   = $data['date_expiration'];
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
        $data = $request->only(['name','username','password','url_connexion','description','date_expiration']);
        $validator = Validator::make($data,[
            'name'          =>['required','string',Rule::unique('servers')->ignore($server->id),'min:2','max:50'],
            'username'      =>'required|string|min:2|max:50',
            'password'      =>'required|string|min:8',
            'url_connexion' =>['required','string',Rule::unique('servers')->ignore($server->id),'url','min:2','max:100'],
            'description'   =>'required|string|min:2|max:255',
            'date_expiration'           =>'required|date|after:today',
        ],[
            'name.required'             =>'Veuillez remplir ce champ',
            'name.unique'               =>'Cette valeur existe d??j??',
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
            'url_connexion.unique'      =>'Cette valeur existe d??j??',
            'description.required'      =>'Veuillez remplir ce champ',
            'description.min'           =>'Trop court',
            'description.max'           =>'Trop long',
            'date_expiration.required'  =>'Veuillez remplir ce champ',
            'date_expiration.date'      =>'Veuillez entrer une date',
            'date_expiration.after'     =>"Cette date doit etre ulterieure ?? la date d'aujourd'hui",
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()],422);
        }
            $server->name          = $data['name'];
            $server->username      = $data['username'];
            $server->password      = $data['password'];
            $server->url_connexion = $data['url_connexion'];
            $server->description   = $data['description'];
            $server->date_expiration  = $data['date_expiration'];
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
        if($server){
            $server->is_deleted = true;
            if($server->save()){
                return ['status'=>true];
            }
            return ['status'=>false];
        }
        return ['status'=>false];
    }

    public function getCountServers(){
        $servers = Server::query()->where('is_deleted',false)->count();
        return response()->json([
            "servers"=>$servers
        ]);
    }
    public function getExpireServer(){
        $date_actuelle = Carbon::now()->format('Y-m-d');
        /* $servers = Server::query()
                ->whereRaw(DB::raw("DATEDIFF(servers.date_expiration,'$date_actuelle')",'<=','7'))
                ->whereRaw(DB::raw("DATEDIFF(servers.date_expiration,'$date_actuelle')",'>=','0'))
                ->where('servers.is_deleted',false)
                ->count(); */
            $servers = DB::SELECT("SELECT COUNT(*) as nbr_servers FROM servers 
                WHERE DATEDIFF(servers.date_expiration,'$date_actuelle') <=7 
                AND   DATEDIFF(servers.date_expiration,'$date_actuelle') >=0 
                AND   servers.is_deleted = 0");
            $servers = $servers[0]->nbr_servers;
        return response()->json([
            "servers"=>$servers
        ]);
    }
}
