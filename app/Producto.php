<?php

namespace CodizerTienda;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'desc', 'price', 'quantity', 'offert', 'available', 'categories_id', 'img_name', 'proveedores_id'];
    public $timestamps = true;
}
