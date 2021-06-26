<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = [ 'date' , 'amount', 'description', 'cat_id'  ,'added_by' ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function cat(){
        return $this->belongsTo(Cat::class);
    }
}
