<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable=['doctor_id' , 'days' , 'start_at' ,'end_at' , 'status'];

    public function user(){
        return $this->hasMany(User::class);
    }
}
