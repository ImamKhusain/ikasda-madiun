<?php

namespace App\Models\Presenters;

use Illuminate\Support\HtmlString;
use App\Models\Comment;
use Spatie\LaravelMarkdown\MarkdownRenderer;

class CommentPresenter
{
    /**
     * @var Comment
     */
    public Comment $comment;

    /**
     * @param  Comment  $comment
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return HtmlString
     */
    public function markdownBody(): HtmlString
    {
        return new HtmlString(app(MarkdownRenderer::class)->toHtml($this->comment->body));
    }

    /**
     * @return mixed
     */
    public function relativeCreatedAt(): mixed
    {
        return $this->comment->created_at->diffForHumans();
    }
}
