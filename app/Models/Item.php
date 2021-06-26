<?php
 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable=['name' , 'description' , 'price' , 'qty' , 'category_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function bill(){
        return $this->hasMany(Bill::class);
    }
}
