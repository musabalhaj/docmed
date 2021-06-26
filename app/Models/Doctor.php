<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [ 'name', 'address', 'password' , 'email', 'phone', 'identity_type','department_id',
                            'identity_number','bloodsymbol_id', 'maritalstatus_id','gender_id','role' ];

    
}
