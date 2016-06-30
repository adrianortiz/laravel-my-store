<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    protected $primaryKey = 'id';
    protected $fillable = ['img_name', 'title', 'dec'];
    public $timestamps = true;
}
