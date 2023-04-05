<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
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
       /* $message = [
           "id" => $request->userid, //`id` is the id of the user to whom the message is being sent
           "sourceuserid" => Auth::user()->id,//`sourceid` is the user id who is sending the message
           "name" => Auth::user()->name, //and `name` is the username
           "message" => $request->message
       ]; */
       /* return response()->json([
            "sender_id"     =>Auth::user()->id,
            "sent_to_id"    =>$request->sent_to_id,
            "message"       =>$request->message,
       ]); */

       $message = [
           "sender_id"  =>Auth::user()->id,     //`sourceid` is the user id who is sending the message
           "sent_to_id" =>$request->sent_to_id ,    //`id` is the id of the user to whom the message is being sent
           //"name"       =>Auth::user()->name,  //and `name` is the username
           "message"    =>$request->message
       ];
       $sms = new Message;
       $sms->sender_id  = Auth::user()->id;
       $sms->sent_to_id = $request->sent_to_id;
       $sms->message    = $request->message;
       $sms->save();
       //event(new ChatMessage($message));
       //return "true";
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
        $messages = DB::SELECT("SELECT messages.message,messages.sender_id,messages.sent_to_id,messages.created_at
        FROM `messages` 
        WHERE   messages.sender_id 	    = ".$authId."
        AND     messages.sent_to_id 	= ".$sent_to_id."
        OR      messages.sender_id 		= ".$sent_to_id."
        AND     messages.sent_to_id 	= ".$authId." ");

        return response()->json([
            'status'=>true,
            'messages'=>$messages
        ]);
    }
}
