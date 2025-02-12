<div class="flex flex-col md:flex-row w-full h-1/2 pb-10 bg-trinary">
    <div class="mx-auto w-4/5 flex flex-col md:flex-row justify-normal text-center md:text-left py-10">
        <!-- Kolom 1: Logo -->
        <div class="flex flex-col items-center md:items-start md:border-r-2 md:border-white px-5">
            <img src="/images/ikasda-logo.png" alt="ikasda-logo" class="w-48 h-36 md:w-72 md:h-60 object-cover pb-5">
        </div>

        <!-- Kolom 2: Informasi Kontak -->
        <div class="flex flex-col justify-center gap-7 md:border-r-2 md:border-white px-5">
            <p class="text-xs text-white">
                Jl. Letkol Suwarno, Kanigoro, Kec. Kartoharjo,
                Kota Madiun, Jawa Timur 63118
            </p>
            <div class="">
                @foreach ($this->organizationals as $organizational)
                    @if ($organizational->slug === 'contact')
                        @foreach ($organizational->content as $item)
                            @if ($item['type'] === 'contact')
                                <p class="text-xs text-white pb-1">
                                    {{ $item['data']['name'] }}: {!! $item['data']['number'] !!}
                                </p>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Kolom 3: Kebijakan Pengguna -->
        <div class="flex flex-col justify-center pl-4">
            <p class="text-xs text-white">Kebijakan Pengguna</p>
        </div>
    </div>
</div>
