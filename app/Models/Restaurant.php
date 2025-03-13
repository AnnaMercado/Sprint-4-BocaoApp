<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $primaryKey = 'id_restaurant';
    protected $fillable =[
        'name',
        'link',
        'open_days',
    ];
}
