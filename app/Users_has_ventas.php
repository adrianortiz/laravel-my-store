<?php

namespace CodizerTienda;

use Illuminate\Database\Eloquent\Model;

/**
 * CodizerTienda\Venta
 *
 * @mixin \Eloquent
 */
class Users_has_ventas extends Model
{
    protected $table = 'users_has_ventas';
    protected $primaryKey = 'users_id';
    protected $fillable = ['users_id','ventas_id', 'user_direccion_id'];
    public $timestamps = false;
}
