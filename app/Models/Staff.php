<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected  $fillable = ['nom','prenom','adresse',
                            'email','photo','departement_id',
                            'type_staff_id','role_id','is_deleted'];
}
