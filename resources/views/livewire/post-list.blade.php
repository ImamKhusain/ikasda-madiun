<div>
    <div class="flex items-center justify-between border-b border-t border-gray-100">
        <div class="text-gray-600">
            @if ($this->activeTag || $this->activeSubCategory || $search)
                <button class="gray-500 mr-3 text-xs" wire:click="clearFilters()">
                    X
                </button>
            @endif

            @if ($this->activeTag)
                <x-badge wire:navigate
                    href="{{ route('posts.detail', ['category' => $category, 'tag' => $this->activeTag->slug]) }}">
                    {{ $this->activeTag->name }}
                </x-badge>
            @endif

            @if ($this->activeSubCategory)
                <x-badge wire:navigate
                    href="{{ route('posts.detail', ['category' => $category, 'subCategory' => $this->activeSubCategory->slug]) }}">
                    {{ $this->activeSubCategory->name }}
                </x-badge>
            @endif

            @if ($search)
                <span class="ml-2">
                    containing :
                    <strong>{{ $search }}</strong>
                </span>
            @endif
        </div>
        <div id="filter-selector" class="flex items-center space-x-4 font-light">
            <button
                class="{{ $sort === 'desc' ? 'border-b border-gray-700 text-gray-900' : 'text-gray-500' }} py-2 text-gray-500"
                wire:click="setSort('desc')">
                Latest
            </button>
            <button
                class="{{ $sort === 'asc' ? 'border-b border-gray-700 text-gray-900' : 'text-gray-500' }} py-2 text-gray-900"
                wire:click="setSort('asc')">
                Oldest
            </button>
        </div>
    </div>
    <div class="py-4">
        @foreach ($this->posts as $post)
            <x-posts.post-item wire:key="{{ $post->id }}" :post="$post" />
        @endforeach
    </div>

    <div class="my-3">
        {{ $this->posts->onEachSide(1)->links() }}
    </div>
</div>
