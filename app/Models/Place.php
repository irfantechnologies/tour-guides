<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function placetype(){
        return $this->belongsTo(Placetype::class);
    }

    public function district(){
        return $this->belongsTo(District::class);
    }

    public function packages(){
        return $this->belongsToMany(Package::class);
    }

    public function getImageAttribute($value)
    {
        return asset('storage/place/' . $value);
    }
}
