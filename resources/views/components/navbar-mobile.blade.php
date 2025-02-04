<div
    id="navbar-hamburger-mobile"
    class="fixed inset-x-0 top-16 z-50 hidden h-full w-full bg-[#0D5568] text-lg text-white"
>
    {{-- Menu --}}
    <div
        class="flex h-4/5 w-full flex-col overflow-y-scroll border-r border-white"
    >
        {{-- Menu Tentang ISR Start --}}
        <div
            id="accordion-nested-parent"
            data-accordion="collapse"
            data-active-classes="bg-[#0D5568] text-white"
            data-inactive-classes="bg-[#0D5568] text-white"
        >
            <h2 id="accordion-collapse-heading-1">
                <button
                    type="button"
                    class="flex w-full items-center justify-between gap-3 py-3 pr-5 font-medium rtl:text-right"
                    data-accordion-target="#accordion-collapse-body-1"
                    aria-expanded="false"
                    aria-controls="accordion-collapse-body-1"
                >
                    <span class="flex items-center">
                        <a
                            data-menu
                            id="isr-mobile"
                            href="#"
                            class="flex w-full items-center justify-between px-4 pt-4 hover:text-[#F5D05E]"
                        >
                            <div class="flex items-center gap-2">
                                <img
                                    src="/images/navbar/isr.svg"
                                    alt="isr"
                                    class="aspect-square w-12"
                                />
                                <div
                                    class="flex flex-col items-start justify-center"
                                >
                                    <h1 class="font-bold">Tentang ISR</h1>
                                    <h2 class="text-sm">
                                        Kenal lebih dekat dengan ISR
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </span>
                    <svg
                        data-accordion-icon
                        class="h-3 w-3 shrink-0 rotate-180"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 10 6"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5 5 1 1 5"
                        />
                    </svg>
                </button>
            </h2>
            <div
                id="accordion-collapse-body-1"
                class="hidden"
                aria-labelledby="accordion-collapse-heading-1"
            >
                <div class="px-5">
                    <div class="w-full flex-col gap-4 px-6">
                        @foreach ($this->organizationals as $organizational)
                            @if ($organizational->slug !== "contact" && $organizational->slug !== "general")
                                <a
                                    wire:key="{{ $organizational->id }}"
                                    href="{{ route("abouts.show", $organizational->slug) }}"
                                    class="flex w-full items-center justify-between p-3 text-sm hover:text-[#F5D05E]"
                                >
                                    {{ $organizational->title }}
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- Menu Tentang ISR End --}}

            {{-- Menu Pojok Ilmiah Start --}}
            <h2 id="accordion-collapse-heading-2">
                <button
                    type="button"
                    class="flex w-full items-center justify-between gap-3 py-3 pr-5 font-medium rtl:text-right"
                    data-accordion-target="#accordion-collapse-body-2"
                    aria-expanded="false"
                    aria-controls="accordion-collapse-body-2"
                >
                    <span class="flex items-center">
                        <a
                            data-menu
                            id="isr-mobile"
                            href="#"
                            class="flex w-full items-center justify-between px-4 pt-4 hover:text-[#F5D05E]"
                        >
                            <div class="flex items-center gap-2">
                                <img
                                    src="/images/navbar/ilmiah.svg"
                                    alt="ilmiah"
                                    class="aspect-square w-12"
                                />
                                <div
                                    class="flex flex-col items-start justify-center"
                                >
                                    <h1 class="font-bold">Pojok Ilmiah</h1>
                                    <h2 class="text-sm">
                                        Baca artikel, berita, dan mini blog
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </span>
                    <svg
                        data-accordion-icon
                        class="h-3 w-3 shrink-0 rotate-180"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 10 6"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5 5 1 1 5"
                        />
                    </svg>
                </button>
            </h2>
            <div
                id="accordion-collapse-body-2"
                class="hidden"
                aria-labelledby="accordion-collapse-heading-2"
            >
                <div
                    id="accordion-nested-collapse"
                    data-accordion="collapse"
                    data-active-classes="bg-[#0D5568] text-white"
                    data-inactive-classes="bg-[#0D5568] text-white"
                >
                    @foreach ($this->posts as $index => $post)
                        <h2
                            id="accordion-nested-collapse-heading-{{ $index + 1 }}"
                        >
                            <button
                                type="button"
                                class="w-full"
                                data-accordion-target="#accordion-nested-collapse-body-{{ $index + 1 }}"
                                aria-expanded="false"
                                aria-controls="accordion-nested-collapse-body-{{ $index + 1 }}"
                            >
                                <a
                                    href="{{ $post->slug == "berita" ? route("posts.detail", $post->slug) : "#" }}"
                                    class="flex w-full items-center justify-between pl-16 pr-7 pt-4"
                                >
                                    <div class="text-sm">
                                        {{ $post->name }}
                                    </div>
                                    @if ($post->slug !== "berita")
                                        <svg
                                            data-accordion-icon
                                            class="h-3 w-3 shrink-0 rotate-180"
                                            aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 10 6"
                                        >
                                            <path
                                                stroke="currentColor"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 5 5 1 1 5"
                                            />
                                        </svg>
                                    @endif
                                </a>
                            </button>
                        </h2>
                        <div
                            id="accordion-nested-collapse-body-{{ $index + 1 }}"
                            class="hidden"
                            aria-labelledby="accordion-nested-collapse-heading-{{ $index + 1 }}"
                        >
                            <div class="px-10">
                                <div class="w-full flex-col gap-4 px-6">
                                    @if ($post->slug === "artikel")
                                        @foreach ($this->subPosts("artikel") as $subpost)
                                            <a
                                                wire:key="{{ $subpost->id }}"
                                                href="{{ route("posts.detail", ["category" => $subpost->slug]) }}"
                                                class="flex w-full p-4 text-xs hover:text-[#F5D05E]"
                                            >
                                                {{ $subpost->name }}
                                            </a>
                                        @endforeach
                                    @endif

                                    @if ($post->slug === "mini-blog")
                                        @foreach ($this->subPosts("mini-blog") as $subpost)
                                            <a
                                                wire:key="{{ $subpost->id }}"
                                                href="{{ route("posts.detail", ["category" => $subpost->slug]) }}"
                                                class="flex w-full p-4 text-xs hover:text-[#F5D05E]"
                                            >
                                                {{ $subpost->name }}
                                            </a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- Menu Pojok Ilmiah End --}}

        {{-- Menu Departemen Start --}}
        <div
            id="accordion-color"
            data-accordion="collapse"
            data-active-classes="bg-[#0D5568] text-white"
            data-inactive-classes="bg-[#0D5568] text-white"
        >
            <h2 id="accordion-open-heading-3">
                <button
                    type="button"
                    class="flex w-full items-center justify-between gap-3 py-3 pr-5 font-medium rtl:text-right"
                    data-accordion-target="#accordion-open-body-3"
                    aria-expanded="false"
                    aria-controls="accordion-open-body-3"
                >
                    <span class="flex items-center">
                        <a
                            data-menu
                            id="isr-mobile"
                            href="#"
                            class="flex w-full items-center justify-between px-4 pt-4 hover:text-[#F5D05E]"
                        >
                            <div class="flex items-center gap-2">
                                <img
                                    src="/images/navbar/departemen.svg"
                                    alt="isr"
                                    class="aspect-square w-12"
                                />
                                <div
                                    class="flex flex-col items-start justify-center"
                                >
                                    <h1 class="font-bold">Departemen</h1>
                                    <h2 class="text-sm">
                                        Ragam departemen di ISR
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </span>
                    <svg
                        data-accordion-icon
                        class="h-3 w-3 shrink-0 rotate-180"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 10 6"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5 5 1 1 5"
                        />
                    </svg>
                </button>
            </h2>
            <div
                id="accordion-open-body-3"
                class="hidden"
                aria-labelledby="accordion-open-heading-3"
            >
                <div class="px-5">
                    <div class="w-full flex-col gap-4 px-6">
                        @foreach ($this->departments as $department)
                            <a
                                wire:key="{{ $department->id }}"
                                href="{{ route("departments.show", $department->slug) }}"
                                class="flex w-full items-center justify-between p-3 text-sm hover:text-[#F5D05E]"
                            >
                                {{ $department->title }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- Menu Departemen End --}}

            {{-- Menu Rekrutmen Start --}}
            <h2 id="accordion-open-heading-4">
                <button
                    type="button"
                    class="flex w-full items-center justify-between gap-3 py-3 pr-5 font-medium rtl:text-right"
                    data-accordion-target="#accordion-open-body-4"
                    aria-expanded="false"
                    aria-controls="accordion-open-body-4"
                >
                    <span class="flex items-center">
                        <a
                            data-menu
                            id="isr-mobile"
                            href="#"
                            class="flex w-full items-center justify-between px-4 pt-4 hover:text-[#F5D05E]"
                        >
                            <div class="flex items-center gap-2">
                                <img
                                    src="/images/navbar/rekrutmen.svg"
                                    alt="isr"
                                    class="aspect-square w-12"
                                />
                                <div
                                    class="flex flex-col items-start justify-center"
                                >
                                    <h1 class="font-bold">Rekrutmen</h1>
                                    <h2 class="text-sm">
                                        Ragam seleksi keanggotaan ISR
                                    </h2>
                                </div>
                            </div>
                        </a>
                    </span>
                    <svg
                        data-accordion-icon
                        class="h-3 w-3 shrink-0 rotate-180"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 10 6"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5 5 1 1 5"
                        />
                    </svg>
                </button>
            </h2>
            <div
                id="accordion-open-body-4"
                class="hidden"
                aria-labelledby="accordion-open-heading-4"
            >
                <div class="px-5">
                    <div class="w-full flex-col gap-4 px-6">
                        @foreach ($this->recruitments as $recruitment)
                            <div
                                id="{{ $recruitment->slug }}"
                                data-menu
                                data-submenu="{{ $recruitment->slug }}"
                                wire:key="{{ $recruitment->id }}"
                                class="flex flex-row pr-2"
                            >
                                <a
                                    href="{{ route("recruitments.index", $recruitment->slug) }}"
                                    class="flex w-full items-center justify-between p-3 text-sm hover:text-[#F5D05E]"
                                >
                                    {{ $recruitment->name }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- Menu Rekrutmen End --}}

            {{-- Menu Prestasi Start --}}
            <h2 id="accordion-open-heading-5">
                <button
                    type="button"
                    class="flex w-full items-center justify-between gap-3 py-3 pr-5 font-medium rtl:text-right"
                    data-accordion-target="#accordion-open-body-5"
                    aria-expanded="false"
                    aria-controls="accordion-open-body-5"
                >
                    <span class="flex items-center">
                        <a
                            data-menu
                            id="isr-mobile"
                            href="#"
                            class="flex w-full items-center justify-between px-4 pt-4 hover:text-[#F5D05E]"
                        >
                            <div class="flex items-center gap-2">
                                <img
                                    src="/images/navbar/prestasi.svg"
                                    alt="isr"
                                    class="aspect-square w-12"
                                />
                                <div
                                    class="flex flex-col items-start justify-center"
                                >
                                    <p class="font-bold">Prestasi</p>
                                    <p class="text-sm">
                                        Prestasi yang dicapai oleh tim ISR
                                    </p>
                                </div>
                            </div>
                        </a>
                    </span>
                    <svg
                        data-accordion-icon
                        class="h-3 w-3 shrink-0 rotate-180"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 10 6"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5 5 1 1 5"
                        />
                    </svg>
                </button>
            </h2>
            <div
                id="accordion-open-body-5"
                class="hidden"
                aria-labelledby="accordion-open-heading-5"
            >
                <div class="px-5">
                    <div class="w-full flex-col gap-4 px-6">
                        @foreach ($this->achievements as $year => $achievementsOfYear)
                            <a
                                href="{{ route("achievements.index", ["year" => $year]) }}"
                                class="flex w-full items-center justify-between p-3 text-sm hover:text-[#F5D05E]"
                            >
                                Tahun {{ $year }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- Menu Prestasi End --}}

            {{-- Menu Kompetisi Start --}}
            <h2 id="accordion-open-heading-6">
                <button
                    type="button"
                    class="flex w-full items-center justify-between gap-3 py-3 pr-5 font-medium rtl:text-right"
                    data-accordion-target="#accordion-open-body-6"
                    aria-expanded="false"
                    aria-controls="accordion-open-body-6"
                >
                    <span class="flex items-center">
                        <a
                            data-menu
                            id="kompetisi-mobile"
                            href="#"
                            class="flex w-full items-center justify-between px-4 pt-4 hover:text-[#F5D05E]"
                        >
                            <div class="flex items-center gap-2">
                                <img
                                    src="/images/navbar/kompetisi.svg"
                                    alt="isr"
                                    class="aspect-square w-12"
                                />
                                <div
                                    class="flex flex-col items-start justify-center"
                                >
                                    <p class="font-bold">Kompetisi</p>
                                    <p class="text-sm">
                                        Pendaftaran lomba dan kompetisi
                                    </p>
                                </div>
                            </div>
                        </a>
                    </span>
                    <svg
                        data-accordion-icon
                        class="h-3 w-3 shrink-0 rotate-180"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 10 6"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5 5 1 1 5"
                        />
                    </svg>
                </button>
            </h2>
            <div
                id="accordion-open-body-6"
                class="hidden"
                aria-labelledby="accordion-open-heading-6"
            >
                <div class="px-5">
                    <div class="w-full flex-col gap-4 px-6">
                        @foreach ($this->competitions as $competition)
                            <div class="flex flex-row pr-2">
                                <a
                                    wire:key="{{ $competition->id }}"
                                    data-submenu="{{ $competition->slug }}"
                                    href="{{ route("competitions.index", $competition->slug) }}"
                                    class="flex w-full items-center justify-between p-3 text-sm hover:text-[#F5D05E]"
                                >
                                    {{ $competition->name }}
                                </a>
                                <svg
                                    data-accordion-icon
                                    class="h-3 w-3 shrink-0 rotate-180"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 10 6"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5 5 1 1 5"
                                    />
                                </svg>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- Menu Kompetisi End --}}

            {{-- Menu Merchandise Start --}}
            <a
                data-menu
                id="market"
                href="{{ route("merchandise.index") }}"
                class="flex w-full items-center justify-between p-4 hover:text-[#F5D05E]"
            >
                <div class="flex items-center gap-2">
                    <img
                        src="/images/navbar/market.svg"
                        alt="market"
                        class="aspect-square w-12"
                    />
                    <div class="flex flex-col justify-center">
                        <p class="font-bold">Market</p>
                        <p class="text-sm">Beragam Merchandise dari ISR UPN</p>
                    </div>
                </div>
            </a>
            {{-- Menu Merchandise End --}}

            {{-- Menu Download Start --}}
            <h2 id="accordion-open-heading-1">
                <button
                    type="button"
                    class="flex w-full items-center justify-between gap-3 py-3 pr-5 font-medium rtl:text-right"
                    data-accordion-target="#accordion-open-body-1"
                    aria-expanded="false"
                    aria-controls="accordion-open-body-1"
                >
                    <span class="flex items-center">
                        <a
                            data-menu
                            id="download"
                            href="#"
                            class="flex w-full items-center justify-between px-4 pt-4 hover:text-[#F5D05E]"
                        >
                            <div class="flex items-center gap-2">
                                <img
                                    src="/images/navbar/download.svg"
                                    alt="isr"
                                    class="aspect-square w-12"
                                />
                                <div
                                    class="flex flex-col items-start justify-center"
                                >
                                    <p class="font-bold">Download</p>
                                    <p class="text-sm">
                                        Asset ISR dan dokumen SOP
                                    </p>
                                </div>
                            </div>
                        </a>
                    </span>
                    <svg
                        data-accordion-icon
                        class="h-3 w-3 shrink-0 rotate-180"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 10 6"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 5 5 1 1 5"
                        />
                    </svg>
                </button>
            </h2>
            <div
                id="accordion-open-body-1"
                class="hidden"
                aria-labelledby="accordion-open-heading-1"
            >
                <div class="px-5">
                    <div class="w-full flex-col gap-4 px-7">
                        @foreach ($this->downloads as $download)
                            <a
                                wire:key="{{ $download->id }}"
                                href="{{ route("downloads.index", ["category" => $download->slug]) }}"
                                class="flex w-full items-center justify-between p-3 text-sm hover:text-[#F5D05E]"
                            >
                                {{ $download->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- Menu Download End --}}
        </div>
    </div>
</div>

<script>
    // Hamburger Menu Navbar
    // document.addEventListener('DOMContentLoaded', function() {
    //     var imgElements = document.querySelectorAll('img');

    //     imgElements.forEach(function(imgElement) {
    //         imgElement.addEventListener("click", function() {
    //             if (imgElement.getAttribute("src") === "/images/arrow-down.svg") {
    //                 imgElement.setAttribute("src", "/images/arrow.svg");
    //             } else {
    //                 imgElement.setAttribute("src", "/images/arrow-down.svg");
    //             }
    //         });
    //     });

    // });
</script>
