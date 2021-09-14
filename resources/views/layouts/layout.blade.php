<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>


</head>
    <body>

    <header>
        <a href="{{ url('/') }}" class="ml-4 text-sm text-gray-700 underline">Callboard</a>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/logout') }}" class="text-sm text-gray-700 underline">Logout</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        </div>

    </header>


    @yield('menu')


            @yield('main')
        <main>

        </main>

        <footer>
            @yield('form')
        </footer>
    </body>
</html>
