<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable =[
        'name',
        'qualification',
        'price_range',
        'adress',
        'open_days',
        'user_id',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
 
}