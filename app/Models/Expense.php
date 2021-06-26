<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [ 'date' , 'amount', 'supplier_id','description', 'payment_method_id', 'cat_id' ,'added_by' ];

    public function paymentmethod(){
        return $this->belongsTo(PaymentMethod::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    public function cat(){
        return $this->belongsTo(Cat::class);
    }

}
