<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'author',
        'genre',
        'publisher',
        'isbn',
        'publication_year',
        'pages',
        'finished'
    ];
    //
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function review(): HasOne
    {
        return $this->hasOne(Review::class);
    }
}
