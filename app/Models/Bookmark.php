<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = [
        'author',
        'title',
        'category',
        'image',
        'url',
        'description',
        'logo',
        'user_id'
    ];

    //Relation to user
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
