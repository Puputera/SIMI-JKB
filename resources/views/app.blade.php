<html>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        @vite('resources/css/app.css')
        <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
    </head>

    <body class="bg-gray-100">
        <div class="flex min-h-screen flex-col">
            <header>
                @include('layouts.navbar')
            </header>

            <div class="flex flex-1 pt-16">
                @include('layouts.sidebar')

                <main class="ml-64 min-h-screen flex-1 bg-gray-100 p-4">
                    <div class="container mx-auto mt-4">
                        <div class="rounded-2xl bg-white p-6 shadow-xl">
                            @yield('content')
                        </div>
                    </div>
                </main>
            </div>

            <footer>
                {{-- @include('layouts.footer') --}}
            </footer>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    </body>

</html>
