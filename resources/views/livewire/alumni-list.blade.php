<div>
    <div class="grid grid-cols-2 gap-3 md:gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 py-20">
        @foreach ($this->alumnis as $alumni)
            <div
                class="max-w-sm rounded-lg border border-gray-200 bg-white shadow dark:border-gray-700 dark:bg-gray-800 w-64 h-96">
                <a href="{{ route('alumni.show', $alumni->slug) }}">
                    <img class="rounded-t-lg w-full h-52 md:h-64 object-cover border-b border-b-slate-300"
                        src="{{ $alumni->getFirstMediaUrl() }}" alt="image" />
                </a>
                <div class="flex flex-col py-2 md:py-3 px-2">
                    <a href="{{ route('alumni.show', $alumni->slug) }}">
                        <h5
                            class="text-sm md:text-base font-semibold tracking-tight text-gray-900 dark:text-white line-clamp-2 text-left mb-2">
                            {{ $alumni->title }}
                        </h5>
                    </a>
                    <p class="items-center mb-3 text-sm md:text-base font-semibold text-[#0D5568] dark:text-gray-400">
                        Rp.
                        {{ number_format($alumni->price, 0, ',', '.') }}
                    </p>
                    <a href="{{ route('alumni.show', $alumni->slug) }}"
                        class="inline-flex w-full items-center justify-center rounded-lg bg-[#0D5568] px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Selengkapnya
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="my-3">
        {{ $this->alumnis->onEachSide(1)->links() }}
    </div>
</div>
