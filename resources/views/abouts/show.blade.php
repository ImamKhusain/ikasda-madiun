@extends('layouts.app')

@section('title', "$organizational->title")

@section('content')
    <div class="relative px-14 md:px-40 py-28 w-full">
        <div class="flex flex-row gap-20 items-center lg:items-start justify-center mt-20">
            <div class="lg:w-1/3 py-1 flex-col hidden lg:flex">
                <livewire:side-navigation>
            </div>
            <div class="flex flex-col w-full lg:w-2/3">
                <h1 class="font-bold text-3xl text-center">{{ $organizational->title }}</h1>
                @if ($organizational->slug === 'profile' || $organizational->slug === 'cabinet')
                    <img src="{{ $organizational->getFirstMediaUrl() }}" alt=""
                        class="w-[350px] h-[350px] mx-auto py-8">
                @else
                    @foreach ($organizational->content as $item)
                        @if ($item['type'] === 'image')
                            <div class="flex justify-center">
                                <img src="{{ asset('storage/' . $item['data']['url']) }}" alt="{{ $item['data']['alt'] }}"
                                    class="w-auto h-[350px] py-8">
                            </div>
                        @endif
                    @endforeach
                @endif
                <x-content :items="$organizational->content" contentType="organizational" />
            </div>
        </div>
    </div>
@endsection
