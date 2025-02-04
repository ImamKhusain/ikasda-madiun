<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>
            @yield("title")
            @unless (empty(trim($__env->yieldContent("title"))))
            -
            @endunless
            {{ config("app.name", "Laravel") }}
        </title>
        <meta
            name="description"
            content="@yield("meta_description", "Site description")"
        />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap"
            rel="stylesheet"
        />

        <!-- Scripts -->
        @vite(["resources/css/app.css", "resources/js/app.js"])

        <!-- Styles -->
        @livewireStyles
    </head>

    <body class="font-default antialiased">
        <!-- Navbar & Header -->
        @include("layouts.partials.header")

        <!-- Page Content -->
        <main>
            @yield("content")
        </main>

        <!-- Footer -->
        @include("layouts.partials.footer")

        @livewireScripts
    </body>
</html>
