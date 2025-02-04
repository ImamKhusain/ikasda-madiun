<?php

namespace App\Models;

use App\Models\Presenters\CommentPresenter;
use App\Traits\Commentable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes, Commentable;

    protected $guarded = [];

    public function model(): MorphTo
    {
        return $this->morphTo();
    }

    public function author(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return CommentPresenter
     */
    public function presenter(): CommentPresenter
    {
        return new CommentPresenter($this);
    }

    /**
     * @return bool
     */
    public function isParent(): bool
    {
        return is_null($this->parent_id);
    }

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id')->oldest();
    }


    public function scopeForIp($query, string $ip)
    {
        return $query->where('ip', $ip);
    }

    public function scopeForUserAgent($query, string $userAgent)
    {
        return $query->where('user_agent', $userAgent);
    }

    public function scopeParent(Builder $builder): void
    {
        $builder->whereNull('parent_id');
    }
}
