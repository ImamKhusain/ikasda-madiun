@props(['menu', 'category' => null, 'post' => null])

<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="/"
                class="inline-flex items-center text-xs md:text-sm font-medium text-gray-700 hover:text-[#F5D05E] dark:text-gray-400 dark:hover:text-white">
                <svg class="me-2.5 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                </svg>
                Home
            </a>
        </li>
        @if ($menu === 'pojok-ilmiah' || $menu === 'prestasi')
            <li>
                <div class="flex items-center">
                    <svg class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="/{{ $menu }}"
                        class="ms-1 text-xs md:text-sm font-medium text-gray-700 hover:text-[#F5D05E] dark:text-gray-400 dark:hover:text-white md:ms-2">
                        {{ ucwords(str_replace('-', ' ', $menu)) }}
                    </a>
                </div>
            </li>
        @else
            <li>
                <div class="flex items-center">
                    <svg class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ms-1 text-xs md:text-sm font-medium text-gray-700 dark:text-gray-400 md:ms-2">
                        {{ ucwords(str_replace('-', ' ', $menu)) }}
                    </span>
                </div>
            </li>
        @endif
        @if ($category)
            <li>
                <div class="flex items-center">
                    <svg class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="{{ url('/' . $menu . '/' . $category->slug) }}"
                        class="ms-1 text-xs md:text-sm font-medium text-gray-700 hover:text-[#F5D05E] dark:text-gray-400 dark:hover:text-white md:ms-2">
                        {{ $category->name }}
                    </a>
                </div>
            </li>
        @endif
        @if ($post)
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="mx-1 h-3 w-3 text-gray-400 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="ms-1 text-xs md:text-sm font-medium text-gray-500 dark:text-gray-400 md:ms-2">
                        {{ Illuminate\Support\Str::limit(strip_tags($post->title), 20) }}
                    </span>
                </div>
            </li>
        @endif
    </ol>
</nav>
