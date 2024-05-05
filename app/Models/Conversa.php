<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversa extends Model
{
    use HasFactory;

    public function recipients() {
        return $this->belongsToMany(User::class);
    }

    public function messages() {
        return $this->belongsToMany(Message::class);
    }
}
