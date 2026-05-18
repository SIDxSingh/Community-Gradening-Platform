<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Demonstrating Polyglot Persistence: Comments stored in SQLite
class GardenComment extends Model
{
    protected $connection = 'sqlite';

    protected $table = 'garden_comments';

    protected $fillable = ['garden_id', 'author_name', 'body'];

    public function garden()
    {
        return $this->belongsTo(Garden::class);
    }
}
