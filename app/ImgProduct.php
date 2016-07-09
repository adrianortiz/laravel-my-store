<?php

namespace CodizerTienda;

use Illuminate\Database\Eloquent\Model;

class ImgProduct extends Model
{
    protected $table = 'img_products';
    protected $primaryKey = 'id';
    protected $fillable = ['img_name', 'products_id'];
    public $timestamps = false;
}
