<?php

namespace CodizerTienda;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = 'ventas';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id'];
    public $timestamps = false;
}
