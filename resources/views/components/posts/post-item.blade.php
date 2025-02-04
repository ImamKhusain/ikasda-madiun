@props([
    "post",
])

<article class="border-gray-100 pb-10 [&:not(:last-child)]:border-b">
    <div
        class="article-body mt-5 grid grid-cols-1 items-start gap-3 md:grid-cols-12"
    >
        <div class="col-span-1 md:col-span-4">
            <a
                href="{{ route("posts.show", ["category" => $post->categories->slug, "post" => $post->slug]) }}"
            >
                <img
                    class="h-40 w-full rounded"
                    src="{{ $post->getFirstMediaUrl() }}"
                    alt="{{ $post->title }}"
                />
            </a>
        </div>
        <div class="col-span-1 pl-3 md:col-span-8">
            <div class="article-meta flex items-center py-1 text-sm">
                <span class="mr-1 text-xs">{{ $post->user->name }}</span>
                <span class="text-xs text-gray-500">
                    . {{ $post->published_at->diffForHumans() }}
                </span>
            </div>
            <h2 class="text-sm font-bold text-gray-900 md:text-base">
                <a
                    href="{{ route("posts.show", ["category" => $post->categories->slug, "post" => $post->slug]) }}"
                >
                    {{ $post->title }}
                </a>
            </h2>
            @if ($post->categories->name === "artikel" || $post->categories->name === "mini-blog")
                <div class="w-fit rounded-md bg-slate-500 p-1">
                    @if ($post->subCategories->first())
                        <p class="text-xs leading-3 text-[#FFDF4E]">
                            {{ $post->subCategories->first()->name }}
                        </p>
                    @endif
                </div>
            @endif

            <p class="mt-2 block text-xs font-light text-gray-700 md:hidden">
                {{ Illuminate\Support\Str::limit(strip_tags($post->excerpt()), 50) }}
            </p>
            <p
                class="mt-2 hidden text-sm font-light text-gray-700 md:block lg:hidden"
            >
                {{ Illuminate\Support\Str::limit(strip_tags($post->excerpt()), 300) }}
            </p>
            <p class="mt-2 hidden text-sm font-light text-gray-700 lg:block">
                {{ Illuminate\Support\Str::limit(strip_tags($post->excerpt()), 400) }}
            </p>
            <div
                class="article-actions-bar mt-6 flex flex-col items-start gap-y-3 md:flex-row md:items-center md:justify-between"
            >
                <div class="flex gap-x-2">
                    @foreach ($post->tags as $tag)
                        <x-badge
                            wire:navigate
                            href="{{ route('posts.detail', ['category' => $post->categories->slug, 'tag' => $tag->slug]) }}"
                        >
                            {{ $tag->name }}
                        </x-badge>
                    @endforeach

                    <div class="hidden items-center space-x-4 md:flex">
                        <span class="text-sm text-gray-500">
                            {{ $post->getReadingTime() }} min read
                        </span>
                    </div>
                </div>

                <div class="flex gap-2">
                    <span class="flex gap-3">
                        <img src="/images/view.png" alt="view" class="w-5" />
                        {{ $post->getPageViews() }}
                    </span>
                    <livewire:like-button
                        :key="'like-' . $post->id"
                        :model="$post"
                    />
                </div>
            </div>
        </div>
    </div>
</article>
