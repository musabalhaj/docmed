<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $fillable = ['name','balance','type']; 

    public function expense()
    {
        return $this->hasMany(Expense::class);
    }
    public function income()
    {
        return $this->hasMany(Income::class);
    }

    public function bill(){
        return $this->hasMany(Bill::class);
    }
}
