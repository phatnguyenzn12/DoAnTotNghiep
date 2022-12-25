<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryWithdrawal extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'mentor_id',
        'money',
        'code',
        'time',
    ];

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }
}
