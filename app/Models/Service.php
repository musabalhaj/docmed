<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [ 'name' , 'description' , 'price' , 'status'];

    public function paymentrole(){
        return $this->hasMany(PaymentRole::class);
    }
    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }
}
