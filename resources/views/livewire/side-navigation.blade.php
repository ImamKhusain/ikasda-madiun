<div class="container bg-[#0D5568] px-5 pb-10 pt-4 rounded">
    <div class="flex justify-center pb-2">
        <p class="text-[25px] font-bold" style="color: white">Tentang ISR</p>
    </div>
    @foreach ($this->organizationals as $organizational)
        @if ($organizational->slug !== 'contact' && $organizational->slug !== 'general')
            <a wire:key="{{ $organizational->id }}" href="{{ route('abouts.show', $organizational->slug) }}">
                <div class="container min-h-[35px] px-2 py-4" style="border-bottom: 1px solid #f5d05e">
                    <p class="text-base text-white hover:text-[#F5D05E]">
                        {{ $organizational->title }}
                    </p>
                </div>
            </a>
        @endif
    @endforeach
</div>
