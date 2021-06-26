<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reception extends Model
{
    protected $fillable = [ 'name', 'address', 'password' , 'email', 'phone', 'identity_type','specialization',
                            'identity_number','bloodsymbol_id', 'maritalstatus_id','gender_id','role' ];

}
