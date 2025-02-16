<div class="flex flex-col w-full mx-auto">
    <div class="flex flex-col w-full">
        <div class="relative w-full top-10">
            <img src="/images/berita-ikasda.png" alt="artikel" class="h-full w-full object-contain">
        </div>
    </div>

    {{-- Berita Terkini Start --}}
    <section class="bg-white p-10">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- Kolom Kiri: BERITA TERKINI -->
                <div class="col-span-2 bg-white shadow p-4">
                    <h2 class="text-xl font-bold border-b pb-2 mb-4">BERITA TERKINI</h2>

                    <!-- Grid Berita Terkini -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">
                        <!-- Card Berita -->
                        @foreach ($posts as $item)
                            <a
                                href="{{ route('posts.show', ['category' => $item->categories->slug, 'post' => $item->slug]) }}">
                                <div class="bg-gray-50 shadow-sm rounded overflow-hidden">
                                    <img src="{{ $item->getFirstMediaUrl() }}" alt="Thumbnail Berita"
                                        class="w-full h-40 object-cover">
                                    <div class="p-3">
                                        <h3 class="text-sm font-semibold mb-1">{{ $item->title }}</h3>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="mt-4 text-center">
                        <a href="#"
                            class="inline-block w-full bg-primary text-white font-semibold px-4 py-2 rounded hover:bg-yellow-500 transition">
                            LIHAT LAINNYA
                        </a>
                    </div>
                </div>

                <!-- Kolom Kanan: BERITA POPULER -->
                <div class="bg-white shadow p-4">
                    <h2 class="text-xl font-bold border-b pb-2 mb-4">BERITA POPULER</h2>

                    <!-- Daftar Berita Populer -->
                    <div class="space-y-4">
                        @foreach ($posts as $item)
                            <a
                                href="{{ route('posts.show', ['category' => $item->categories->slug, 'post' => $item->slug]) }}">
                                <div class="flex items-center space-x-3">
                                    <img src="{{ $item->getFirstMediaUrl() }}" alt="Thumbnail Populer"
                                        class="w-16 h-16 object-cover rounded">
                                    <div>
                                        <h3 class="text-sm font-semibold">{{ $item->title }}</h3>
                                        <p class="text-xs text-gray-500">{!! \Carbon\Carbon::parse($item->published_at)->format('d F Y') !!}</p>
                                        <a href="{{ route('posts.show', ['category' => $item->categories->slug, 'post' => $item->slug]) }}"
                                            class="text-xs text-blue-600 font-semibold hover:underline">
                                            Baca selengkapnya
                                        </a>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <!-- Tombol Lihat Berita Lainnya -->
                    <div class="mt-4 text-left border-t-2 border-t-primary py-3">
                        <a href="#"
                            class="w-full text-black font-semibold px-4 py-2 rounded transition flex justify-between">
                            <p class="text-base">LIHAT LEBIH BANYAK</p>
                            <img src="/images/black-arrow.svg" alt="arrow" class="w-4 lg:w-5 aspect-square" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Berita Terkini End --}}

    {{-- Category Start --}}
    <section class="bg-white">
        <div class="max-w-7xl mx-auto px-4 py-8">
            <!-- Bagian KATEGORI -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="col-span-2 bg-white shadow rounded p-4 mb-8">
                    <h2 class="text-xl font-bold border-b pb-2 mb-4">KATEGORI</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <div class="flex items-center justify-center rounded-lg shadow bg-slate-400 overflow-hidden">
                            <div class="p-3 lg:p-5 relative flex flex-col items-center rounded-lg w-full gap-2 lg:gap-3 bg-cover bg-center"
                                style="background-image: url('/images/sub-category/isr-journey.png');">
                                <div
                                    class="flex items-center justify-center border border-[#FFDF4E] gap-1 lg:gap-2 px-2 py-1 rounded-lg lg:rounded-2xl">
                                    <img src="/images/sub-category/category-icon.svg" alt="cat icon"
                                        class="w-4 lg:w-6 aspect-square">
                                    <a wire:key="#" href="{{ route('posts.detail', ['category' => 'ikasda-event']) }}"
                                        class="text-center text-xs md:text-sm font-normal lg:font-bold text-[#FFDF4E]">
                                        IKASDA EVENT
                                    </a>
                                </div>
                                <p class="font-medium text-xs md:text-sm text-justify text-white">
                                    Liputan dan berita tentang program event yang telah diselenggarakan Ikasda Madiun
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center justify-center rounded-lg shadow bg-slate-400 overflow-hidden">
                            <div class="p-3 lg:p-5 relative flex flex-col items-center rounded-lg w-full gap-2 lg:gap-3 bg-cover bg-center"
                                style="background-image: url('/images/sub-category/opini-refleksi.png');">
                                <div
                                    class="flex items-center justify-center border border-[#FFDF4E] gap-1 lg:gap-2 px-2 py-1 rounded-lg lg:rounded-2xl">
                                    <img src="/images/sub-category/category-icon.svg" alt="cat icon"
                                        class="w-4 lg:w-6 aspect-square">
                                    <a wire:key="#" href="{{ route('posts.detail', ['category' => 'ikasda-karir']) }}"
                                        class="text-center text-xs md:text-sm font-normal lg:font-bold text-[#FFDF4E]">
                                        IKASDA KARIR
                                    </a>
                                </div>
                                <p class="font-medium text-xs md:text-sm text-justify text-white">
                                    Memberitahu tentang lowongan pekerjaan
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center justify-center rounded-lg shadow bg-slate-400 overflow-hidden">
                            <div class="p-3 lg:p-5 relative flex flex-col items-center rounded-lg w-full gap-2 lg:gap-3 bg-cover bg-center"
                                style="background-image: url('/images/sub-category/tips-trick.png');">
                                <div
                                    class="flex items-center justify-center border border-[#FFDF4E] gap-1 lg:gap-2 px-2 py-1 rounded-lg lg:rounded-2xl">
                                    <img src="/images/sub-category/category-icon.svg" alt="cat icon"
                                        class="w-4 lg:w-6 aspect-square">
                                    <a wire:key="#" href="{{ route('posts.detail', ['category' => 'teras-kopi']) }}"
                                        class="text-center text-xs md:text-sm font-normal lg:font-bold text-[#FFDF4E]">
                                        TERAS KOPI
                                    </a>
                                </div>
                                <p class="font-medium text-xs md:text-sm text-justify text-white">
                                    Berisi informasi untuk acara kumpul bersama tiap-tiap angkatan Ikasda Madiun
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center justify-center rounded-lg shadow bg-slate-400 overflow-hidden">
                            <div class="p-3 lg:p-5 relative flex flex-col items-center rounded-lg w-full gap-2 lg:gap-3 bg-cover bg-center"
                                style="background-image: url('/images/sub-category/prestasi-isr.png');">
                                <div
                                    class="flex items-center justify-center border border-[#FFDF4E] gap-1 lg:gap-2 px-2 py-1 rounded-lg lg:rounded-2xl">
                                    <img src="/images/sub-category/category-icon.svg" alt="cat icon"
                                        class="w-4 lg:w-6 aspect-square">
                                    <a wire:key="#"
                                        href="{{ route('posts.detail', ['category' => 'ikasda-bangga']) }}"
                                        class="text-center text-xs md:text-sm font-normal lg:font-bold text-[#FFDF4E]">
                                        IKASDA BANGGA
                                    </a>
                                </div>
                                <p class="font-medium text-xs md:text-sm text-justify text-white">
                                    Berita tentang berbagai karir alumni Smada Madiun
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="col-span-2 bg-white shadow rounded p-4">
                    <!-- Tabs (judul kategori) -->
                    <div class="flex space-x-4 border-b pb-2 mb-4">
                        <!-- Tab Aktif -->
                        <button class="px-3 py-2 text-sm font-semibold text-gray-700 border-b-2 border-yellow-400">
                            IKASDA EVENT
                        </button>
                        <!-- Tab Lain -->
                        <button class="px-3 py-2 text-sm font-semibold text-gray-500 hover:text-gray-700">
                            IKASDA KARIR
                        </button>
                        <button class="px-3 py-2 text-sm font-semibold text-gray-500 hover:text-gray-700">
                            IKASDA KOPI
                        </button>
                        <button class="px-3 py-2 text-sm font-semibold text-gray-500 hover:text-gray-700">
                            IKASDA BANGGA
                        </button>
                    </div>

                    <!-- Daftar Berita -->
                    <div class="space-y-4">
                        <!-- Berita 1 -->
                        <div class="flex items-center space-x-4">
                            <img src="https://via.placeholder.com/150x100" alt="Madiun Running Fest"
                                class="w-24 h-16 object-cover rounded">
                            <div>
                                <h3 class="font-semibold text-gray-700">
                                    Madiun Running Fest Present By : Ikasda Madiun
                                </h3>
                                <p class="text-sm text-gray-500">September 29, 2024</p>
                            </div>
                        </div>
                        <!-- Berita 2 -->
                        <div class="flex items-center space-x-4">
                            <img src="https://via.placeholder.com/150x100" alt="Madiun Night Cycling"
                                class="w-24 h-16 object-cover rounded">
                            <div>
                                <h3 class="font-semibold text-gray-700">
                                    Madiun Night Cycling Bersama Walikota & Ikatan Alumni SMADA Madiun
                                </h3>
                                <p class="text-sm text-gray-500">July 1, 2023</p>
                            </div>
                        </div>
                        <!-- Berita 3 -->
                        <div class="flex items-center space-x-4">
                            <img src="https://via.placeholder.com/150x100" alt="Pelantikan Pengurus Ikasda"
                                class="w-24 h-16 object-cover rounded">
                            <div>
                                <h3 class="font-semibold text-gray-700">
                                    Pelantikan Pengurus Ikasda Periode 2023-2026
                                </h3>
                                <p class="text-sm text-gray-500">Mei 10, 2023</p>
                            </div>
                        </div>
                        <!-- Berita 4 -->
                        <div class="flex items-center space-x-4">
                            <img src="https://via.placeholder.com/150x100" alt="Ikasda Sunat Massal"
                                class="w-24 h-16 object-cover rounded">
                            <div>
                                <h3 class="font-semibold text-gray-700">
                                    Ikasda Sunat Massal Tahun 2024
                                </h3>
                                <p class="text-sm text-gray-500">Juni 15, 2024</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 text-center">
                        <a href="#"
                            class="inline-block w-full bg-primary text-white font-semibold px-4 py-2 rounded hover:bg-yellow-500 transition">
                            LIHAT LAINNYA
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Category End --}}
</div>
