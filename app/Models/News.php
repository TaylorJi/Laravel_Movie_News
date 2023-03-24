<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'picUrl',
        'is_active' => 1
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
