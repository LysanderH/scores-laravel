<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'date'
    ];

    public function matches()
    {
        return $this->belongsToMany('App\Models\Match', 'participations');
    }
}
