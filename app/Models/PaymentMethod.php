<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable=['name' , 'description'];

    public function paymentrole()
    {
        return $this->hasMany(PaymentRole::class);
    }
    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }
    public function expense()
    {
        return $this->hasMany(Expense::class);
    }
    public function income()
    {
        return $this->hasMany(Income::class);
    }
    
}
