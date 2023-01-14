<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'tweet_id'
    ];


    // relacionamento many to one
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relacionamento many to one
    public function tweet()
    {
        return $this->belongsTo(Tweet::class);
    }

    
}
