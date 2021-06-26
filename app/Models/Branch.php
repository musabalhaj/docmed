<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [ 'name','bank_id' ];

    public function account()
    {
        return $this->hasMany(Account::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
