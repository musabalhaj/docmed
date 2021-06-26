<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [ 'name','bank_id','branch_id','account_num','amount' ];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
