<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'password' , 'email', 'phone','department_id', 'identity_type',
        'identity_number','bloodsymbol_id', 'maritalstatus_id','gender_id','role', 'jop_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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
    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }
}
