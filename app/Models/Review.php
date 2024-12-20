<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Builder;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'body',
        'likes'
    ];

    protected $casts = ['created_at' => 'datetime'];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function users_who_like(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    public function scopePopular(Builder $query, $filter): void
    {
        if (!empty($filter) && $filter == 'popular') {
            $query->orderBy('likes', 'desc');
        }
    }
    public function scopeOwn(Builder $query, $filter): void
    {
        if (!empty($filter) && $filter == 'own') {
            $query->where('user_id', auth()->id());
        }
    }


}
