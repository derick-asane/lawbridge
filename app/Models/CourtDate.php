<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourtDate extends Model
{
    use HasFactory;
    
    protected $table = 'courtdates';
    protected  $fillable = [
        'user_id',
        'court_id',
        'description',
        'datetime'
    ];

    public function court()
    {
        return $this->belongsTo(Court::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
