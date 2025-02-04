<div>
    <h3 class="mb-3 md:text-xs lg:text-base font-semibold text-gray-900">RECOMMENDED TOPICS</h3>
    <div class="topics flex flex-wrap justify-start gap-2">
        @foreach ($tags as $tag)
            <x-badge
                wire:navigate
                href="{{ route('posts.detail', ['category' => $category, 'tag' => $tag->slug]) }}"
            >
                {{ $tag->name }}
            </x-badge>
        @endforeach
    </div>
</div>
