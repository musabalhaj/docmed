<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestInfo extends Model
{
    protected $fillable = ['appointment_id', 'test_id' , 'result','price'];
}
