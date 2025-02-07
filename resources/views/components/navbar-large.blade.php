<div id="navbar-hamburger"
    class="fixed top-48 text-lg text-white z-50 bg-primary w-full h-fit flex flex-col border-t-2 border-secondary">
    <!-- Menu Utama -->
    <div class="flex flex-row overflow-x-auto w-full h-auto border-b border-white px-14 gap-10">
        <a data-menu id="ikasda" href="#" class="flex items-center text-black p-4">
            <div class="ml-2 text-left">
                <h1 class="font-bold">Tentang Ikasda</h1>
            </div>
        </a>
        <a data-menu id="berita-ikasda" href="{{ route('posts.index') }}" class="flex items-center text-black p-4">
            <div class="ml-2 text-left">
                <h1 class="font-bold">Berita Ikasda</h1>
            </div>
        </a>
        <button data-menu id="layanan-alumni" class="cursor-pointer flex items-center text-black p-4">
            <div class="ml-2 text-left">
                <h1 class="font-bold">Layanan Alumni</h1>
            </div>
        </button>
        <button data-menu id="data-alumni" class="cursor-pointer flex items-center text-black p-4">
            <div class="ml-2 text-left">
                <h1 class="font-bold">Data alumni</h1>
            </div>
        </button>
        <a data-menu id="market-alumni" href="{{ route('merchandise.index') }}"
            class="flex items-center text-black p-4">
            <div class="ml-2 text-left">
                <p class="font-bold">Market Alumni</p>
            </div>
        </a>
    </div>

    <!-- Sub Menu -->
    <div class="flex flex-row w-full h-auto px-14">
        <div data-menu data-menu-target="ikasda" id="submenu-tentang-ikasda"
            class="hidden flex-col gap-2 overflow-x-auto w-full border-b border-white py-4 px-6">
            @foreach ($this->organizationals as $organizational)
                @if ($organizational->slug !== 'contact' && $organizational->slug !== 'general')
                    <a wire:key="{{ $organizational->id }}" href="{{ route('abouts.show', $organizational->slug) }}"
                        class="text-base hover:text-black p-3">
                        {{ $organizational->title }}
                    </a>
                @endif
            @endforeach
        </div>
        <div data-menu data-menu-target="berita-ikasda"
            class="hidden flex-col gap-2 overflow-x-auto w-full border-b border-white py-4 px-6">
            <div class="flex flex-row">
                @foreach ($this->posts as $post)
                    <div id="{{ $post->slug }}" data-menu data-submenu="{{ $post->slug }}"
                        wire:key="{{ $post->id }}" class="flex items-center pr-2">
                        <a href="{{ route('posts.detail', $post->slug) }}" class="text-base hover:text-black p-3">
                            {{ $post->name }}
                        </a>
                        <img src="/images/navbar/arrow.svg" alt="arrow" class="w-5 aspect-square">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Bagian Sub Sub Menu -->
    <div class="flex flex-row w-full h-auto">
        <div data-menu data-menu-target="artikel" class="hidden flex-col overflow-x-auto w-full py-4 px-6">
            @foreach ($this->subPosts('artikel') as $subpost)
                <a wire:key="{{ $subpost->id }}"
                    href="{{ route('posts.detail', ['category' => 'artikel', 'subCategory' => $subpost->slug]) }}"
                    class="text-base hover:text-[#F5D05E] p-3">
                    {{ $subpost->name }}
                </a>
            @endforeach
        </div>
        <div data-menu data-menu-target="mini-blog" class="hidden flex-col overflow-x-auto w-full py-4 px-6">
            @foreach ($this->subPosts('mini-blog') as $subpost)
                <a wire:key="{{ $subpost->id }}"
                    href="{{ route('posts.detail', ['category' => 'mini-blog', 'subCategory' => $subpost->slug]) }}"
                    class="text-base hover:text-[#F5D05E] p-3">
                    {{ $subpost->name }}
                </a>
            @endforeach
        </div>
    </div>
</div>
