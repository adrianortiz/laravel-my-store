<?php

namespace CodizerTienda;

use Illuminate\Database\Eloquent\Model;

class Correo extends Model
{
    protected $table = 'correo';
    protected $primaryKey = 'id';
    protected $fillable = ['desc', 'correo', 'proveedores_id'];
    public $timestamps = false;
}
