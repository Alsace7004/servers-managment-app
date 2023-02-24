<?php

namespace App\Console\Commands;

use App\Mail\DomaineExpire;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Domaine;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class DomaineExpiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'domaine:expiration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "  lorsque la date d'expiration est à une semaine de la date actuel, 
                                on envoie une notification par mail à l'administrateur
                                pour lui prevenir/informer et on donne la date d'expiration";

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   $domaines = Domaine::query()->select('id','nom_domaine','hebergeur','registre','date_expiration')->get();
        //$domaines = Domaine::query()->select('id','date_expiration')->get();
        $user = User::query()->select('id','email')->where('id',1)->get();
        for($i=0;$i<sizeof($domaines);$i++){
            $date_actuelle = Carbon::now()->format('Y-m-d');
            $date_expiration = $domaines[$i]->date_expiration;
            $id = $domaines[$i]->id; // id
            $toDate     = Carbon::parse($date_actuelle);
            $fromDate   = Carbon::parse($date_expiration);
            $days       = $toDate->diffInDays($fromDate);
            /**************************************************************************/
            //si date_expiration == date_aujourd'hui
                //==> On met le status a 1
            if($toDate >= $fromDate){
                Log::info("Status a 1 : toDate:{$toDate} | fromDate:{$fromDate}");
                DB::UPDATE("UPDATE domaines SET status=1 WHERE id= $id");
            }else{
                Log::info("Status a 0 : toDate:{$toDate} | fromDate:{$fromDate}");
                DB::UPDATE("UPDATE domaines SET status=0 WHERE id= $id");
            }
            /**************************************************************************/
            //si date_expiration - date_actuelle <= 7j
                //==> on envoie des notifications
                if($days == 7){
                    Mail::to($user[0]->email)->send(new DomaineExpire($domaines[$i]));

                    /* Mail::raw("Domaine qui arriverons à echeance dans une semaine \n 
                            Nom de domaine :{$domaines[$i]->nom_domaine} \n 
                            Hebergeur :{$domaines[$i]->hebergeur}  \n 
                            Registre :{$domaines[$i]->registre} \n 
                            Date d'expiration : {$domaines[$i]->date_expiration}", 
                        function ($mail) use ($user) {
                            $mail->from('me@thewebscrapper.com');
                            $mail->to($user[0]->email)
                                ->subject('Domaine qui expireront dans 1 semaine');
                    }); */
                    Log::info("\n 
                                Domaine qui arriverons à echeance dans une semaine \n 
                                Nom de domaine :{$domaines[$i]->nom_domaine} \n 
                                Hebergeur :{$domaines[$i]->hebergeur}  \n 
                                Registre :{$domaines[$i]->registre} \n 
                                Date d'expiration : {$domaines[$i]->date_expiration}");
                    //Log::info("{$user[0]->email} Domaine qui arriverons a echeance dans une semaine : {$domaines[$i]->id}---{$date_expiration}");
                }
          
        }
        return Command::SUCCESS;
    }
}
