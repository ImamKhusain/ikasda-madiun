@extends('layouts.app')

@section('title', 'Merchandise')

@section('content')
    <div class="flex flex-col">
        <div class="flex flex-row md:mb-20">
            <div class="relative w-full top-16 md:top-40">
                <img src="/images/merchandise.png" alt="merchandise"
                    class="h-full w-full object-cover bg-black bg-blend-multiply bg-opacity-20 shadow-md" />
            </div>
            <div class="flex items-center justify-end">
                <h1
                    class="absolute top-32 right-5 md:top-80 md:right-20 text-xl font-black text-white sm:text-3xl md:text-4xl lg:text-5xl">
                    KATALOG USAHA
                </h1>
            </div>
        </div>
        <div class="mx-auto max-w-6xl px-4 py-20 sm:px-6 lg:px-4">
            @livewire('merchandise-list')
        </div>
    </div>
@endsection
