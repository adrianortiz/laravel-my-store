<?php

namespace CodizerTienda;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Venta
 *
 * @mixin \Eloquent
 */
class Users_has_ventas extends Model
{
    protected $table = 'users_has_ventas';
    protected $fillable = ['users_id','ventas_id'];
    public $timestamps = false;
}
