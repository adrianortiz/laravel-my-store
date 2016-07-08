<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 07/07/2016
 * Time: 11:42 PM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;


class Categoria extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
    public $timestamps = false;
}