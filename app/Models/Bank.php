<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [ 'name' ];

    public function account()
    {
        return $this->hasMany(Account::class);
    }

    public function branch()
    {
        return $this->hasMany(Branch::class);
    }
}
