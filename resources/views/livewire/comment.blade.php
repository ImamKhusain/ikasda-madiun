<div>
    @if ($isEditing)
        @include(
            "livewire.partials.comment-form",
            [
                "method" => "editComment",
                "state" => "editState",
                "inputId" => "reply-comment",
                "inputLabel" => "Your Reply",
                "button" => "Edit Comment",
            ]
        )
    @else
        <article class="mb-1 rounded-lg bg-white p-3 text-base">
            <footer class="mb-1 flex items-center justify-between">
                <div class="flex items-center">
                    <p
                        class="mr-3 inline-flex items-center text-sm text-gray-900"
                    >
                        {{ Str::ucfirst("guest") }}
                    </p>
                    <p class="text-sm text-gray-600">
                        <time
                            pubdate
                            datetime="{{ $comment->presenter()->relativeCreatedAt() }}"
                            title="{{ $comment->presenter()->relativeCreatedAt() }}"
                        >
                            {{ $comment->presenter()->relativeCreatedAt() }}
                        </time>
                    </p>
                </div>
                <div class="relative">
                    <button
                        wire:click="$toggle('showOptions')"
                        class="inline-flex items-center rounded-lg bg-white p-2 text-center text-sm font-medium text-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-50"
                        type="button"
                    >
                        <svg
                            class="h-5 w-5"
                            aria-hidden="true"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"
                            ></path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    @if ($showOptions)
                        <div
                            class="absolute right-0 top-full z-10 mt-1 w-36 divide-y divide-gray-100 rounded bg-white shadow"
                        >
                            <ul class="py-1 text-sm text-gray-700">
                                <li>
                                    <button
                                        wire:click="$toggle('isEditing')"
                                        type="button"
                                        class="block w-full px-4 py-2 text-left hover:bg-gray-100"
                                    >
                                        Edit
                                    </button>
                                </li>
                                <li>
                                    <button
                                        x-on:click="confirmCommentDeletion"
                                        x-data="{
                                        confirmCommentDeletion() {
                                            if (window.confirm('You sure to delete this comment?')) {
                                                @this.call('deleteComment')
                                            }
                                        }
                                    }"
                                        class="block w-full px-4 py-2 text-left hover:bg-gray-100"
                                    >
                                        Delete
                                    </button>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>
            </footer>
            <div
                class="leading-1.5 flex flex-col rounded-e-xl rounded-es-xl border-gray-200 bg-gray-100 p-4"
            >
                <p class="text-gray-500">
                    {!! $comment->presenter()->markdownBody() !!}
                </p>
            </div>

            <div class="mt-4 flex items-center space-x-4">
                @include("livewire.partials.comment-reply")
            </div>
        </article>
    @endif

    @if ($isReplying)
        @include(
            "livewire.partials.comment-form",
            [
                "method" => "postReply",
                "state" => "replyState",
                "inputId" => "reply-comment",
                "inputLabel" => "Your Reply",
                "button" => "Post Reply",
            ]
        )
    @endif

    @if ($hasReplies)
        <article class="mb-1 ml-1 border-t border-gray-200 p-1 lg:ml-12">
            @foreach ($comment->children as $child)
                <livewire:comment :comment="$child" :key="$child->id" />
            @endforeach
        </article>
    @endif
</div>
