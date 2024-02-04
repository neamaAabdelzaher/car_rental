<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


    protected $fillable=[

        'body',
        'name',
        'email',
        'car_id',
        'user_id',
      
    ];
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

public function replies()
{
    return $this->hasMany(Reply::class);
}
}
