<?php

namespace CodizerTienda;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventario';
    protected $primaryKey = 'id';
    protected $fillable = ['products_id', 'cantidad', 'precio_venta','precio_compra'];
    public $timestamps = true;
}
