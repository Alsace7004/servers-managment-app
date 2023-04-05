<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['sender_id','sent_to_id','message'];

    // A message belongs to a sender
    public function sender()
    {
        return $this->belongsTo(Staff::class, 'sender_id');
    }

    // A message also belongs to a receiver    
    public function receiver()
    {
        return $this->belongsTo(Staff::class, 'sent_to_id');
    }
}
