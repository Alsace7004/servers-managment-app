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
    {   
        $date_actuelle = Carbon::now()->format('Y-m-d');

        $domaines = DB::SELECT("SELECT domaines.id,nom_domaine,servers.name,registre,date_expiration,
                    CASE WHEN DATEDIFF(domaines.date_expiration,'$date_actuelle') <= 0 THEN 'expiré(e)'
                        ELSE DATEDIFF(domaines.date_expiration,'$date_actuelle')
                    END AS thediff
                    FROM domaines,servers
                    WHERE DATEDIFF(domaines.date_expiration,'$date_actuelle') <=7 
                    AND domaines.server_id = servers.id");

        Mail::to('Olamide@badoshness.lekki')->send(new DomaineExpire($domaines));

        for($i=0;$i<sizeof($domaines);$i++){
            
            $date_expiration = $domaines[$i]->date_expiration;
            $id              = $domaines[$i]->id; // id
            $toDate          = Carbon::parse($date_actuelle);
            $fromDate        = Carbon::parse($date_expiration);
            //$days            = $toDate->diffInDays($fromDate);
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
        }
        return Command::SUCCESS;
    }
}
