<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'price'];

    public function tourGuides()
    {
        return $this->belongsToMany(User::class, 'tour_guide_tour');
    }
}
