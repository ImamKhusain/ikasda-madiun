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
                    '<p class="text-sm md:text-base font-regular text-justify mb-5">',
                    $content,
                );
                // Tambahkan kelas jika tag <ol> ditemukan
                $modifiedContent = preg_replace(
                    '/<ol>/',
                    '<ol class="text-sm md:text-base font-regular text-justify mb-5">',
                    $modifiedContent,
                );
                // Tambahkan kelas jika tag <li> ditemukan
                $modifiedContent = preg_replace(
                    '/<li>/',
                    '<li class="list-decimal text-sm md:text-base font-regular text-justify ml-5 mb-2">',
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

        @if ($item['type'] === 'image' && $contentType === 'download')
            <div class="flex justify-center">
                <img src="{{ asset('storage/' . $item['data']['url']) }}" alt="{{ $item['data']['alt'] }}"
                    class="mb-4">
            </div>
        @endif

        @if ($item['type'] === 'image' && $contentType === 'post')
            <img src="{{ asset('storage/' . $item['data']['url']) }}" alt="{{ $item['data']['alt'] }}" class="mb-4">
        @endif

        @if ($item['type'] === 'attachments')
            <div class="py-5">
                <div class="container mx-auto w-2/4 bg-gray-200 max-h-[250px] min-w-64 border border-gray-400">
                    <div class="md:h-4/5 flex justify-center">
                        <iframe src="{{ asset('storage/' . $item['data']['url'][0]) }}#page=1&view=fitH" alt="fileIcon"
                            style="width: 75%; height: auto;"></iframe>
                    </div>
                    <div class="container md:h-1/5 bg-white px-2 py-2 mx-auto my-auto min-h-[50px]">
                        <div class="flex flex-row justify-between">
                            <div class="px-1 flex flex-row max-h-[25px]">
                                <img src="https://icons.veryicon.com/png/o/internet--web/flatten-icon/file-76.png"
                                    alt="fileIcon" width="25" height="25">
                                <p class="text-lg font-bold">{{ $item['data']['desc'] }}</p>
                            </div>
                            <a href="{{ asset('storage/' . $item['data']['url'][0]) }}">
                                <img src="https://icons.veryicon.com/png/o/miscellaneous/general-icon-12/download-download-3.png"
                                    alt="fileIcon" width="25" height="25">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>
