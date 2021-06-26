<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [ 'name', 'address', 'email', 'phone', 'identity_type', 'identity_number',
                            'bloodsymbol_id', 'maritalstatus_id','gender_id','jop_id' ];
}
