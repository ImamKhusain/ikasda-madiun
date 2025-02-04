@extends("layouts.app")

@section("title", $post->title)
@section("meta_description", $post->meta_description)

@section("content")
    <article
        class="col-span-4 flex h-full w-full flex-col items-center md:col-span-3"
    >
        <div
            class="h-[75vh] w-full bg-black bg-opacity-20 bg-cover bg-center bg-blend-multiply shadow-md"
            style="background-image: url('{{ $post->getFirstMediaUrl() }}')"
        ></div>
        <div class="z-20 -mt-20 w-11/12 rounded bg-white p-8 md:w-5/6">
            <x-breadcrumb
                menu="pojok-ilmiah"
                :category="$post->categories"
                :post="$post"
            />
            <div
                class="mb-16 mt-5 flex flex-col items-center justify-start gap-5"
            >
                @if ($post->categories->name === "artikel" || $post->categories->name === "mini-blog")
                    @if ($post->subCategories->first())
                        <h2 class="text-sm">
                            {{ $post->subCategories->first()->name }}
                        </h2>
                    @endif
                @endif

                <h1
                    class="max-w-2xl text-wrap text-center text-2xl font-medium md:text-3xl"
                >
                    {{ $post->title }}
                </h1>
                <p class="text-xs md:text-sm">
                    {!! \Carbon\Carbon::parse($post->published_at)->format("d F Y, H:i") !!}
                </p>
            </div>

            <div
                class="flex w-full flex-col items-start justify-between gap-8 lg:flex-row-reverse"
            >
                <div
                    class="hidden w-1/4 flex-col items-start justify-start rounded-md border border-gray-200 p-4 lg:flex"
                >
                    <h1 class="pb-3 text-center text-xl font-bold">
                        {{ $post->categories->name }} Terkini
                    </h1>
                    @foreach ($populars as $item)
                        <a
                            href="{{ route("posts.show", ["category" => $item->categories->slug, "post" => $item->slug]) }}"
                        >
                            <div
                                class="flex w-full flex-row items-start justify-start gap-2 py-2"
                            >
                                <div class="w-1/3 rounded-md">
                                    <img
                                        src="{{ $item->getFirstMediaUrl() }}"
                                        alt="{{ $item->title }}"
                                        class="aspect-square w-full rounded"
                                    />
                                </div>
                                <div
                                    class="flex w-2/3 flex-col items-start gap-2"
                                >
                                    <div class="text-xs font-semibold">
                                        {{ Illuminate\Support\Str::limit(strip_tags($item->title), 50) }}
                                    </div>
                                    <p class="text-xs font-medium">
                                        Read in {{ $item->getReadingTime() }}
                                        minutes
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="w-full lg:w-3/4">
                    <div
                        class="flex w-full flex-row justify-between gap-2 border-b border-t border-gray-200 py-2"
                    >
                        <div class="flex">
                            <p class="text-xs font-normal md:text-sm">
                                Oleh: {{ $post->user->name }}
                            </p>
                            <span
                                class="text-xs font-normal text-gray-500 md:text-sm"
                            >
                                &nbsp;|&nbsp;{{ $post->getReadingTime() }} min
                                read
                            </span>
                        </div>
                        <div class="flex">
                            <span
                                class="mr-2 text-xs font-normal text-gray-500 md:text-sm"
                            >
                                {{ $post->published_at->diffForHumans() }}
                            </span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.3"
                                stroke="currentColor"
                                class="aspect-square w-3 text-gray-500 md:w-5"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"
                                />
                            </svg>
                        </div>
                    </div>
                    <x-content :items="$post->content" contentType="post" />
                    <div
                        class="article-actions-bar my-6 flex flex-row items-center justify-between border-b border-t border-gray-200 p-2 text-sm"
                    >
                        <div class="flex flex-row gap-x-2">
                            @foreach ($post->tags as $tag)
                                <x-badge
                                    wire:navigate
                                    href="{{ route('posts.detail', ['category' => $post->categories->slug, 'tag' => $tag->slug]) }}"
                                >
                                    {{ $tag->name }}
                                </x-badge>
                            @endforeach
                        </div>
                        <div class="flex">
                            <livewire:like-button
                                :key="'like-' . $post->id"
                                :model="$post"
                            />
                        </div>
                    </div>

                    <livewire:post-comments :model="$post" />

                    <div
                        class="my-10 flex w-full flex-col items-start justify-start gap-5 rounded-md"
                    >
                        <h1
                            class="w-fit border-b-2 border-b-[#F5D05E] py-2 text-xl font-bold"
                        >
                            {{ $post->categories->name }}
                            Terkait
                        </h1>
                        @foreach ($relates as $item)
                            <a
                                class="w-full border-b border-gray-200"
                                href="{{ route("posts.show", ["category" => $item->categories->slug, "post" => $item->slug]) }}"
                            >
                                <div
                                    class="flex w-full items-center justify-start gap-2 py-2"
                                >
                                    <div class="flex flex-col items-start">
                                        <h1 class="text-base font-semibold">
                                            {{ $item->title }}
                                        </h1>
                                        <h2 class="text-sm">
                                            {!! \Carbon\Carbon::parse($item->published_at)->format("d F Y") !!}
                                        </h2>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection
