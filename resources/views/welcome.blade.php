<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.4.3/css/bootstrap.min.css"
        integrity="sha512-Zd9PhF5V7h4BnKQ7VklLox6Zn7P5Y5P5b7Vd9l9yf5VlvBNKjpuZ7aUoGzw3Zq3jKk6UcRH6dkR9nFQMr1T12Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.4.3/js/bootstrap.bundle.min.js"
        integrity="sha512-i2I1DkXzjKto55TavTfrCPlTbZ46UbI1dSwW1YbGn0tdFCz9vE3f3WpZB0f/fJc1xGx8ZwWnMCr31rJtSE9IZQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="antialiased bg-gray-100 dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center dark:bg-dots-lighter">
        @if (Route::has('login'))
            <div class="fixed top-0 right-0 sm:static sm:p-6 text-right">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

    @php
        $counter = 0;
    @endphp

    @foreach ($news as $item)
        @if ($item->is_active == 1)
            @if ($counter < 5)
                <div class="container py-5">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ $item->picUrl }}" class="w-12 h-20 object-cover rounded"
                                    alt="{{ $item->title }}">
                                <div class="ml-4">
                                    <a href="#" class="text-blue-600 hover:underline">{{ $item->title }}</a>
                                    <p class="text-gray-700 text-sm">{{ $item->description }}</p>
                                </div>
                            </div>
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            @php
                $counter++;
            @endphp
        @endif
    @endforeach
    {{-- </tbody> --}}
    {{-- </table> --}}
</body>

</html>
