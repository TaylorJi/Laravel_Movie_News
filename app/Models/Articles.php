<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'picUrl',
        'newsletter_id'
    ];
    protected $table = 'articles';

    public function newsletter()
    {
        return $this->belongsTo(News::class, 'newsletter_id', 'id');
    }


}