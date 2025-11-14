<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Car extends Model {
    protected $fillable = ['title','slug','model','year','description','price','main_image','gallery','status'];
    protected $casts = ['gallery'=>'array'];
}
