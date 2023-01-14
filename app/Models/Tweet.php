<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id'
    ];

    //relacionamento many (tweew) pra one(user) / (many to one)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relacionamento one to many - todas as curtidas de um tweet
    public function likes()
    {
        return $this->hasMany(Like::class)        //->where('user_id', auth()->user()->id); // opção 1 filtro user autentificado
                        ->where(function ($query) {
                            if (auth()->check()){
                                $query->where('user_id', auth()->user()->id);
                            }                            
                        });                            
    }
}
