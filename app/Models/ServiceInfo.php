<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceInfo extends Model
{
    protected $fillable = ['appointment_id','service_id','price'];
}
