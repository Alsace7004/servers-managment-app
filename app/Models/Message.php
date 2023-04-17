<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    /* protected function createdAt():Attribute{
        return Attribute::make(
            //get:fn($value)=>ucfirst($value),
            get:fn($value)=>Carbon::parse($value)->format("d/m/Y H:i:m"),
        );
    } */
    /* protected function message():Attribute{
        return Attribute::make(
            get:fn($value)=>ucfirst($value)
        );
    } */
    /* public function getCreatedAtAttribute($value)
    {
        //return ucfirst($value);
        return Carbon::parse($value)->format("d/m/Y H:i");
    } */
    /* public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at->format('H:i d, M Y');
    } */
    /* public function getCreatedAtFormattedAttribute($value)
    {
        return Carbon::parse($value)->format("d/m/Y H:i");
    } */

    /* public function getMessageAttribute($value)
    {
        return ucfirst($value);
    } */
}
