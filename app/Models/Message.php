<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\HybridRelations;

class Message extends Model
{
    use HybridRelations;

    protected $connection = 'sqlite';

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'garden_id',
        'message_text',
        'is_read',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id', '_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id', '_id');
    }

    public function garden()
    {
        return $this->belongsTo(Garden::class);
    }
}
