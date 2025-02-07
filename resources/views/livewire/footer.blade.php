<div class="flex w-full h-1/2 pb-10 bg-trinary">
    <div class="mx-auto w-4/5">
        <div class="flex w-full items-start justify-between gap-10 text-center md:flex-row md:text-left pt-10">
            <div class="flex w-full flex-col md:border-r-2 md:border-white">
                <div class="flex flex-col items-center md:items-start">
                    <div class="flex flex-grow flex-col gap-2">
                        <div class="pb-5">
                            <img src="/images/ikasda-logo.png" alt="ikasda-logo" class="w-[436px] h-72 object-cover">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex w-full flex-col md:border-r-2 md:border-white">
                <div class="flex flex-col items-start justify-center">
                    <div class="flex flex-grow flex-col gap-2">
                        <p class="text-xs text-white">
                            Jl. Letkol Suwarno, Kanigoro, Kec. Kartoharjo,
                            Kota Madiun, Jawa Timur 63118
                        </p>
                    </div>
                    <div class="mt-10">
                        <div class="flex flex-col gap-2">
                            <div class="">
                                @foreach ($this->organizationals as $organizational)
                                    @if ($organizational->slug === 'contact')
                                        <div class="">
                                            @foreach ($organizational->content as $item)
                                                @if ($item['type'] === 'contact')
                                                    @if ($item['data']['name'] === 'Telepon ISR')
                                                        <p class="text-sm text-white pb-1">
                                                            Telp. {!! $item['data']['number'] !!}
                                                        </p>
                                                    @endif
                                                    @if ($item['data']['name'] === 'WhatsApp ISR')
                                                        <p class="text-sm text-white pb-1">
                                                            WhatsApp. {!! $item['data']['number'] !!}
                                                        </p>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <div class="flex flex-grow flex-col gap-4">
                    <div class="flex flex-col">
                        <div class="pb-2">
                            <p class="text-xs text-white">
                                Kebijakan Pengguna
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
