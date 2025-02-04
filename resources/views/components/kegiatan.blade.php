@props(['items'])

<div class="flex w-full">
    @php
        $left = true;
    @endphp

    <div class="mx-auto flex w-full flex-col p-0">
        @foreach ($items as $item)
            @if ($item['type'] === 'activity')
                @php
                    $content = '';
                    if (isset($item['data']['description'])) {
                        $content = $item['data']['description'];

                        // Tentukan warna berdasarkan posisi
                        $color = $left ? '#f5d05e' : '#0d5568';

                        // Tambahkan kelas jika tag <p> ditemukan dan tidak memiliki atribut class, dan tambahkan style untuk warna dan overflow
                        $content = preg_replace(
                            '/<p(?![^>]*class)/',
                            '<p class="text-[12px] md:text-[17px] w-full max-h-[200px] md:max-h-[360px] text-ellipsis overflow-hidden" style="color: ' .
                                $color .
                                '"',
                            $content,
                        );

                        // Tambahkan kelas jika tag <ol> ditemukan dan tidak memiliki atribut class
                        $content = preg_replace(
                            '/<ol(?![^>]*class)/',
                            '<ol class="text-md font-regular text-justify mb-5"',
                            $content,
                        );

                        // Tambahkan kelas jika tag <li> ditemukan dan tidak memiliki atribut class
                        $content = preg_replace(
                            '/<li(?![^>]*class)/',
                            '<li class="list-decimal text-md font-regular text-justify ml-5 mb-2"',
                            $content,
                        );

                        // Tambahkan kelas jika tag <h2> ditemukan dan tidak memiliki atribut class
                        $content = preg_replace(
                            '/<h2(?![^>]*class)/',
                            '<h2 class="text-lg md:text-xl font-regular md:font-semibold mb-5" style="color: ' .
                                $color .
                                '"',
                            $content,
                        );

                        // Tambahkan kelas jika tag <h3> ditemukan dan tidak memiliki atribut class
                        $content = preg_replace(
                            '/<h3(?![^>]*class)/',
                            '<h3 class="text-md md:text-lg font-regular md:font-semibold mb-5" style="color: ' .
                                $color .
                                '"',
                            $content,
                        );
                    }
                @endphp

                @if ($left) <div class="flex h-[300px] md:h-[500px] w-full justify-between">
                        <div class="w-full">
                            <img src="{{ asset('storage/' . $item['data']['image']) }}" alt=""
                                class="h-full w-full bg-cover object-cover object-center" />
                        </div>
                        <div class="flex w-full items-center justify-center bg-[#0D5568]">
                            <div class="flex-col px-2 md:w-3/4">
                                {!! $content !!}
                            </div>
                        </div>
                    </div>
                    @php
                        $left = false;
                    @endphp
                @else
                    <div class="flex h-[300px] md:h-[500px] w-full justify-between">
                        <div class="flex w-full items-center justify-center bg-[#F5D05E]">
                            <div class="flex-col px-2 md:w-3/4">
                                {!! $content !!}
                            </div>
                        </div>
                        <div class="w-full">
                            <img src="{{ asset('storage/' . $item['data']['image']) }}" alt=""
                                class="h-full w-full bg-cover object-cover object-center" />
                        </div>
                    </div>
                    @php
                        $left = true;
                    @endphp @endif
            @endif
        @endforeach
    </div>
</div>
