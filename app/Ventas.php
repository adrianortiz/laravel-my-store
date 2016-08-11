<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Venta
 *
 * @mixin \Eloquent
 */
class Ventas extends Model
{
    protected $table = 'ventas';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','total'];
    public $timestamps = false;
}
