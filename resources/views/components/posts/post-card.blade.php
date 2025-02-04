@props(['post'])

<div class="aspect-square w-60 rounded-lg bg-[#0D5568] shadow md:w-72">
    <a href="{{ route('posts.show', ['category' => $post->categories->slug, 'post' => $post->slug]) }}">
        <div class="relative h-full rounded-t-lg bg-cover bg-center"
            style="background-image: url('{{ $post->getFirstMediaUrl() }}')">
            <p class="absolute bottom-2 left-2 text-wrap text-sm font-semibold text-white shadow-lg md:text-base">
                {{ Illuminate\Support\Str::limit(strip_tags($post->title), 50) }}
            </p>
        </div>
        <div class="flex items-center justify-center p-2 md:p-5">
            <h5 class="mb-2 text-center text-xs tracking-tight text-white md:text-base">
                {!! \Carbon\Carbon::parse($post->published_at)->format('d F Y, H:i') !!}
            </h5>
        </div>
    </a>
</div>
