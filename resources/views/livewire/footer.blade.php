<div class="flex w-full">
    <div class="flex w-full flex-col">
        <div class="mx-auto w-4/5">
            <div
                class="flex w-full flex-col items-start justify-between gap-10 text-center md:flex-row md:border-b md:border-white md:text-left pt-10">
                <div class="flex w-full flex-col">
                    <div class="flex flex-col items-center md:items-start">
                        <div class="flex flex-grow flex-col gap-2">
                            <h1 class="text-base font-bold text-white">
                                Video Profil
                            </h1>
                            <div class="pb-5"> <iframe class="w-72 h-40" src="https://www.youtube.com/embed/LhuXAA1O7Ig" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> </div>
                        </div>
                    </div>
                </div>
                <div class="flex w-full flex-col">
                    <div class="flex flex-col items-center md:items-start">
                        <div class="flex flex-grow flex-col gap-2">
                            <h1 class="text-base font-bold text-white">
                                Alamat
                            </h1>
                            <p class="text-xs text-white">
                                Universitas Pembangunan Nasional "VETERAN"
                                Yogyakarta
                                <br />
                                Jl. SWK No.104 Yogyakarta 55283 (Kampus Pusat)
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
                                <p class="text-base font-bold text-white">
                                    Kontak Media Partner
                                </p>
                            </div>
                            @foreach ($this->organizationals as $organizational)
                                @if ($organizational->slug === 'contact')
                                    <div class="">
                                        @foreach ($organizational->content as $item)
                                            @if ($item['type'] === 'contact')
                                                @if ($item['data']['name'] === 'Telepon Media Partner')
                                                    <p class="text-sm text-white pb-1">
                                                        Telp. {!! $item['data']['number'] !!}
                                                    </p>
                                                @endif
                                                @if ($item['data']['name'] === 'WhatsApp Media Partner')
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
                        <div class="flex flex-col">
                            <div class="pb-2">
                                <p class="text-base font-bold text-white">
                                    Kontak Keuangan
                                </p>
                            </div>
                            @foreach ($this->organizationals as $organizational)
                                @if ($organizational->slug === 'contact')
                                    <div class="">
                                        @foreach ($organizational->content as $item)
                                            @if ($item['type'] === 'contact')
                                                @if ($item['data']['name'] === 'Telepon Keuangan')
                                                    <p class="text-sm text-white pb-1">
                                                        Telp. {!! $item['data']['number'] !!}
                                                    </p>
                                                @endif
                                                @if ($item['data']['name'] === 'WhatsApp Keuangan')
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
            <div
                class="flex w-full flex-col items-center justify-center gap-10 pt-5 text-center md:flex-row md:items-start md:justify-between md:text-left">
                <div class="flex w-full flex-col">
                    <div class="flex flex-col">
                        <div class="pb-2">
                            <p class="text-base font-bold text-white">
                                Tentang ISR
                            </p>
                        </div>
                        @foreach ($this->organizationals as $organizational)
                            @if ($organizational->slug !== 'contact' && $organizational->slug !== 'general')
                                <div class="pb-1">
                                    <a wire:key="{{ $organizational->id }}"
                                        href="{{ route('abouts.show', $organizational->slug) }}"
                                        class="text-sm text-white hover:text-[#F5D05E]">{{ $organizational->title }}</a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="flex w-full flex-col">
                    <div class="flex flex-col">
                        <div class="pb-2">
                            <p class="text-base font-bold text-white">
                                Departemen
                            </p>
                        </div>
                        @foreach ($this->departments as $department)
                            <div class="pb-1">
                                <a wire:key="{{ $department->id }}"
                                    href="{{ route('departments.show', $department->slug) }}"
                                    class="text-sm text-white hover:text-[#F5D05E]">{{ $department->title }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="w-full">
                    <div class="flex flex-col">
                        <div class="pb-2">
                            <p class="text-base font-bold text-white">
                                Download
                            </p>
                        </div>
                        @foreach ($this->downloads as $download)
                            <div class="pb-1">
                                <a wire:key="{{ $download->id }}"
                                    href="{{ route('downloads.index', ['category' => $download->slug]) }}"
                                    class="text-sm text-white hover:text-[#F5D05E]">{{ $download->name }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="z-10 w-full">
            <img src="/images/footer.png" alt="" class="w-full object-cover" />
        </div>
    </div>
    <div class="absolute left-0 top-0 z-0 h-full">
        <img src="/images/full-side-footer.png" alt="" class="object-contain h-full w-full" />
    </div>
    <div class="absolute right-0 top-0 z-0 flex h-full flex-col items-end">
        <img src="/images/full-side-footer.png" alt="" class="h-full w-full object-contain" />
    </div>
</div>
