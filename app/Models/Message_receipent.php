<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message_receipent extends Model
{
    use HasFactory;

    protected $fillable = ['recipient_id', 'message_id'];

    public function User()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }

    public function Message()
    {
        return $this->belongsTo(Message::class, 'message_id');
    }
}
