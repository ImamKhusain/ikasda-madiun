<div id="navbar-hamburger"
    class="hidden inset-x-16 mt-px top-16 text-lg text-white z-50 fixed bg-[#0D5568] w-11/12 h-5/6">
    {{-- Menu --}}
    <div class="flex flex-col overflow-y-scroll w-80 h-full border-r border-white">
        <a data-menu id="isr" href="#"
            class="flex w-full hover:text-[#F5D05E] items-center justify-between p-4">
            <div class="flex gap-2 items-center">
                <img src="/images/navbar/isr.svg" alt="isr" class="w-12 aspect-square">
                <div class="flex flex-col justify-center items-start">
                    <h1 class="font-bold">Tentang ISR</h1>
                    <h2 class="text-sm">Kenal lebih dekat dengan ISR</h2>
                </div>
            </div>
            <img src="/images/navbar/arrow.svg" alt="arrow" class="w-6 aspect-square">
        </a>
        <a data-menu id="ilmiah" href="{{ route('posts.index') }}"
            class="flex w-full hover:text-[#F5D05E] items-center justify-between p-4">
            <div class="flex gap-2 items-center">
                <img src="/images/navbar/ilmiah.svg" alt="ilmiah" class="w-12 aspect-square">
                <div class="flex flex-col justify-center items-start">
                    <h1 class="font-bold">Pojok Ilmiah</h1>
                    <h2 class="text-sm">Baca artikel, berita, dan mini blog</h2>
                </div>
            </div>
            <img src="/images/navbar/arrow.svg" alt="arrow" class="w-6 aspect-square">
        </a>
        <button data-menu id="departemen"
            class="cursor-pointer flex w-full hover:text-[#F5D05E] items-center justify-between p-4">
            <div class="flex gap-2 items-center">
                <img src="/images/navbar/departemen.svg" alt="departemen" class="w-12 aspect-square">
                <div class="flex flex-col justify-center items-start text-left">
                    <h1 class="font-bold">Departemen</h1>
                    <h2 class="text-sm">Ragam departemen di ISR</h2>
                </div>
            </div>
            <img src="/images/navbar/arrow.svg" alt="arrow" class="w-6 aspect-square">
        </button>
        <button data-menu id="rekrutmen"
            class="cursor-pointer flex w-full hover:text-[#F5D05E] items-center justify-between p-4">
            <div class="flex gap-2 items-center">
                <img src="/images/navbar/rekrutmen.svg" alt="rekrutmen" class="w-12 aspect-square">
                <div class="flex flex-col justify-center items-start text-left">
                    <h1 class="font-bold">Rekrutmen</h1>
                    <h2 class="text-sm">Ragam seleksi keanggotaan ISR</h2>
                </div>
            </div>
            <img src="/images/navbar/arrow.svg" alt="arrow" class="w-6 aspect-square">
        </button>
        <a data-menu id="prestasi" href="{{ route('achievements.index') }}"
            class="flex w-full hover:text-[#F5D05E] items-center justify-between p-4">
            <div class="flex gap-2 items-center">
                <img src="/images/navbar/prestasi.svg" alt="prestasi" class="w-12 aspect-square">
                <div class="flex flex-col justify-center">
                    <p class="font-bold">Prestasi</p>
                    <p class="text-sm">Prestasi yang dicapai oleh tim ISR</p>
                </div>
            </div>
            <img src="/images/navbar/arrow.svg" alt="arrow" class="w-6 aspect-square">
        </a>
        <button data-menu id="kompetisi"
            class="cursor-pointer flex w-full hover:text-[#F5D05E] items-center justify-between p-4">
            <div class="flex gap-2 items-center">
                <img src="/images/navbar/kompetisi.svg" alt="kompetisi" class="w-12 aspect-square">
                <div class="flex flex-col justify-center items-start text-left">
                    <p class="font-bold">Kompetisi</p>
                    <p class="text-sm">Pendaftaran lomba dan kompetisi</p>
                </div>
            </div>
            <img src="/images/navbar/arrow.svg" alt="arrow" class="w-6 aspect-square">
        </button>
        <a data-menu id="market" href="{{ route('merchandise.index') }}"
            class="flex w-full hover:text-[#F5D05E] items-center justify-between p-4">
            <div class="flex gap-2 items-center">
                <img src="/images/navbar/market.svg" alt="market" class="w-12 aspect-square">
                <div class="flex flex-col justify-center">
                    <p class="font-bold">Market</p>
                    <p class="text-sm">Beragam Merchandise dari ISR UPN</p>
                </div>
            </div>
        </a>
        <button data-menu id="download"
            class="cursor-pointer flex w-full hover:text-[#F5D05E] items-center justify-between p-4">
            <div class="flex gap-2 items-center">
                <img src="/images/navbar/download.svg" alt="download" class="w-12 aspect-square">
                <div class="flex flex-col justify-center items-start text-left">
                    <p class="font-bold">Download</p>
                    <p class="text-sm">Asset ISR dan dokumen SOP</p>
                </div>
            </div>
            <img src="/images/navbar/arrow.svg" alt="arrow" class="w-6 aspect-square">
        </button>
    </div>

    {{-- Sub Menu --}}
    <div class="w-fit h-full">
        <div data-menu data-menu-target="isr" id="submenu-isr"
            class="hidden flex-col gap-2 overflow-y-scroll w-80 h-full border-r border-white py-4 px-6">
            <h1 class="font-bold mb-2">Tentang ISR</h1>
            @foreach ($this->organizationals as $organizational)
                @if ($organizational->slug !== 'contact' && $organizational->slug !== 'general')
                    <a wire:key="{{ $organizational->id }}" href="{{ route('abouts.show', $organizational->slug) }}"
                        class="text-base flex w-full hover:text-[#F5D05E] items-center justify-between p-3">{{ $organizational->title }}</a>
                @endif
            @endforeach
        </div>
        <div data-menu data-menu-target="ilmiah"
            class="hidden flex-col gap-2 overflow-y-scroll w-80 h-full border-r border-white py-4 px-6">
            <h1 class="font-bold mb-2">Pojok Ilmiah</h1>
            {{-- <a data-menu data-submenu="artikel" id="artikel" href="{{ route('posts.index') }}"
                    class="text-base flex w-full hover:text-[#F5D05E] items-center justify-between">Artikel</a> --}}
            <div class="flex flex-col">
                @foreach ($this->posts as $post)
                    <div id="{{ $post->slug }}" data-menu data-submenu="{{ $post->slug }}"
                        wire:key="{{ $post->id }}" class="flex felx-row justify-between pr-2">
                        <a href="{{ route('posts.detail', $post->slug) }}"
                            class="text-base flex w-full hover:text-[#F5D05E] items-center justify-between p-3">{{ $post->name }}</a>
                        <img src="/images/navbar/arrow.svg" alt="arrow" class="aspect-square w-5">
                    </div>
                @endforeach
            </div>
        </div>
        <div data-menu data-menu-target="departemen" id="submenu-departemen"
            class="hidden flex-col gap-2 overflow-y-scroll w-80 h-full border-r border-white py-4 px-6">
            <h1 class="font-bold mb-2">Departemen</h1>
            @foreach ($this->departments as $department)
                <a wire:key="{{ $department->id }}" href="{{ route('departments.show', $department->slug) }}"
                    class="text-base flex w-full hover:text-[#F5D05E] items-center justify-between p-3">{{ $department->title }}
                </a>
            @endforeach
        </div>
        <div data-menu data-menu-target="rekrutmen" id="submenu-rekrutmen"
            class="hidden flex-col gap-2 overflow-y-scroll w-80 h-full border-r border-white py-4 px-6">
            <h1 class="font-bold mb-2">Rekrutmen</h1>
            @foreach ($this->recruitments as $recruitment)
                <div id="{{ $recruitment->slug }}" data-menu data-submenu="{{ $recruitment->slug }}"
                    wire:key="{{ $recruitment->id }}" class="flex pr-2">
                    <a href="{{ route('recruitments.index', $recruitment->slug) }}"
                        class="text-base flex w-full hover:text-[#F5D05E] items-center justify-between p-3">{{ $recruitment->name }}</a>
                </div>
            @endforeach
        </div>
        <div data-menu data-menu-target="prestasi" id="submenu-prestasi"
            class="hidden flex-col gap-2 overflow-y-scroll w-80 h-full border-r border-white py-4 px-6">
            <h1 class="font-bold mb-2">Prestasi</h1>
            @foreach ($this->achievements as $year => $achievementsOfYear)
                <a href="{{ route('achievements.index', ['year' => $year]) }}"
                    class="text-base flex w-full hover:text-[#F5D05E] items-center justify-between p-3">Tahun
                    {{ $year }}</a>
            @endforeach
        </div>
        <div data-menu data-menu-target="kompetisi" id="submenu-kompetisi"
            class="hidden flex-col gap-2 overflow-y-scroll w-80 h-full border-r border-white py-4 px-6">
            <h1 class="font-bold mb-2">Kompetisi</h1>
            <div class="flex flex-col">
                @foreach ($this->competitions as $competition)
                    <div id="{{ $competition->slug }}" data-menu data-submenu="{{ $competition->slug }}"
                        wire:key="{{ $competition->id }}" class="flex felx-row justify-between pr-2">
                        <a href="{{ route('competitions.index', $competition->slug) }}"
                            class="text-base flex w-full hover:text-[#F5D05E] items-center justify-between p-3">{{ $competition->name }}</a>
                        <img src="/images/navbar/arrow.svg" alt="arrow" class="aspect-square w-5">
                    </div>
                @endforeach
            </div>
        </div>
        <div data-menu data-menu-target="market" id="submenu-market" class="hidden top-full left-0 h-full">
            <a href=""></a>
        </div>
        <div data-menu data-menu-target="download" id="submenu-download"
            class="hidden flex-col gap-2 overflow-y-scroll w-80 h-full border-r border-white py-4 px-6">
            <p class="font-bold mb-2">Download</p>
            <div class="flex flex-col">
                @foreach ($this->downloads as $download)
                    <a wire:key="{{ $download->id }}"
                        href="{{ route('downloads.index', ['category' => $download->slug]) }}"
                        class="text-base flex w-full hover:text-[#F5D05E] items-center justify-between p-3">{{ $download->name }}</a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Sub Sub Menu --}}
    <div class="w-fit h-full">
        <div data-menu data-menu-target="artikel" class="hidden flex-col overflow-y-scroll w-80">
            @foreach ($this->subPosts('artikel') as $subpost)
                <a wire:key="{{ $subpost->id }}"
                    href="{{ route('posts.detail', ['category' => 'artikel', 'subCategory' => $subpost->slug]) }}"
                    class="text-base flex w-full hover:text-[#F5D05E] items-center justify-between p-3">{{ $subpost->name }}</a>
            @endforeach
        </div>
        <div data-menu data-menu-target="mini-blog" class="hidden flex-col overflow-y-scroll w-80">
            @foreach ($this->subPosts('mini-blog') as $subpost)
                <a wire:key="{{ $subpost->id }}"
                    href="{{ route('posts.detail', ['category' => 'mini-blog', 'subCategory' => $subpost->slug]) }}"
                    class="text-base flex w-full hover:text-[#F5D05E] items-center justify-between p-3">{{ $subpost->name }}</a>
            @endforeach
        </div>
        <div data-menu data-menu-target="lomba-umum" class="hidden flex-col overflow-y-scroll w-80">
            @foreach ($this->subCompetitions('lomba-umum') as $subCompetition)
                <a wire:key="{{ $subCompetition->id }}"
                    href="{{ route('competitions.index', ['category' => 'lomba-umum', 'subCategory' => $subCompetition->slug]) }}"
                    class="text-base flex w-full hover:text-[#F5D05E] items-center justify-between p-3">{{ $subCompetition->name }}</a>
            @endforeach
        </div>
        <div data-menu data-menu-target="ajang-talenta-dikti" class="hidden flex-col overflow-y-scroll w-80">
            @foreach ($this->subCompetitions('ajang-talenta-dikti') as $subCompetition)
                <a wire:key="{{ $subCompetition->id }}"
                    href="{{ route('competitions.index', ['category' => 'ajang-talenta-dikti', 'subCategory' => $subCompetition->slug]) }}"
                    class="text-base flex w-full hover:text-[#F5D05E] items-center justify-between p-3">{{ $subCompetition->name }}</a>
            @endforeach
        </div>
    </div>
</div>
