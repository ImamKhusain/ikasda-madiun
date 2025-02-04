@extends('layouts.app')

@section('title', 'Pojok Ilmiah')

@section('content')
    <div class="px-0 py-0 mx-auto w-full">
        <livewire:posts>
            {{-- Topik Start --}}
            {{-- <section>
                <div class="px-10 py-5 flex flex-col gap-5 w-full min-h-[300px]">
                    <div class="">
                        <h1 class="border-b-4 border-b-[#FFDF4E] text-4xl w-full pb-2">Topik</h1>
                    </div>
                    <div class="py-2 w-auto h-full rounded-lg flex flex-row items-center justify-start gap-5 flex-wrap">
                        @foreach ($posts as $post)
                            <div class="rounded-lg shadow w-auto h-auto bg-white px-4 py-1 flex justify-start items-center">
                                <a wire:navigate href="{{ route('posts.index', ['tag' => $post->slug]) }}">
                                    <div class="flex flex-col">
                                        <p class="text-xl">{{ $post->name }}</p>
                                        <p class="text-sm text-gray-500"> total</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
            </section> --}}
            {{-- Topik End --}}
    </div>
@endsection
