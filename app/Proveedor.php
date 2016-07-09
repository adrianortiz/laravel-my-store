<?php

namespace CodizerTienda;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';
    protected $primaryKey = 'id';
    protected $fillable = ['nom_empresa', 'nom_contacto', 'ap_paterno', 'ap_materno'];
    public $timestamps = false;
}
