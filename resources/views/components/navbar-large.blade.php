<div id="navbar-hamburger" class="fixed top-16 text-lg text-white z-50 bg-black w-full h-fit flex flex-col">
    <!-- Menu Utama -->
    <div class="flex flex-row overflow-x-auto w-full h-auto border-b border-white px-14">
        <a data-menu id="isr" href="#" class="flex items-center hover:text-[#F5D05E] p-4">
            <img src="/images/navbar/isr.svg" alt="isr" class="w-12 aspect-square">
            <div class="ml-2 text-left">
                <h1 class="font-bold">Tentang Ikasda</h1>
            </div>
        </a>
        <a data-menu id="ilmiah" href="{{ route('posts.index') }}"
            class="flex items-center hover:text-[#F5D05E] p-4">
            <img src="/images/navbar/ilmiah.svg" alt="ilmiah" class="w-12 aspect-square">
            <div class="ml-2 text-left">
                <h1 class="font-bold">Berita Ikasda</h1>
            </div>
        </a>
        <button data-menu id="departemen" class="cursor-pointer flex items-center hover:text-[#F5D05E] p-4">
            <img src="/images/navbar/departemen.svg" alt="departemen" class="w-12 aspect-square">
            <div class="ml-2 text-left">
                <h1 class="font-bold">Layanan Alumni</h1>
            </div>
        </button>
        <button data-menu id="rekrutmen" class="cursor-pointer flex items-center hover:text-[#F5D05E] p-4">
            <img src="/images/navbar/rekrutmen.svg" alt="rekrutmen" class="w-12 aspect-square">
            <div class="ml-2 text-left">
                <h1 class="font-bold">Data alumni</h1>
            </div>
        </button>
        <a data-menu id="market" href="{{ route('merchandise.index') }}"
            class="flex items-center hover:text-[#F5D05E] p-4">
            <img src="/images/navbar/market.svg" alt="market" class="w-12 aspect-square">
            <div class="ml-2 text-left">
                <p class="font-bold">Market Alumni</p>
            </div>
        </a>
    </div>

    <!-- Sub Menu -->
    <div class="flex flex-row w-full h-auto px-14">
        <div data-menu data-menu-target="isr" id="submenu-isr"
            class="hidden flex-col gap-2 overflow-x-auto w-full border-b border-white py-4 px-6">
            @foreach ($this->organizationals as $organizational)
                @if ($organizational->slug !== 'contact' && $organizational->slug !== 'general')
                    <a wire:key="{{ $organizational->id }}" href="{{ route('abouts.show', $organizational->slug) }}"
                        class="text-base hover:text-[#F5D05E] p-3">
                        {{ $organizational->title }}
                    </a>
                @endif
            @endforeach
        </div>
        <div data-menu data-menu-target="ilmiah"
            class="hidden flex-col gap-2 overflow-x-auto w-full border-b border-white py-4 px-6">
            <div class="flex flex-row">
                @foreach ($this->posts as $post)
                    <div id="{{ $post->slug }}" data-menu data-submenu="{{ $post->slug }}"
                        wire:key="{{ $post->id }}" class="flex items-center pr-2">
                        <a href="{{ route('posts.detail', $post->slug) }}" class="text-base hover:text-[#F5D05E] p-3">
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

<script>
    // Background Color Navbar
    window.addEventListener('scroll', function() {
        var navbar = document.getElementById('navbar');
        var navbarContent = document.getElementById('navbar-content');
        if (window.scrollY > 0) {
            navbar.classList.remove.apply(navbar.classList, [
                'bg-transparent',
                'bg-gradient-to-b',
                'from-gray-700',
                'to-transparent',
            ]);
            navbar.classList.add.apply(navbar.classList, [
                'bg-[#0D5568]',
                'shadow-md',
                'border-b',
                'border-b-[#F5D05E]',
            ]);
        } else {
            navbar.classList.remove.apply(navbar.classList, [
                'bg-[#0D5568]',
                'shadow-md',
                'border-b',
                'border-b-[#F5D05E]',
            ]);
            navbar.classList.add.apply(navbar.classList, ['bg-transparent', 'bg-gradient-to-b',
                'from-gray-700'
            ]);
        }
    });
</script>
