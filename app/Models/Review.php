<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory; 
    protected $fillable = [
        'rating',
        'comment',
        'user_id',
        'place_id',
    ];

    public function reviews (){
        return $this ->belongsTo(Place::class);
    }

    public function user (){
        return $this ->belongsTo(User::class);
    }

}
