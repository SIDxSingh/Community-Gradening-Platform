<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\HybridRelations;

class Garden extends Model
{
    use HybridRelations;

    protected $connection = 'sqlite';

    protected $fillable = [
        'title',
        'description',
        'size',
        'location',
        'image',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', '_id');
    }

    public function comments()
    {
        return $this->hasMany(GardenComment::class);
    }

    public function likes()
    {
        return $this->hasMany(GardenLike::class);
    }

    public function isLikedBySession(string $sessionId): bool
    {
        return $this->likes()->where('session_id', $sessionId)->exists();
    }
}
