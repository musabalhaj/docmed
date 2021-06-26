<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['name' , 'doctor_id' , 'date' , 'email' , 'phone' , 'address' , 'note' , 'status'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
