<div>
    <div class="grid grid-cols-2 gap-3 md:gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 py-20">
        @foreach ($this->merchandises as $merchandise)
            <div
                class="max-w-sm rounded-lg border border-gray-200 bg-white shadow dark:border-gray-700 dark:bg-gray-800 w-64 h-96">
                <a href="{{ route('merchandise.show', $merchandise->slug) }}">
                    <img class="rounded-t-lg w-full h-52 md:h-64 object-cover border-b border-b-slate-300"
                        src="{{ $merchandise->getFirstMediaUrl() }}" alt="image" />
                </a>
                <div class="flex flex-col py-2 md:py-3 px-2">
                    <a href="{{ route('merchandise.show', $merchandise->slug) }}">
                        <h5
                            class="text-sm md:text-base font-semibold tracking-tight text-gray-900 dark:text-white line-clamp-2 text-left mb-2">
                            {{ $merchandise->title }}
                        </h5>
                    </a>
                    <p class="items-center mb-3 text-sm md:text-base font-semibold text-[#0D5568] dark:text-gray-400">
                        Rp.
                        {{ number_format($merchandise->price, 0, ',', '.') }}
                    </p>
                    <a href="{{ route('merchandise.show', $merchandise->slug) }}"
                        class="inline-flex w-full items-center justify-center rounded-lg bg-[#0D5568] px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Selengkapnya
                    </a>
                </div>
            </div>
            {{--
                <div class="w-full bg-white border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="{{ route('merchandise.show', $merchandise->slug) }}">
                <img class="px-5 py-3 w-fit h-[200px]" src="{{ $merchandise->getFirstMediaUrl() }}"
                alt="merchandise-image" />
                </a>
                <div class="px-5">
                <a href="{{ route('merchandise.show', $merchandise->slug) }}">
                <h2 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                {{ $merchandise->title }}</h2>
                </a>
                <p class="mb-3 text-lg font-semibold text-[#0D5568] dark:text-gray-400">Rp.
                {{ number_format($merchandise->price, 0, ',', '.') }}
                </p>
                <div class="flex items-center justify-center pb-5">
                <a href="{{ $merchandise->link_buy }}"
                class="items-center justify-center rounded px-3 py-2 w-3/4 text-sm font-medium text-center text-white bg-[#0D5568] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                BELI
                </a>
                </div>
                </div>
                </div>
            --}}
        @endforeach
    </div>
    <div class="my-3">
        {{ $this->merchandises->onEachSide(1)->links() }}
    </div>
</div>
