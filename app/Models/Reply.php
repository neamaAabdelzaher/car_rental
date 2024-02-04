<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $fillable=[

        'name',
        'body',
        'comment_id',
        'user_id',
      
    ];

    public function comment()
{
    return $this->belongsTo(Comment::class);

}

}
