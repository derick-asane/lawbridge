<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'meeting_id', 'scheduled_at', 'subject'];

    // Define the relationship with the User (client)
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}
