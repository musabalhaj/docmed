<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [ 'bill_id' , 'supplier_id' , 'bill_date' , 'due_date', 'cat_id', 'note' , 'amount' ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function cat()
    {
        return $this->belongsTo(Cat::class);
    }
    public function billinfo()
    {
        return $this->hasMany(BillInfo::class);
    }
}
