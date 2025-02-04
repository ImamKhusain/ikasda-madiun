<div class="comments-box mt-10 w-full">
    <div class="mb-6 flex items-center justify-between">
        <h2 class="text-lg font-bold text-gray-900">
            Comments ({{ $comments->count() }})
        </h2>
    </div>

    @include(
        "livewire.partials.comment-form",
        [
            "method" => "postComment",
            "state" => "newCommentState",
            "inputId" => "comment",
            "inputLabel" => "Your comment",
            "button" => "Post comment",
        ]
    )

    <div class="user-comments px-3">
        @forelse ($comments as $comment)
            <livewire:comment :$comment :key="$comment->id" />
        @empty
            <div class="text-center text-gray-500">
                <span>No Comments Posted</span>
            </div>
        @endforelse
    </div>
    <div class="my-2">
        {{ $comments->links() }}
    </div>
</div>
