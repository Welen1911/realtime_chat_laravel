<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'sender_id',
        'receiver_id',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'properties' => 'collection',
        'created_at' => 'datetime:d/m/Y H:i:s',
    ];
    protected $dates = ['created_at'];
}
