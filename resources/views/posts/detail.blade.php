@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <article class="min-h-screen">
        <div class="w-full h-[75vh] bg-cover bg-center bg-black bg-blend-multiply bg-opacity-20 shadow-md"
            style="background-image: url('/images/thumbnail-detail.png');">
        </div>
        <div class="p-8 rounded bg-white -mt-20 mx-auto z-20 w-11/12 md:w-5/6">
            <x-breadcrumb menu="pojok-ilmiah" :category="$category" />
            <h1 class="text-uppercase text-4xl font-bold mt-5">{{ $category->name }} Terkini</h1>

            <div class="grid w-full grid-cols-4 gap-10 mt-5">
                <div class="col-span-4 md:col-span-3">
                    <livewire:post-list :category="$category">
                </div>
                <div id="side-bar" class="md:border-t-none top-0 col-span-4 h-fit space-y-5 md:col-span-1 md:px-0">
                    <div class="flex flex-col gap-5 py-5 w-full h-auto rounded border border-gray-200 px-3">
                        <x-search-box />

                        @include('components.tags-box')
                    </div>

                    {{-- Category Dropdown Start --}}
                    <div class="flex flex-col gap-2 w-full p-5 border border-gray-200 rounded">
                        <h1 class="text-base md:text-sm lg:text-base font-bold">CATEGORY</h1>
                        @if ($category->slug === 'artikel')
                            <a href="{{ route('posts.detail', ['category' => 'artikel', 'subCategory' => 'isr-journey']) }}"
                                class="block p-1">
                                <div class="p-5 flex flex-col items-center w-full h-full bg-cover bg-center rounded"
                                    style="background-image: url('/images/sub-category/isr-journey.png');">
                                    <div
                                        class="w-full h-10 border border-[#FFDF4E] flex items-center justify-center gap-4 rounded-xl px-2 overflow-hidden">
                                        <img src="/images/sub-category/category-icon.svg" alt="category icon"
                                            class="flex md:hidden lg:flex">
                                        <p class="text-center md:text-xs lg:text-sm font-bold text-[#FFDF4E]">
                                            ISR JOURNEY</p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('posts.detail', ['category' => 'artikel', 'subCategory' => 'opini-refleksi']) }}"
                                class="block p-1">
                                <div class="p-5 flex flex-col items-center w-full h-full bg-cover bg-center rounded"
                                    style="background-image: url('/images/sub-category/opini-refleksi.png');">
                                    <div
                                        class="w-full h-10 border border-[#FFDF4E] flex items-center justify-center gap-4 rounded-xl px-2 overflow-hidden">
                                        <img src="/images/sub-category/category-icon.svg" alt="category icon"
                                            class="flex md:hidden lg:flex">
                                        <p class="text-center md:text-xs lg:text-sm font-bold text-[#FFDF4E]">
                                            OPINI & REFLEKSI</p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('posts.detail', ['category' => 'artikel', 'subCategory' => 'tips-trick']) }}"
                                class="block p-1">
                                <div class="p-5 flex flex-col items-center w-full h-full bg-cover bg-center rounded"
                                    style="background-image: url('/images/sub-category/tips-trick.png');">
                                    <div
                                        class="w-full h-10 border border-[#FFDF4E] flex items-center justify-center gap-4 rounded-xl px-2 overflow-hidden">
                                        <img src="/images/sub-category/category-icon.svg" alt="category icon"
                                            class="flex md:hidden lg:flex">
                                        <p class="text-center md:text-xs lg:text-sm font-bold text-[#FFDF4E]">
                                            TIPS & TRICK</p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('posts.detail', ['category' => 'artikel', 'subCategory' => 'prestasi-isr']) }}"
                                class="block p-1">
                                <div class="p-5 flex flex-col items-center w-full h-full bg-cover bg-center rounded"
                                    style="background-image: url('/images/sub-category/prestasi-isr.png');">
                                    <div
                                        class="w-full h-10 border border-[#FFDF4E] flex items-center justify-center gap-4 rounded-xl px-2 overflow-hidden">
                                        <img src="/images/sub-category/category-icon.svg" alt="category icon"
                                            class="flex md:hidden lg:flex">
                                        <p class="text-center md:text-xs lg:text-sm font-bold text-[#FFDF4E]">
                                            PRESTASI ISR</p>
                                    </div>
                                </div>
                            </a>
                        @endif

                        @if ($category->slug === 'mini-blog')
                            <a href="{{ route('posts.detail', ['category' => 'mini-blog', 'subCategory' => 'fact-in-research']) }}"
                                class="block p-1">
                                <div class="p-5 flex flex-col items-center w-full h-full bg-cover bg-center rounded"
                                    style="background-image: url('/images/sub-category/fact-research.png');">
                                    <div
                                        class="w-full h-10 border border-[#FFDF4E] flex items-center justify-center gap-4 rounded-xl px-2 overflow-hidden">
                                        <img src="/images/sub-category/category-icon.svg" alt="category icon"
                                            class="flex md:hidden lg:flex">
                                        <p class="text-center md:text-xs lg:text-sm font-bold text-[#FFDF4E]">
                                            FACT IN RESEARCH</p>
                                    </div>
                                </div>
                            </a>

                            <a href="{{ route('posts.detail', ['category' => 'mini-blog', 'subCategory' => 'isr-edu']) }}"
                                class="block p-1">
                                <div class="p-5 flex flex-col items-center w-full h-full bg-cover bg-center rounded"
                                    style="background-image: url('/images/sub-category/isr-edu.png');">
                                    <div
                                        class="w-full h-10 border border-[#FFDF4E] flex items-center justify-center gap-4 rounded-xl px-2 overflow-hidden">
                                        <img src="/images/sub-category/category-icon.svg" alt="category icon"
                                            class="flex md:hidden lg:flex">
                                        <p class="text-center md:text-xs lg:text-sm font-bold text-[#FFDF4E]">
                                            ISR EDU</p>
                                    </div>
                                </div>
                            </a>
                        @endif
                    </div>
                    {{-- Category Dropdown End --}}

                    {{-- Post Populer Start --}}
                    <div class="hidden md:flex flex-col w-full h-auto rounded border border-gray-200 p-3">
                        <div class="text-xl font-medium">{{ $category->name }} Populer</div>
                        @foreach ($populars as $item)
                            <a
                                href="{{ route('posts.show', ['category' => $item->categories->slug, 'post' => $item->slug]) }}">
                                <div class="flex flex-row w-full py-2 gap-2 items-start justify-start">
                                    <div class="w-1/4 rounded-md">
                                        <img src="{{ $item->getFirstMediaUrl() }}" alt="Img" class="aspect-square">
                                    </div>
                                    @php
                                        $strippedContent = Illuminate\Support\Str::limit(strip_tags($item->title), 50);
                                    @endphp
                                    <div class="flex flex-col w-3/4 items-start">
                                        <div class="text-xs font-semibold">{{ $strippedContent }}</div>
                                        <p class="text-xs font-medium">Read in {{ $item->getReadingTime() }} minutes</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    {{-- Post Populer End --}}
                </div>
            </div>
        </div>
    </article>
@endsection
