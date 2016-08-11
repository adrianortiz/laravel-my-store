<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Venta
 *
 * @mixin \Eloquent
 */
class Ventas_has_products extends Model
{
    protected $table = 'ventas_has_products';
    protected $fillable = ['users_id','ventas_id'];
    public $timestamps = false;
}
