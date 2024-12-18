<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = "banner";
    protected $fillable = ['name', 'description', 'image'];
    
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'image' => 'string',
    ];

    
    public function getImageAttribute($value)
    {
        return asset('storage/banner/' . $value);
    }


}