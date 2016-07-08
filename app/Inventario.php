<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventario';
    protected $primaryKey = 'id';
    protected $fillable = ['products_id', 'precio_base', 'cantidad'];
    public $timestamps = true;
}
