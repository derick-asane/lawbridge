<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file extends Model
{
    use HasFactory;

    protected $fillable=[
        'mycase_id',
        'file_path',
        'file_type',
        'file_name',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
