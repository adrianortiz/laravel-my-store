<?php

namespace CodizerTienda;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direcciones';
    protected $primaryKey = 'id';
    protected $fillable = ['desc', 'estado', 'municipio', 'colonia', 'calle', 'num', 'cp', 'proveedores_id'];
    public $timestamps = false;
}
