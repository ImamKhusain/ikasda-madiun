<?php

namespace App\Traits;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Commentable
{
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'model', 'model_type', 'model_id')->latest('id');
    }

    /**
     * @param Model|null $author
     * @return $this
     */
    public function comment(?Model $author = null, $comment): self
    {
        return $this->createComment($author, $comment);
    }

    private function createComment($author, $comment)
    {
        if ($author) {
            $keyName = $author->getKeyName();
            $this->comments()->create([
                'author_id' => $author->$keyName,
                'author_type' => $author->getMorphClass(),
                'body' => $comment['body'],
            ]);

        } else {
            $ip = request()->ip();
            $userAgent = request()->userAgent();

            $this->comments()->create([
                'ip' => $ip,
                'user_agent' => $userAgent,
                'body' => $comment['body'],
            ]);
        }

        return $this;
    }

    public function replyComment(?Model $author = null, $comment): self
    {
        return $this->createReplyComment($author, $comment);
    }

    private function createReplyComment($author, $comment)
    {
        if ($author) {
            $keyName = $author->getKeyName();
            $reply = $this->children()->make([
                'author_id' => $author->$keyName,
                'author_type' => $author->getMorphClass(),
                'body' => $comment['body'],
            ]);
            $reply->model()->associate($this->model);
            $reply->save();
        } else {
            $ip = request()->ip();
            $userAgent = request()->userAgent();

            $reply = $this->children()->make([
                'ip' => $ip,
                'user_agent' => $userAgent,
                'body' => $comment['body'],
            ]);
            $reply->model()->associate($this->model);
            $reply->save();
        }

        return $this;
    }



}
