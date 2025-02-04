<?php

namespace App\Models;

use App\Traits\Commentable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Kilobyteno\LaravelUserGuestLike\Traits\HasUserGuestLike;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Traits\HasStatuses;
use Illuminate\Database\Eloquent\SoftDeletes;

class Merchandise extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia, HasUserGuestLike, Commentable, HasStatuses;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'link',
        'price',
        'is_published',
        'published_at',
        'meta_description',
        'user_id'
    ];

    protected $casts = [
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
