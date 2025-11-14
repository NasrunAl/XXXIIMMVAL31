<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    protected $fillable = ['car_id','buyer_name','buyer_email','buyer_phone','buyer_address','status','amount'];
    public function car(){ return $this->belongsTo(Car::class); }
}
