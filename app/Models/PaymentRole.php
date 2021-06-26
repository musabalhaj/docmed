<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentRole extends Model
{
    protected $fillable = [ 'patient_id','payment_method_id','service_id','amount','user_id' ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function paymentmethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
