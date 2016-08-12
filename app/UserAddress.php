<?php

namespace CodizerTienda;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    //
    protected $table = 'user_direction';
    protected $primaryKey = 'id';
    protected $fillable = ['desc', 'estado', 'municipio', 'colonia', 'calle', 'num', 'cp', 'users_id'];
    protected $hidden = ['users_id'];
    public $timestamps = false;
}
