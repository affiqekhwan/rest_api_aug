<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'email',
        'Phone No',
        'image_url',
        'description',
        'avg_rating',
    ];

    public function reviews (){
        return $this ->hasMany(Review::class);
    }

    public function facility (){
        return $this ->belongToMany(Facility::class);
    }


}
