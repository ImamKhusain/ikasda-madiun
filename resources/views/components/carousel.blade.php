@props(['posts'])

<div id="default-carousel" class="relative h-full w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-full overflow-hidden">
        @foreach ($posts as $post)
            <div class="hidden h-full w-full bg-cover bg-center duration-1000 ease-in-out" data-carousel-item
                style="
                    background-image: url('{{ $post->getFirstMediaUrl() }}');
                ">
                <div class="absolute bottom-0 left-0 w-full h-44 bg-[#0D5568] bg-opacity-50">
                    <div class="absolute bottom-5 left-20 w-auto h-auto">
                        <h1 class="text-sm md:text-xl lg:text-2xl font-bold text-white text-wrap pb-2 md:pb-4">
                            {{ Illuminate\Support\Str::limit(strip_tags($post->title), 50) }}</h1>
                        @foreach ($post->content as $item)
                            @if ($item['type'] === 'paragraph')
                                <p class="text-white text-xs md:text-base pb-3">
                                    {{ Illuminate\Support\Str::limit(strip_tags($item['data']['content']), 200) }}</p>
                            @endif
                        @endforeach
                        <p class="text-white text-xs md:text-base">{!! \Carbon\Carbon::parse($post->published_at)->format('d F Y') !!}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Slider indicators -->
    <div class="absolute bottom-5 left-1/2 z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse">
        @foreach ($posts as $index => $post)
            <button type="button" class="h-3 w-3 rounded-full" aria-current="{{ $index == 0 ? 'true' : 'false' }}"
                aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}"></button>
        @endforeach
    </div>
    <!-- Slider controls -->
    <button type="button"
        class="group absolute start-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
        data-carousel-prev>
        <span
            class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-4 group-focus:ring-white dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
            <svg class="h-4 w-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 1 1 5l4 4" />
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button"
        class="group absolute end-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
        data-carousel-next>
        <span
            class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-4 group-focus:ring-white dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
            <svg class="h-4 w-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
