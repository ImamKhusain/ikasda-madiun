<?php

namespace App\Models;

use App\Traits\Commentable;
use App\Traits\HasPageViewCounter;
use App\Traits\HasStatuses;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Str;
use Kilobyteno\LaravelUserGuestLike\Traits\HasUserGuestLike;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Tags\HasTags;

class Post extends Model implements HasMedia
{
    use HasFactory,
        SoftDeletes,
        InteractsWithMedia,
        HasTags,
        HasUserGuestLike,
        Commentable,
        HasStatuses,
        HasPageViewCounter;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'content',
        'is_published',
        'published_at',
        'meta_description',
        'user_id'
    ];

    protected $casts = [
        'content' => 'array',
        'published_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function subCategories(): MorphToMany
    {
        return $this->morphToMany(Category::class, 'categoriable');
    }

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function excerpt(): string
    {
        $content = "";
        foreach ($this->content as $item) {
            if (isset($item['type']) && $item['type'] === 'paragraph') {
                $content .= strip_tags($item['data']['content']);
            }
        }

        return Str::words(strip_tags($content), 200, '...');
    }

    public function scopePublished($query)
    {
        $query->currentStatus('published')->where('is_published', true);
    }

    public function scopeWithCategory($query, string $category = '')
    {
        $query->whereHas('categories', function ($query) use ($category) {
            $query->where('slug', $category);
        });
    }
    
    public function scopeWithSubCategory($query, string $subCategory = '')
    {
        $query->whereHas('subCategories', function ($query) use ($subCategory) {
            $query->where('slug', $subCategory);
        });
    }

    public function scopeSearch($query, string $search = '')
    {
        $query->where('title', 'like', "%{$search}%");
    }

    public function getReadingTime()
    {
        $content = "";
        foreach ($this->content as $item) {
            if (isset($item['type']) && $item['type'] === 'paragraph') {
                $content .= strip_tags($item['data']['content']);
            }
        }

        $mins = round(str_word_count($content) / 250);

        return ($mins < 1) ? 1 : $mins;
    }
}
