<div>
    <div class="grid grid-cols-2 gap-3 md:gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($this->merchandises as $merchandise)
            <div
                class="max-w-sm rounded-lg border border-gray-200 bg-white shadow dark:border-gray-700 dark:bg-gray-800">
                <a href="{{ route('merchandise.show', $merchandise->slug) }}">
                    <img class="rounded-t-lg w-full h-[200px] md:h-[260px] object-cover border-b border-b-slate-300"
                        src="{{ $merchandise->getFirstMediaUrl() }}" alt="image" />
                </a>
                <div class="p-2 md:p-5">
                    <a href="{{ route('merchandise.show', $merchandise->slug) }}">
                        <h5
                            class="mb-2 text-md md:text-lg font-semibold tracking-tight text-gray-900 dark:text-white min-h-[55px] line-clamp-2">
                            {{ $merchandise->title }}
                        </h5>
                    </a>
                    <div class="mb-3 flex items-center">
                        <svg class="me-0 md:me-1 md:h-4 w-4 text-yellow-300" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="me-0 md:me-1 h-4 w-4 text-yellow-300" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="me-0 md:me-1 h-4 w-4 text-yellow-300" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="me-0 md:me-1 h-4 w-4 text-yellow-300" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <svg class="me-0 md:me-1 h-4 w-4 text-gray-300 dark:text-gray-500" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path
                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                        </svg>
                        <p class="ms-1 text-xs md:text-sm font-medium text-gray-500 dark:text-gray-400">
                            4.95
                        </p>
                        <p class="ms-1  text-xs md:text-sm font-medium text-gray-500 dark:text-gray-400">
                            dari
                        </p>
                        <p class="ms-1  text-xs md:text-sm font-medium text-gray-500 dark:text-gray-400">
                            5
                        </p>
                    </div>
                    <div class="flex flex-col items-center md:flex-row md:justify-between">
                        <p class="items-center mb-3 text-xm md:text-lg font-semibold text-[#0D5568] dark:text-gray-400">
                            Rp.
                            {{ number_format($merchandise->price, 0, ',', '.') }}
                        </p>
                        <a href="{{ route('merchandise.show', $merchandise->slug) }}"
                            class="inline-flex w-full md:w-[35%] items-center justify-center rounded-lg bg-[#0D5568] px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Beli
                        </a>
                    </div>
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
