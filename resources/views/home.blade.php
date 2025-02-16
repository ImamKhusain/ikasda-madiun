@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <div class="mx-auto w-full p-0">
        {{-- Start Hero Page --}}
        <section class="relative w-full top-10 mx-auto">
            <img src="/images/hero.png" class="h-full w-full object-cover" alt="hero-image" />
        </section>
        {{-- End Hero Page --}}

        {{-- Start Profil Ikasda --}}
        <section class="bg-white">
            <div
                class="lg:gap-15 relative flex flex-col-reverse items-center justify-end gap-10 px-4 py-8 md:px-8 md:py-16 lg:flex-row md:mt-10">
                <div class="absolute left-4 top-10 hidden items-center justify-center xl:block">
                    <div class="z-20 h-14 w-40 bg-secondary" style="transform: translateX(10%)"></div>
                    <div class="z-10 h-14 w-40 bg-primary" style="transform: translateY(-125%)"></div>
                </div>
                <div class="w-full rounded-lg sm:w-[50%] md:w-[70%] lg:w-[397px] xl:pl-80">
                    <h1 class="relative text-2xl font-bold md:text-3xl lg:text-4xl">
                        {{ $profil->title }}
                        <span class="ml-5 after:absolute after:bottom-2 after:h-[3px] after:w-1/3 after:bg-[#0D5568]">
                        </span>
                    </h1>
                    <div class="mt-3 text-sm md:mt-5 md:text-base lg:mt-5">
                        @foreach ($profil->content as $item)
                            @if ($item['type'] === 'paragraph')
                                @php
                                    $content = $item['data']['content'];
                                    $modifiedContent = preg_replace(
                                        '/<p>/',
                                        '<p class="text-xs font-regular text-justify mb-5">',
                                        $content,
                                        1,
                                    );
                                @endphp

                                {!! $modifiedContent !!}
                            @break
                        @endif
                    @endforeach
                </div>
                <div
                    class="relative mt-5 flex h-[50px] w-[175px] flex-row items-center justify-between border border-white bg-primary p-3">
                    <a href="" class="text-sm text-black">
                        SELENGKAPNYA
                    </a>
                    <img src="/images/arrow.svg" alt="arrow" class="h-[15px] w-[15px]" />
                </div>
            </div>
            <div class="aspect-square w-full sm:w-[50%] md:w-[70%] lg:w-[600px] mt-5">
                <img src="{{ $profil->getFirstMediaUrl() }}" alt="ikasda-logo" />
            </div>
        </div>
    </section>
    {{-- End Profil Ikasda --}}

    <section>
        <div class="w-full h-44 bg-primary">

        </div>
    </section>

    {{-- Start Visi Ikasda --}}
    <section class="">
        <div
            class="relative flex flex-col items-center justify-start gap-10 px-4 py-8 md:px-8 md:py-12 lg:flex-row lg:gap-20">
            <div class="absolute right-0 top-10 mr-10 hidden items-center justify-center xl:block">
                <div class="z-20 h-14 w-40 bg-secondary" style="transform: translateX(-10%)"></div>
                <div class="z-10 h-14 w-40 bg-primary" style="transform: translateY(-125%)"></div>
            </div>
            <img src="/images/visi-misi.png" alt="isr-profile"
                class="aspect-square w-full rounded-lg sm:w-[50%] md:w-[70%] lg:w-[658px]" />
            <div class="w-full sm:w-[50%] md:w-[70%] xl:pr-80">
                <h1 class="relative w-full text-2xl font-bold md:text-3xl lg:text-4xl">
                    {{ $misi->title }}
                    <span
                        class="ml-5 after:absolute after:bottom-2 after:h-[3px] after:w-1/6 after:bg-[#0D5568]"></span>
                </h1>
                <p class="mt-3 text-xs md:mt-5 md:text-sm lg:mt-8">
                    @foreach ($misi->content as $item)
                        @if ($item['type'] === 'heading')
                            @if ($item['data']['level'] === 'h1')
                                <h1 class="mb-2 text-center text-base font-bold">
                                    {!! $item['data']['content'] !!}
                                </h1>
                            @endif

                            @if ($item['data']['level'] === 'h2')
                                <h2 class="mb-2 text-center text-base font-bold">
                                    {!! $item['data']['content'] !!}
                                </h2>
                            @endif

                            @if ($item['data']['level'] === 'h3')
                                <h3 class="mb-2 text-center text-base font-bold">
                                    {!! $item['data']['content'] !!}
                                </h3>
                            @endif
                        @endif

                        @if ($item['type'] === 'paragraph')
                            @php
                                $content = $item['data']['content'];
                                $modifiedContent = preg_replace(
                                    '/<p>/',
                                    '<p class="text-sm font-regular text-justify mb-5">',
                                    $content,
                                    1,
                                );
                                $modifiedContent = preg_replace(
                                    '/<ol>/',
                                    '<ol start="1" class="list-decimal text-sm pl-5 mb-5">',
                                    $modifiedContent,
                                    1,
                                );
                            @endphp

                            {!! $modifiedContent !!}
                        @endif
                    @endforeach
                </p>
                <div
                    class="relative mt-5 flex h-[50px] w-[175px] flex-row items-center justify-between border border-white bg-primary p-3">
                    <a href="" class="text-sm text-black">
                        SELENGKAPNYA
                    </a>
                    <img src="/images/arrow.svg" alt="arrow" class="h-[15px] w-[15px]" />
                </div>
            </div>
        </div>
    </section>
    {{-- End Visi ISR --}}

    {{-- Start Berita Terkini --}}
    <section class="bg-primary">
        <div class="p-8">
            <p class="text-center text-[30px] font-bold text-secondary">
                BERITA TERKINI
            </p>
            <div class="flex flex-row flex-wrap justify-center gap-6 py-5">
                @foreach ($beritaTerkini as $beritaTerkinis)
                    <div
                        class="h-[581px] w-[369px] rounded-[30px] border-b-[14px] border-r-[14px] border-b-secondary border-r-secondary bg-white shadow dark:border-gray-700 dark:bg-gray-800">
                        <a href="{{ route('posts.show', ['category' => $beritaTerkinis->categories->slug, 'post' => $beritaTerkinis->slug]) }}"
                            class="flex justify-center">
                            <img class="m-3 h-[179px] w-[248px] rounded-xl"
                                src="{{ $beritaTerkinis->getFirstMediaUrl() }}" alt="{{ $beritaTerkinis->slug }}" />
                        </a>
                        <div class="px-14">
                            <a
                                href="{{ route('posts.show', ['category' => $beritaTerkinis->categories->slug, 'post' => $beritaTerkinis->slug]) }}">
                                @php
                                    $words = explode(' ', $beritaTerkinis->title);
                                    $limitedTitle = implode(' ', array_slice($words, 0, 7));
                                @endphp

                                <h5 class="mb-2 text-[20px] font-bold uppercase text-gray-900 dark:text-white">
                                    {{ $limitedTitle }}{{ count($words) > 7 ? '...' : '' }}
                                </h5>
                            </a>
                            <div>
                                @foreach ($beritaTerkinis->content as $item)
                                    @if ($item['type'] === 'paragraph')
                                        @php
                                            $content = strip_tags($item['data']['content']);
                                            if (mb_strlen($content) > 350) {
                                                $content = mb_substr($content, 0, 350) . '...';
                                            }
                                        @endphp

                                        <p class="mb-3 text-[13px] font-normal text-gray-700 dark:text-gray-400">
                                            {{ $content }}
                                        </p>
                                    @break
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="hover: mt-3 flex justify-center">
            <a href="{{ route('posts.index') }}"
                class="rounded-2xl bg-secondary p-3 text-[15px] text-white transition-transform duration-300 hover:scale-110">
                SELENGKAPNYA
            </a>
        </div>
    </div>
</section>
{{-- End Berita Terkini --}}

{{-- Start Ikasda Bangga --}}
<section class="bg-secondary">
    <div class="p-8">
        <p class="text-center text-[30px] font-bold text-primary">
            IKASDA BANGSA
        </p>
        <div class="flex flex-row flex-wrap justify-center gap-6 py-5">
            @foreach ($ikasdaBangga as $ikasdaBanggas)
                <div
                    class="h-[581px] w-[369px] rounded-[30px] border-b-[14px] border-r-[14px] border-b-primary border-r-primary bg-white shadow dark:border-gray-700 dark:bg-gray-800">
                    <a href="{{ route('posts.show', ['category' => $ikasdaBanggas->categories->slug, 'post' => $ikasdaBanggas->slug]) }}"
                        class="flex justify-center">
                        <img class="m-3 h-[179px] w-[248px] rounded-xl"
                            src="{{ $ikasdaBanggas->getFirstMediaUrl() }}" alt="{{ $ikasdaBanggas->slug }}" />
                    </a>
                    <div class="px-14">
                        <a
                            href="{{ route('posts.show', ['category' => $ikasdaBanggas->categories->slug, 'post' => $ikasdaBanggas->slug]) }}">
                            @php
                                $words = explode(' ', $ikasdaBanggas->title);
                                $limitedTitle = implode(' ', array_slice($words, 0, 7));
                            @endphp

                            <h5 class="mb-2 text-[20px] font-bold uppercase text-gray-900 dark:text-white">
                                {{ $limitedTitle }}{{ count($words) > 7 ? '...' : '' }}
                            </h5>
                        </a>
                        <div>
                            @foreach ($ikasdaBanggas->content as $item)
                                @if ($item['type'] === 'paragraph')
                                    @php
                                        $content = strip_tags($item['data']['content']);
                                        if (mb_strlen($content) > 350) {
                                            $content = mb_substr($content, 0, 350) . '...';
                                        }
                                    @endphp

                                    <p class="mb-3 text-[13px] font-normal text-gray-700 dark:text-gray-400">
                                        {{ $content }}
                                    </p>
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="hover: mt-3 flex justify-center">
        <a href="{{ route('posts.index') }}"
            class="rounded-2xl bg-primary p-3 text-[15px] text-black transition-transform duration-300 hover:scale-110">
            SELENGKAPNYA
        </a>
    </div>
</div>
</section>
{{-- End Ikasda Bangga --}}

{{-- Start Teras Kopi --}}
<section class="bg-primary">
<div class="p-8">
    <p class="text-center text-[30px] font-bold text-secondary">
        TERAS KOPI
    </p>
    <div class="flex flex-row flex-wrap justify-center gap-6 py-5">
        @foreach ($terasKopi as $terasKopis)
            <div
                class="h-[581px] w-[369px] rounded-[30px] border-b-[14px] border-r-[14px] border-b-secondary border-r-secondary bg-white shadow dark:border-gray-700 dark:bg-gray-800">
                <a href="{{ route('posts.show', ['category' => $terasKopis->categories->slug, 'post' => $terasKopis->slug]) }}"
                    class="flex justify-center">
                    <img class="m-3 h-[179px] w-[248px] rounded-xl" src="{{ $terasKopis->getFirstMediaUrl() }}"
                        alt="{{ $terasKopis->slug }}" />
                </a>
                <div class="px-14">
                    <a
                        href="{{ route('posts.show', ['category' => $terasKopis->categories->slug, 'post' => $terasKopis->slug]) }}">
                        @php
                            $words = explode(' ', $terasKopis->title);
                            $limitedTitle = implode(' ', array_slice($words, 0, 7));
                        @endphp

                        <h5 class="mb-2 text-[20px] font-bold uppercase text-gray-900 dark:text-white">
                            {{ $limitedTitle }}{{ count($words) > 7 ? '...' : '' }}
                        </h5>
                    </a>
                    <div>
                        @foreach ($terasKopis->content as $item)
                            @if ($item['type'] === 'paragraph')
                                @php
                                    $content = strip_tags($item['data']['content']);
                                    if (mb_strlen($content) > 350) {
                                        $content = mb_substr($content, 0, 350) . '...';
                                    }
                                @endphp

                                <p class="mb-3 text-[13px] font-normal text-gray-700 dark:text-gray-400">
                                    {{ $content }}
                                </p>
                            @break
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="hover: mt-3 flex justify-center">
    <a href="{{ route('posts.index') }}"
        class="rounded-2xl bg-secondary p-3 text-[15px] text-white transition-transform duration-300 hover:scale-110">
        SELENGKAPNYA
    </a>
</div>
</div>
</section>
{{-- End Teras Kopi --}}

{{-- Start Kegiatan --}}
<section>
{{--
                <x-kegiatan :items="$kegiatan->content" />
                </div>
            --}}
</section>
{{-- End Kegiatan --}}

{{-- Start Agenda --}}
<section class="flex w-full justify-center bg-white">
<div class="w-full py-4 xl:w-10/12">
<div class="relative px-4">
    <h1 class="relative text-3xl font-bold text-[#0D5568]">
        KALENDER AGENDA
        <span
            class="ml-5 after:absolute after:bottom-3 after:h-[3px] after:w-1/5 after:bg-[#F5D05E]"></span>
    </h1>
</div>
<div class="flex flex-col px-4 pt-10 pb-4 lg:flex-row">
    <div class="w-full border py-3 lg:w-3/5 lg:py-0">
        <div class="max-w-screen-lg bg-gray-200">
            <link rel="dns-prefetch" href="//unpkg.com" />
            <link rel="dns-prefetch" href="//cdn.jsdelivr.net" />
            <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" />
            <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

            <style>
                [x-cloak] {
                    display: none;
                }
            </style>
            <div class="sans-serif h-auto bg-white pb-5 antialiased">
                <div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
                    <div class="container mx-auto my-auto px-4 py-2">
                        <div class="flex items-center justify-between py-3">
                            <div class="flex flex-row items-center px-3">
                                <div class="px-1">
                                    <div x-text="MONTH_NAMES[month]"
                                        class="text-2xl font-bold text-[#0D5568]"></div>
                                </div>
                                <div class="px-1">
                                    <div x-text="year" class="text-2xl font-bold text-[#0D5568]"></div>
                                </div>
                            </div>
                            <div class="flex flex-row pt-2">
                                <div class="rounded px-3">
                                    <button type="button" @click="prevMonth()">
                                        <svg class="inline-flex h-6 w-6 leading-none text-[#0D5568]"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M15 19l-7-7 7-7" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="rounded px-3">
                                    <button type="button" @click="nextMonth()">
                                        <svg class="inline-flex h-6 w-6 leading-none text-[#0D5568]"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-hidden rounded-sm bg-white shadow">
                            <div class="-mx-1 -mb-1">
                                <div class="flex flex-wrap">
                                    <template x-for="(day, index) in DAYS" :key="index">
                                        <div style="
                                                                width: 14.26%;
                                                                height: 50px;
                                                            "
                                            class="border-b border-r px-2 py-2 text-center">
                                            <div x-text="day"
                                                class="text-sm font-bold uppercase tracking-wide text-black">
                                            </div>
                                        </div>
                                    </template>
                                </div>
                                <div class="flex flex-wrap border-l border-t">
                                    <template x-for="blankday in blankdays">
                                        <div style="
                                                                width: 14.28%;
                                                                height: 120px;
                                                            "
                                            class="border-b border-r px-4 pt-2 text-center"></div>
                                    </template>
                                    <template x-for="(date, dateIndex) in no_of_days"
                                        :key="dateIndex">
                                        <div style="
                                                                width: 14.28%;
                                                                height: 120px;
                                                            "
                                            class="relative border-b border-r px-4 pt-2">
                                            <div x-text="date"
                                                class="inline-flex h-6 w-6 cursor-pointer items-center justify-center rounded-full text-center leading-none transition duration-100 ease-in-out"
                                                :class="{
                                                    'bg-blue-500 text-white': isToday(date) == true,
                                                    'text-black hover:bg-blue-200': isToday(date) ==
                                                        false
                                                }">
                                            </div>
                                            <div style="
                                                                    height: 80px;
                                                                "
                                                class="mt-1 overflow-y-auto">
                                                <template
                                                    x-for="
                                                                        event in
                                                                            events.filter(
                                                                                (e) =>
                                                                                    new Date(e.event_date).toDateString() ===
                                                                                    new Date(year, month, date).toDateString(),
                                                                            )
                                                                    ">
                                                    <div class="mt-1 overflow-hidden rounded-lg border px-2 py-1"
                                                        :class="{
                                                            'border-blue-200 text-blue-800 bg-blue-100': event
                                                                .event_theme === 'blue',
                                                            'border-red-200 text-red-800 bg-red-100': event
                                                                .event_theme === 'red',
                                                            'border-yellow-200 text-yellow-800 bg-yellow-100': event
                                                                .event_theme === 'yellow',
                                                            'border-green-200 text-green-800 bg-green-100': event
                                                                .event_theme === 'green',
                                                            'border-purple-200 text-purple-800 bg-purple-100': event
                                                                .event_theme === 'purple'
                                                        }">
                                                        <p x-text="event.event_title"
                                                            class="truncate text-sm leading-tight"></p>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                const MONTH_NAMES = [
                    'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember',
                ];
                const DAYS = [
                    'SUN',
                    'MON',
                    'TUE',
                    'WED',
                    'THU',
                    'FRI',
                    'SAT',
                ];

                function app() {
                    return {
                        month: '',
                        year: '',
                        no_of_days: [],
                        blankdays: [],
                        days: [
                            'SUN',
                            'MON',
                            'TUE',
                            'WED',
                            'THU',
                            'FRI',
                            'SAT',
                        ],
                        events: [], // Initialize events array

                        initDate() {
                            this.fetchEvents();
                            let today = new Date();
                            this.month = today.getMonth();
                            this.year = today.getFullYear();
                            this.datepickerValue = new Date(
                                this.year,
                                this.month,
                                today.getDate(),
                            ).toDateString();
                        },

                        async fetchEvents() {
                            this.events =
                                {!! json_encode(
                                    $agenda->map(function ($agenda) {
                                        return [
                                            'event_title' => $agenda->title,
                                            'event_date' => $agenda->datetime,
                                            'event_theme' => $agenda->bg_color,
                                        ];
                                    }),
                                ) !!};
                        },

                        isToday(date) {
                            const today = new Date();
                            const d = new Date(
                                this.year,
                                this.month,
                                date,
                            );
                            return (
                                today.toDateString() ===
                                d.toDateString()
                            );
                        },

                        getNoOfDays() {
                            let daysInMonth = new Date(
                                this.year,
                                this.month + 1,
                                0,
                            ).getDate();
                            let firstDayOfMonth = new Date(
                                this.year,
                                this.month,
                                1,
                            ).getDay(); // Hari pertama dalam bulan (0 untuk Minggu, 1 untuk Senin, dst.)

                            let blankdaysArray = [];
                            for (
                                let i = 0; i < firstDayOfMonth; i++
                            ) {
                                blankdaysArray.push(i);
                            }

                            let daysArray = [];
                            for (
                                let i = 1; i <= daysInMonth; i++
                            ) {
                                daysArray.push(i);
                            }

                            this.blankdays = blankdaysArray;
                            this.no_of_days = daysArray;
                        },
                        nextMonth() {
                            this.month++;
                            if (this.month > 11) {
                                this.month = 0;
                                this.year++;
                            }
                            this.getNoOfDays();
                            this.fetchEvents(); // Memuat ulang data
                        },

                        // tambahkan event listener untuk tombol prev month
                        prevMonth() {
                            this.month--;
                            if (this.month < 0) {
                                this.month = 11;
                                this.year--;
                            }
                            this.getNoOfDays();
                            this.fetchEvents(); // Memuat ulang data
                        },
                    };
                }
            </script>
        </div>
    </div>
    <div class="w-full px-0 py-3 lg:w-2/5 lg:px-4 lg:py-0">
        <div class="container mx-auto w-full border bg-white px-8 lg:py-4">
            <p class="py-0 text-[20px] font-bold" style="color: #0d5568">
                List Agenda
            </p>
            <div class="py-5">
                <hr
                    style="
                                        border-color: #f5d05e;
                                        border-width: 1px;
                                    " />
            </div>
            <div class="mx-auto w-auto">
                <!-- List Agenda -->
                @php
                    $lastMonth = null;
                    $lastDay = null;
                @endphp

                @foreach ($agenda->take(5) as $key => $item)
                    @php
                        $currentDate = \Carbon\Carbon::parse($item->datetime);
                        $formattedMonth = $currentDate->format('F');
                        $formattedDay = $currentDate->format('d');
                        $uniqueIdc = 'content_' . $key;
                        $uniqueIdt = 'title_' . $key;
                        $uniqueIdcLg = 'contentLg_' . $key;
                        $uniqueIdtLg = 'titleLg_' . $key;
                    @endphp

                    @if ($lastDay != $formattedDay)
                        <div class="flex flex-row">
                            <div class="text-2sm mb-2 px-1 font-semibold text-gray-600">
                                {{ $formattedDay }}
                            </div>
                            <div class="text-2sm mb-2 px-1 font-semibold text-gray-600">
                                {{ $formattedMonth }}
                            </div>
                        </div>
                    @endif

                    <div class="hidden lg:block">
                        <div class="mb-2 flex rounded-lg border bg-gray-100">
                            <div class="md:2-1/4 mx-auto flex w-1/5 items-center justify-between px-4">
                                <div class="text-md pr-2 font-bold md:text-lg">
                                    {{ $item->published_at->format('H:i') }}
                                </div>
                                <hr class="hidden md:block"
                                    style="
                                                        border-left: 2px solid
                                                            {{ $item->bg_color }};
                                                        height: 75%;
                                                    " />
                            </div>
                            <button
                                onclick="toggleTruncateLg('{{ $uniqueIdcLg }}', '{{ $uniqueIdtLg }}')"
                                class="w-4/5 px-4 py-2 md:w-3/4">
                                <div class="text-md mb-2 truncate text-start font-bold"
                                    id="{{ $uniqueIdtLg }}">
                                    <p>{!! $item->title !!}</p>
                                </div>
                                <div class="truncate text-start text-gray-700" id="{{ $uniqueIdcLg }}">
                                    {!! $item->content !!}
                                </div>
                            </button>
                        </div>
                    </div>

                    <div class="block lg:hidden">
                        <div class="mb-2 flex rounded-lg border bg-gray-100"
                            style="
                                                border-color: {{ $item->bg_color }};
                                            ">
                            <div class="md:2-1/4 mx-auto flex w-1/5 items-center justify-between px-4">
                                <div class="text-md pr-2 font-bold">
                                    {{ $item->published_at->format('H:i') }}
                                </div>
                                <hr class="hidden md:block"
                                    style="
                                                        border-left: 2px solid
                                                            {{ $item->bg_color }};
                                                        height: 75%;
                                                    " />
                            </div>
                            <button
                                onclick="toggleTruncate('{{ $uniqueIdc }}', '{{ $uniqueIdt }}')"
                                class="w-4/5 px-4 py-2 md:w-3/4">
                                <div class="text-md mb-2 truncate text-start font-bold"
                                    id="{{ $uniqueIdt }}">
                                    <p>{!! $item->title !!}</p>
                                </div>
                                <div class="truncate text-start text-gray-700" id="{{ $uniqueIdc }}">
                                    {!! $item->content !!}
                                </div>
                            </button>
                        </div>
                    </div>

                    @php
                        $lastMonth = $formattedMonth;
                        $lastDay = $formattedDay;
                    @endphp
                @endforeach
            </div>
        </div>
    </div>

    <script>
        function toggleTruncate(contentId, titleId) {
            var contentDiv = document.getElementById(contentId);
            var titleDiv = document.getElementById(titleId);
            contentDiv.classList.toggle('truncate');
            titleDiv.classList.toggle('truncate');
        }

        function toggleTruncateLg(contentId, titleId) {
            var contentDiv = document.getElementById(contentId);
            var titleDiv = document.getElementById(titleId);
            contentDiv.classList.toggle('truncate');
            titleDiv.classList.toggle('truncate');
        }
    </script>
</div>
</div>
</section>
{{-- End Agenda --}}
</div>
@endsection
