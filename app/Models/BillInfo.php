<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillInfo extends Model
{
    protected $fillable = [ 'bill_id' , 'item' , 'quantity' , 'price', 'amount'  ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
}
