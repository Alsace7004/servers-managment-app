<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Message;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }
    //
    public function sendMessage(Request $request)
    {
        $image=($request->file('photo'));
        //dd($image);

        $message = [
            "sender_id"  =>Auth::user()->id,     //`sourceid` is the user id who is sending the message
            "sent_to_id" =>$request->sent_to_id ,//`id` is the id of the user to whom the message is being sent
            "message"    =>$request->message
        ];
        if($image == null){
            $sms = new Message;
            $sms->sender_id  = Auth::user()->id;
            $sms->sent_to_id = $request->sent_to_id;
            $sms->message    = $request->message;
            $sms->save();
        }else{
            if($image=($request->file('photo'))){
                    $destinationPath = public_path('img_path/ChatMessages');
                    $messageImage = date('YmdHis').".".$image->getClientOriginalExtension();
                    $image->move($destinationPath,$messageImage);
            }
            $sms = new Message;
            $sms->sender_id  = Auth::user()->id;
            $sms->sent_to_id = $request->sent_to_id;
            $sms->message    = $request->message;
            $sms->photo      = $messageImage;
            $sms->save();
        }
       
       broadcast(new MessageSent($sms))->toOthers();
        return response()->json([
            "status"     =>true,
            "message"    =>"message envoyé avec succes",
        ]);
    }
    //
    public function fetchMessages(Request $request){
        $sent_to_id = $request->sent_to_id;  
        $authId = Auth::user()->id;
        $messages = DB::SELECT("SELECT messages.message,messages.sender_id,messages.sent_to_id,messages.photo,messages.created_at
        FROM `messages` 
        WHERE   messages.sender_id 	    = ".$authId."
        AND     messages.sent_to_id 	= ".$sent_to_id."
        OR      messages.sender_id 		= ".$sent_to_id."
        AND     messages.sent_to_id 	= ".$authId." ");
        //dd($messages[0]->created_at);
        //Carbon::parse($messages[0]->created_at)->format("d/m/Y H:i");
        //dd($messages);
        return response()->json([
            'status'=>true,
            'messages'=>$messages
        ]);
    }
}
