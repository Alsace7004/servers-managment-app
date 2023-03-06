<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Http\Traits\LaravelPermissionToVueJsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    use HasApiTokens,HasFactory,Notifiable,HasRoles,LaravelPermissionToVueJsTrait;
    protected $guard = 'staffs';

    protected  $fillable = ['nom','prenom','adresse',
                            'email','photo','departement_id',
                            'type_staff_id','is_deleted',
                            'password','checked'];
}
