<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['name' , 'email' , 'address' , 'phone' , 'status'];

    public function expens(){
        return $this->hasMany(Expense::class);
    }
    public function bill(){
        return $this->hasMany(Bill::class);
    }
}
