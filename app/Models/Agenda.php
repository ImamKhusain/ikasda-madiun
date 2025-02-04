<?php

namespace App\Models;

use App\Traits\Commentable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kilobyteno\LaravelUserGuestLike\Traits\HasUserGuestLike;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Traits\HasStatuses;

class Agenda extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia,  HasStatuses;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'datetime',
        'bg_color',
        'is_published',
        'published_at',
        'meta_description',
        'user_id'
    ];

    protected $casts = [
        'datetime' => 'datetime',
        'published_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopePublished($query)
    {
        $query->currentStatus('published')->where('is_published', true);
    }
}
