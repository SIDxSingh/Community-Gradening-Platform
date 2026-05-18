<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GardenLike extends Model
{
    protected $connection = 'sqlite';

    protected $table = 'garden_likes';

    protected $fillable = ['garden_id', 'session_id'];

    public function garden()
    {
        return $this->belongsTo(Garden::class);
    }
}
