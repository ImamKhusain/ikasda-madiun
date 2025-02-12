<div class="container bg-[#074799] px-5 pb-10 pt-4 rounded">
    <div class="flex justify-center pb-5">
        <p class="text-[25px] font-bold" style="color: white">Tentang Ikasda</p>
    </div>
    @foreach ($this->organizationals as $organizational)
        @if ($organizational->slug !== 'contact' && $organizational->slug !== 'general')
            <a wire:key="{{ $organizational->id }}" href="{{ route('abouts.show', $organizational->slug) }}"
                class="text-white hover:text-primary transition duration-300 ease-out">
                <div class="container min-h-[35px] px-2 py-4" style="border-bottom: 1px solid #f5d05e">
                    <p class="text-base">
                        {{ $organizational->title }}
                    </p>
                </div>
            </a>
        @endif
    @endforeach
</div>
