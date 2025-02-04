<div class="">
    <nav class="bg-transparent bg-gradient-to-b from-gray-700 to-transparent top-0 inset-x-0 z-50 fixed transition-all duration-200 ease-in-out"
        id="navbar">
        <div class="bg-transparent max-w-screen-xl flex flex-wrap items-center justify-between mx-auto px-4 h-16"
            id="navbar-content">
            <div class="flex flex-wrap items-center">
                <button data-collapse-toggle="navbar-hamburger" type="button"
                    class="hidden w-fit aspect-square items-center justify-center text-sm text-white focus:outline-none md:block"
                    aria-controls="navbar-hamburger-mobile" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <button data-collapse-toggle="navbar-hamburger-mobile" type="button"
                    class="inline-flex w-fit aspect-square items-center justify-center text-sm text-white focus:outline-none md:hidden"
                    aria-controls="navbar-hamburger-mobile" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="flex flex-row items-center p-1 md:p-0">
                    <a href="{{ route('home') }}" class="ml-4 flex items-center space-x-3 rtl:space-x-reverse">
                        <a href="{{ route('home') }}" class="ml-4 flex items-center space-x-3 rtl:space-x-reverse">
                            <img src="/images/upn-blu-navbar-logo.png" class="h-10" alt="UPN BLU Logo" />
                        </a>
                        <a href="#" class="ml-2 flex items-center space-x-3 rtl:space-x-reverse">
                            <img src="/images/isr-navbar-logo.png" class="h-10" alt="ISR Logo" />
                        </a>
                        <a href="#" class="ml-2 flex items-center space-x-3 rtl:space-x-reverse">
                            <img src="/images/isr-navbar-logo2.png" class="h-10" alt="ISR Logo2" />
                        </a>
                </div>
            </div>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <div
                    class="mt-4 flex flex-col items-center rounded-lg border border-gray-100 p-4 font-medium md:mt-0 md:flex-row md:space-x-8 md:border-0 md:p-0 rtl:space-x-reverse">
                    @foreach ($this->organizationals as $organizational)
                        @if ($organizational->slug === 'contact')
                            @foreach ($organizational->content as $item)
                                @if ($item['type'] === 'sosmed')
                                    @if ($item['data']['sosmed'] === 'instagram')
                                        <div>
                                            <a href="{{ $item['data']['url'] }}" class="block px-0" aria-current="page">
                                                <img src="/images/instagram.svg" class="h-5" alt="ISR instagram" />
                                            </a>
                                        </div>
                                    @endif
                                    @if ($item['data']['sosmed'] === 'twitter')
                                        <div>
                                            <a href="{{ $item['data']['url'] }}" class="block px-0" aria-current="page">
                                                <img src="/images/x.svg" class="h-5" alt="ISR twitter" />
                                            </a>
                                        </div>
                                    @endif
                                    @if ($item['data']['sosmed'] === 'youtube')
                                        <div>
                                            <a href="{{ $item['data']['url'] }}" class="block px-0" aria-current="page">
                                                <img src="/images/youtube.svg" class="h-5" alt="ISR youtube" />
                                            </a>
                                        </div>
                                    @endif
                                    @if ($item['data']['sosmed'] === 'tiktok')
                                        <div>
                                            <a href="{{ $item['data']['url'] }}" class="block px-0" aria-current="page">
                                                <img src="/images/tiktok.svg" class="h-5" alt="ISR tiktok" />
                                            </a>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    {{-- <div>
                        <a href="#" class="ml-10 block" aria-current="page">
                            <img src="/images/search.svg" class="h-5" alt="Search" />
                        </a>
                    </div> --}}
                </div>
                {{-- @auth
                    @include('layouts.partials.header-right-auth')
                @else
                    @include('layouts.partials.header-right-guest')
                @endauth --}}
            </div>
        </div>
    </nav>

    <div class="hidden md:flex">
        <x-navbar-large />
    </div>
    <div class="flex md:hidden">
        <x-navbar-mobile />
    </div>
</div>
</div>

<script>
    // Background Color Navbar
    window.addEventListener('scroll', function() {
        var navbar = document.getElementById('navbar');
        var navbarContent = document.getElementById('navbar-content');
        if (window.scrollY > 0) {
            navbar.classList.remove.apply(navbar.classList, [
                'bg-transparent',
                'bg-gradient-to-b',
                'from-gray-700',
                'to-transparent',
            ]);
            navbar.classList.add.apply(navbar.classList, [
                'bg-[#0D5568]',
                'shadow-md',
                'border-b',
                'border-b-[#F5D05E]',
            ]);
        } else {
            navbar.classList.remove.apply(navbar.classList, [
                'bg-[#0D5568]',
                'shadow-md',
                'border-b',
                'border-b-[#F5D05E]',
            ]);
            navbar.classList.add.apply(navbar.classList, ['bg-transparent', 'bg-gradient-to-b',
                'from-gray-700'
            ]);
        }
    });

    // Hamburger Menu Navbar
    document.addEventListener('DOMContentLoaded', function() {
        var hamburgerButton = document.querySelector(
            '[data-collapse-toggle="navbar-hamburger"]',
        );
        var navbarHamburger = document.getElementById('navbar-hamburger');
        var hamburgerButtonMobile = document.querySelector('[data-collapse-toggle="navbar-hamburger-mobile"]');
        var navbarHamburgerMobile = document.getElementById('navbar-hamburger-mobile');

        hamburgerButton.addEventListener('click', function() {
            var expanded =
                hamburgerButton.getAttribute('aria-expanded') === 'true' ||
                false;
            hamburgerButton.setAttribute('aria-expanded', !expanded);
            navbarHamburger.classList.toggle('flex');
        });

        hamburgerButtonMobile.addEventListener('click', function() {
            var expanded =
                hamburgerButtonMobile.getAttribute('aria-expanded') === 'true' ||
                false;
            hamburgerButtonMobile.setAttribute('aria-expanded', !expanded);
            navbarHamburgerMobile.classList.toggle('flex');
        });

        const menus = document.querySelectorAll('[data-menu]');
        var menuParentState = null;
        var subMenuParentState = null;
        menus.forEach(menu => {

            menu.addEventListener('mouseenter', () => {
                const isChild = menu.getAttribute('data-menu-target')
                const isSubmenu = menu.getAttribute('data-submenu')

                console.log(isChild);

                if (!isChild) {
                    if (menuParentState && !isSubmenu) {
                        const subMenu = document.querySelector(
                            `[data-menu-target^="${menuParentState}"]`);
                        subMenu.classList.remove('flex');
                        subMenu.classList.add('hidden');
                        menuParentState = null;

                        if (subMenuParentState) {
                            const subMenu = document.querySelector(
                                `[data-menu-target^="${subMenuParentState}"]`);
                            subMenu.classList.remove('flex');
                            subMenu.classList.add('hidden');
                            subMenuParentState = null;
                        }
                    }

                    if (subMenuParentState && isSubmenu) {
                        const subMenu = document.querySelector(
                            `[data-menu-target^="${subMenuParentState}"]`);
                        subMenu.classList.remove('flex');
                        subMenu.classList.add('hidden');
                        subMenuParentState = null;
                    }
                }

                if (!isChild) {
                    if (!menuParentState && !isSubmenu) {
                        const subMenu = document.querySelector(
                            `[data-menu-target^="${menu.id}"]`);
                        subMenu.classList.remove('hidden');
                        subMenu.classList.add('flex');
                        menuParentState = menu.id;
                    }

                    if (!subMenuParentState && isSubmenu) {
                        const subMenu = document.querySelector(
                            `[data-menu-target^="${menu.id}"]`);
                        subMenu.classList.remove('hidden');
                        subMenu.classList.add('flex');
                        subMenuParentState = menu.id;
                    }
                }

            });

            menu.addEventListener('mouseleave', () => {

                if (menuParentState) {
                    if (subMenuParentState) {
                        if (menu.getAttribute('data-menu-target') === subMenuParentState) {
                            menu.classList.remove('flex');
                            menu.classList.add('hidden');
                            subMenuParentState = null;
                        }
                    } else {
                        if (menu.getAttribute('data-menu-target') === menuParentState) {
                            menu.classList.remove('flex');
                            menu.classList.add('hidden');
                            menuParentState = null;
                        }
                    }
                }
            });
        });

        menus.forEach(menu => {
            menu.addEventListener('click', () => {
                const isChild = menu.getAttribute('data-menu-target')
                const isSubmenu = menu.getAttribute('data-submenu')

                console.log(isChild);

                // dijalankan awal
                if (!isChild) {
                    // submenu
                    if (!isSubmenu) {
                        if (menuParentState && menuParentState !== menu.id) {
                            const subMenu = document.querySelector(
                                `[data-menu-target^="${menuParentState}"]`);
                            subMenu.classList.add('hidden');
                            subMenu.classList.remove('flex');
                            menuParentState = null;
                        }

                        if (menuParentState === menu.id) {
                            const subMenu = document.querySelector(
                                `[data-menu-target^="${menu.id}"]`);
                            subMenu.classList.add('hidden');
                            subMenu.classList.remove('flex');
                            menuParentState = null;
                        } else {
                            const subMenu = document.querySelector(
                                `[data-menu-target^="${menu.id}"]`);
                            subMenu.classList.remove('hidden');
                            subMenu.classList.add('flex');
                            menuParentState = menu.id;
                        }

                        if (subMenuParentState) {
                            const subMenu = document.querySelector(
                                `[data-menu-target^="${subMenuParentState}"]`);
                            subMenu.classList.add('hidden');
                            subMenu.classList.remove('flex');
                            subMenuParentState = null;
                        }
                    }

                    // sub-submenu
                    if (isSubmenu) {
                        const subMenu = document.querySelector(
                            `[data-menu-target^="${menu.id}"]`);
                        subMenu.classList.toggle('hidden');
                        subMenu.classList.toggle('flex');
                        subMenuParentState = menu.id;
                    }
                }

            });
        });
    });
</script>
