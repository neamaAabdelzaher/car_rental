<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'price',
        'passengers',
        'doors',
        'luggage',
        'is_active',
        'description',
        'image',
        'category_id',
        'user_id'
    ]; 


    public function category(){
        return $this->belongsTo(Category::class);
    }

 
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
