<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    protected $table = 'telefonos';
    protected $primaryKey = 'id';
    protected $fillable = ['desc', 'num', 'proveedores_id'];
    public $timestamps = false;
}
