@props(['items', 'contentType' => ''])

<div class="">
    @foreach ($items as $item)
        @if ($item['type'] === 'heading')
            @if ($item['data']['level'] === 'h1')
                <h1 class="mb-2 py-5 text-xl font-bold">
                    {!! $item['data']['content'] !!}
                </h1>
            @endif

            @if ($item['data']['level'] === 'h2')
                <h2 class="mb-2 py-3 text-lg font-bold">
                    {!! $item['data']['content'] !!}
                </h2>
            @endif

            @if ($item['data']['level'] === 'h3')
                <h3 class="mb-2 py-2 text-lg font-bold">
                    {!! $item['data']['content'] !!}
                </h3>
            @endif
        @endif

        @if ($item['type'] === 'paragraph')
            @php
                $content = $item['data']['content'];
                // Tambahkan kelas jika tag <p> ditemukan
                $modifiedContent = preg_replace(
                    '/<p>/',
                    '<p class="text-sm md:text-sm font-regular text-justify mb-5">',
                    $content,
                );
                // Tambahkan kelas jika tag <ol> ditemukan
                $modifiedContent = preg_replace(
                    '/<ol>/',
                    '<ol class="text-sm md:text-sm font-regular text-justify mb-5">',
                    $modifiedContent,
                );
                // Tambahkan kelas jika tag <li> ditemukan
                $modifiedContent = preg_replace(
                    '/<li>/',
                    '<li class="list-decimal text-sm md:text-sm font-regular text-justify ml-5 mb-2">',
                    $modifiedContent,
                );
            @endphp

            {!! $modifiedContent !!}
        @endif

        {{-- @if ($item['type'] === 'image' && $contentType === 'organizational')
            <div class="flex justify-center">
                <img src="{{ asset('storage/' . $item['data']['url']) }}" alt="{{ $item['data']['alt'] }}" class="mb-4">
            </div>
        @endif --}}

        @if ($item['type'] === 'image' && $contentType === 'post')
            <img src="{{ asset('storage/' . $item['data']['url']) }}" alt="{{ $item['data']['alt'] }}" class="mb-4">
        @endif
    @endforeach
</div>
