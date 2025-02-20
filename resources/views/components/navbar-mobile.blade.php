<div id="navbar-hamburger-mobile"
    class="fixed inset-x-0 top-16 z-50 hidden h-full w-full bg-trinary text-lg text-white border-t-2 border-t-black">
    {{-- Menu --}}
    <div class="flex h-4/5 w-full flex-col overflow-y-scroll border-r border-white">
        {{-- Menu Tentang Ikasda Start --}}
        <div id="accordion-nested-parent" data-accordion="collapse" data-active-classes="bg-trinary text-white"
            data-inactive-classes="bg-trinary text-white">
            <h2 id="accordion-collapse-heading-1">
                <button type="button"
                    class="flex w-full items-center justify-between gap-3 py-3 pr-5 font-medium rtl:text-right"
                    data-accordion-target="#accordion-collapse-body-1" aria-expanded="false"
                    aria-controls="accordion-collapse-body-1">
                    <span class="flex items-center">
                        <a data-menu id="ikasda-mobile" href="#"
                            class="flex w-full items-center justify-between px-4 pt-4">
                            <div class="flex items-center gap-2">
                                <div class="flex flex-col items-start justify-center">
                                    <h1 class="font-bold">Tentang Ikasda</h1>
                                </div>
                            </div>
                        </a>
                    </span>
                    <svg data-accordion-icon class="h-3 w-3 shrink-0 rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                <div class="px-5">
                    <div class="w-full flex-col gap-4">
                        @foreach ($this->organizationals as $organizational)
                            @if ($organizational->slug !== 'contact' && $organizational->slug !== 'general')
                                <a wire:key="{{ $organizational->id }}"
                                    href="{{ route('abouts.show', $organizational->slug) }}"
                                    class="flex w-full items-center justify-between p-3 text-sm">
                                    {{ $organizational->title }}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- Menu Tentang Ikasda End --}}

            {{-- Menu Berita Ikasda Start --}}
            <h2 id="accordion-collapse-heading-2">
                <button type="button"
                    class="flex w-full items-center justify-between gap-3 py-3 pr-5 font-medium rtl:text-right"
                    data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                    aria-controls="accordion-collapse-body-2">
                    <span class="flex items-center">
                        <a data-menu id="ikasda-mobile" href="#"
                            class="flex w-full items-center justify-between px-4 pt-4">
                            <div class="flex items-center gap-2">
                                <div class="flex flex-col items-start justify-center">
                                    <h1 class="font-bold">Berita Ikasda</h1>
                                </div>
                            </div>
                        </a>
                    </span>
                    <svg data-accordion-icon class="h-3 w-3 shrink-0 rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                <div id="accordion-nested-collapse" data-accordion="collapse"
                    data-active-classes="bg-trinary text-white" data-inactive-classes="bg-trinary text-white"
                    class="px-5">
                    @foreach ($this->posts as $index => $post)
                        <h2 id="accordion-nested-collapse-heading-{{ $index + 1 }}">
                            <button type="button" class="w-full"
                                data-accordion-target="#accordion-nested-collapse-body-{{ $index + 1 }}"
                                aria-expanded="false"
                                aria-controls="accordion-nested-collapse-body-{{ $index + 1 }}">
                                <a href="{{ $post->slug == 'berita' ? route('posts.detail', $post->slug) : '#' }}"
                                    class="flex w-full items-center justify-between p-3 text-sm">
                                    {{ $post->name }}
                                </a>
                            </button>
                        </h2>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- Menu Berita Ikasda End --}}

        {{-- Menu Layanan Alumni Start --}}
        <a data-menu id="market" href="{{ route('merchandise.index') }}"
            class="flex w-full items-center justify-between p-4">
            <div class="flex items-center gap-2">
                <div class="flex flex-col justify-center">
                    <p class="font-bold">Layanan Alumni</p>
                </div>
            </div>
        </a>
        {{-- Menu Layanan Alumni End --}}

        {{-- Menu Data Alumni Start --}}
        <a data-menu id="market" href="{{ route('alumni.index') }}"
            class="flex w-full items-center justify-between p-4">
            <div class="flex items-center gap-2">
                <div class="flex flex-col justify-center">
                    <p class="font-bold">Data Alumni</p>
                </div>
            </div>
        </a>
        {{-- Menu Data Alumni End --}}

        {{-- Menu Market Alumni Start --}}
        <a data-menu id="market" href="{{ route('merchandise.index') }}"
            class="flex w-full items-center justify-between p-4">
            <div class="flex items-center gap-2">
                <div class="flex flex-col justify-center">
                    <p class="font-bold">Market Alumni</p>
                </div>
            </div>
        </a>
        {{-- Menu Market Alumni End --}}
    </div>
</div>
</div>
