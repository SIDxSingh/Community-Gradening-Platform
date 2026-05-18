<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

// Plant was already in MongoDB — connection is now the default
class Plant extends Model
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'name',
        'species',
        'sunlight_requirement',
        'water_frequency',
    ];
}
