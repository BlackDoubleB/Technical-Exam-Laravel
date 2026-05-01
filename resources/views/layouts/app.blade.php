<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    @endif
</head>

<body>
    <nav class="bg-neutral-950 fixed w-full z-20 top-0 start-0 border-b border-default">
        <div class=" max-w-screen-xl flex flex-wrap items-center justify-center mx-auto p-4">
           
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-body rounded-base md:hidden hover:bg-neutral-secondary-soft hover:text-heading focus:outline-none focus:ring-2 focus:ring-neutral-tertiary"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14" />
                </svg>
            </button>
            <div class=" hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="text-white font-bold">
                    <li>
                        <a href="{{ route('books.index') }}"
                            aria-current="page">Home</a>
                    </li> 
                    
                </ul>
            </div>
        </div>
    </nav>

    <main class="pt-20 sm:pt-24  flex flex-col items-center">
        <div class="w-full sm:w-4/5 lg:w-3/5">
            @yield('main')
        </div>
    </main>

    <footer></footer>

</body>
</html>