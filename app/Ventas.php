<?php

namespace CodizerTienda;

use Illuminate\Database\Eloquent\Model;

/**
 * CodizerTienda\Venta
 *
 * @mixin \Eloquent
 */
class Ventas extends Model
{
    protected $table = 'ventas';
    protected $primaryKey = 'id';
    protected $fillable = ['total'];
    public $timestamps = false;
}
