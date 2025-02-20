@extends('layouts.app')

@section('title', 'Data Alumni')

@section('content')
    <div class="flex flex-col">
        <div class="flex flex-col md:mb-20">
            <div class="relative w-full mx-auto h-1/2">
                <img src="/images/data-alumni.png" alt="data alumni"
                    class="h-full w-full object-contain bg-black bg-blend-multiply bg-opacity-20 shadow-md" />
                <div class="absolute inset-0 bg-black/30"></div>
                <div class="relative z-10 flex h-full items-center justify-center">
                </div>
            </div>
            <div class="w-64 md:w-[700px] h-16 md:h-32 bg-primary px-6 py-2 text-lg md:text-4xl font-bold text-black flex items-center justify-center ml-10"
                style="transform: translateY(-50%);">
                <h1 class="text-center">Data Alumni SMAN 2 Madiun</h1>
            </div>
        </div>
        <div class="mx-auto max-w-6xl px-4 py-20 sm:px-6 lg:px-4">
            {{-- @livewire('merchandise-list') --}}
        </div>
    </div>
@endsection
