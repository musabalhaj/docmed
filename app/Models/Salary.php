<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [ 'user_id' , 'salary' , 'allowance' , 'incentive' , 'deduction' , 'total_salary' ];

    public function user()
    {
        return $this->belongsTo(User::class);
    } 
}
