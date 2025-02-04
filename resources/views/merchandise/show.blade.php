@extends('layouts.app')

@section('title', "Merchandise $merchandise->title")

@section('content')
    <div class="flex flex-col bg-gray-200">
        <div class="flex flex-row bg-[#B8DFF7] shadow-md">
            <div class="flex w-full items-center justify-start mx-auto">
                <img src="/images/showMerchandise.png" alt="merchandise" class="h-full lg max-h-60 object-contain" />
            </div>
            <div class="flex items-center justify-end">
                <h1 class="absolute pr-20 text-xl font-black text-white sm:text-4xl md:text-5xl lg:text-7xl">
                    DETAIL PRODUK
                </h1>
            </div>
        </div>
        <div class="flex flex-row items-center justify-center lg:py-5">
            <div class="w-full bg-white lg:w-4/5">
                <div class="item-start mx-auto flex w-full flex-col px-5 py-4 lg:flex-row">
                    <div class="pl-1 pr-4 lg:w-1/2">
                        <!--HTML CODE-->
                        <div class="mx-auto max-w-2xl">
                            <div id="default-carousel" class="relative overflow-hidden" data-carousel="static">
                                <!-- Carousel wrapper -->
                                <div class="relative h-80 md:h-96" data-carousel-inner>
                                    @foreach ($merchandise->getMedia() as $items)
                                        <div class="hidden ease-in-out" data-carousel-item>
                                            <img src="{{ $items->getUrl() }}" class="h-full w-full object-cover"
                                                alt="Slider" />
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Slider controls and indicators -->
                                <div class="my-3 flex items-center justify-between">
                                    <!-- Button control left -->
                                    <button type="button"
                                        class="flex h-full w-10 items-center justify-center bg-gray-200/50 transition hover:bg-gray-300 focus:outline-none"
                                        data-carousel-prev>
                                        <svg class="h-5 w-5 text-gray-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                    </button>
                                    <!-- Slider indicators -->
                                    <div class="mx-2 flex space-x-2" data-carousel-indicators>
                                        @foreach ($merchandise->getMedia() as $items)
                                            <button type="button"
                                                class="h-auto w-[20%] bg-gray-400/50 outline-[#F5D05E] focus:outline"
                                                aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0">
                                                <img src="{{ $items->getUrl() }}" class="h-full w-full object-cover"
                                                    alt="Slider" />
                                            </button>
                                        @endforeach
                                    </div>
                                    <!-- Button control right -->
                                    <button type="button"
                                        class="flex h-full w-10 items-center justify-center bg-gray-200/50 transition hover:bg-gray-300 focus:outline-none"
                                        data-carousel-next>
                                        <svg class="h-5 w-5 text-gray-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{--
                            <div class="flex flex-col">
                            @foreach ($merchandise->getMedia() as $items)
                            <img class="h-[50%]" src="{{ $items->getUrl() }}" alt="merchandise-image" />
                            @endforeach
                            </div>
                        --}}
                    </div>
                    <div
                        class="mx-auto py-5 pl-1 pr-1 lg:w-1/2 lg:py-0 lg:pl-4 md:justify-center md:max-w-2xl lg:max-w-full">
                        <div class="flex flex-col">
                            <a href="#">
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-black sm:text-xl md:text-2xl">
                                    {{ $merchandise->title }}
                                </h5>
                            </a>
                            <p class="my-2 md:my-5 text-xl font-semibold text-[#0D5568] md:text-3xl">
                                Rp. {{ $merchandise->price }}
                            </p>
                            <div class="container mt-3 bg-gray-50 px-3">
                                <h2 class="py-2 text-lg font-semibold text-[#0D5568] sm:text-xl md:text-2xl">
                                    Deskripsi Produk
                                </h2>
                                <p class="text-2xl">
                                    {!! $merchandise->description !!}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center justify-center py-7">
                            <a href="{!! $merchandise->link !!}" target="_blank"
                                class="flex h-[50px] w-full items-center justify-center bg-[#0D5568] py-2 text-center text-xl font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:text-2xl md:text-3xl">
                                BELI SEKARANG
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
