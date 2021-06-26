<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [ 'name', 'address', 'password' , 'email', 'phone','department_id', 'identity_type',
                'identity_number','bloodsymbol_id', 'maritalstatus_id','gender_id','role', 'jop_id','doctor_price' ];
                            
    public function gender(){
        return $this->belongsTo(Gender::class);
    }

    public function maritalstatus(){
        return $this->belongsTo(MaritalStatus::class);
    }

    public function bloodsymbol(){
        return $this->belongsTo(BloodSymbol::class);
    }
    public function jop(){
        return $this->belongsTo(Jop::class);
    }
    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function paymentrole()
    {
        return $this->hasMany(PaymentRole::class);
    }
    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }
    public function salary(){
        return $this->hasMany(Salary::class);
    }
    public function expense()
    {
        return $this->hasMany(Expense::class);
    }
    public function income()
    {
        return $this->hasMany(Income::class);
    }
    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }
}
