<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnos extends Model
{
    protected $fillable = ['appointment_id' , 'diagnos' , 'tretment'];

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

}
