<div
    x-data="{
        query: '{{ request("search", "") }}',
    }"
    x-on:keyup.enter.window="
        $dispatch('search', {
            search: query,
        })
    "
    id="search-box"
>
    <div>
        {{-- <h3 class="mb-3 text-sm font-semibold text-gray-900">Search</h3> --}}
        <div
            class="mb-3 flex w-full items-center rounded-lg bg-gray-100 px-3 py-2"
        >
            <span>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="h-6 w-6 text-gray-500"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"
                    />
                </svg>
            </span>
            <input
                x-model="query"
                class="ml-1 w-40 border-none bg-transparent text-xs text-gray-800 outline-none placeholder:text-gray-400 focus:border-none focus:outline-none focus:ring-0"
                type="text"
                placeholder="search"
            />
        </div>
    </div>
</div>
