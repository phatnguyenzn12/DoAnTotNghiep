<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\DatabaseNotification;

class Notification extends DatabaseNotification
{
    use HasFactory;

    protected $appends = [
        'info'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'notifiable_id');
    }

    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'notifiable_id');
    }

    public function getInfoAttribute()
    {
        if ($this->user) {
            return $this->user;
        }
        return $this->mentor;
    }
}
