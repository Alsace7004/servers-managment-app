<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outil extends Model
{
    use HasFactory;

    protected $fillable = ['name','username','password','url','is_deleted','type_outil_id'];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
}