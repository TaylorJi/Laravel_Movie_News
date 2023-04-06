<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <style>
        .article-title {
            font-weight: bold;
            font-size: 22px;
            margin-bottom: 50px;
            margin-left: 100px;
        }

        .title {
            color: blue;
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
        }

        .table {
            border-collapse: separate;
            width: 100%;
            margin-bottom: 20px;
            background-color: transparent;
            border-spacing: 0;
            margin-left: 20px;

        }

        .table td {
            border: none;
            padding: 0;
            text-align: left;
            vertical-align: top;
        }

        .table .row-divider {
            border-top: 1px solid #ddd;
            margin-top: 20px;
            padding-top: 20px;
        }

        .article-image {
            display: block;
            float: left;
            width: 300px;
            height: 400px;
            margin-left: 100px;
        }

        .article-content {
            display: block;
            overflow: hidden;
        }

        .article-description {
            float: right;
            width: 500px%;
            height: 400px%;
            margin-left: 100px;
            margin-right: 50px;
            font-size: 18px;
            white-space: pre-line;
            overflow-wrap: break-word;
            word-wrap: break-word;
            word-break: break-word;
            line-height: 1.5;
            max-height: calc(1.5em * 100);
        }

        .article-logo {
            display: block;
            margin: 0 auto;
            width: 100px;
            height: 100px;
        }
    </style>
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

    {{-- @php
        $counter = 0;
    @endphp --}}

    {{-- @foreach ($news as $item) --}}
    {{-- @if ($item->is_active == 1) --}}
    {{-- @if ($counter < 5) --}}
    @if ($articles->isNotEmpty())
        <img src="{{ $news[0]->logoUrl }}" class="article-logo" alt="{{ $articles[0]->title }}">
        <h1 class="title">
            {{ __('Newsletter #:number - :date', ['number' => $articles[0]->newsletter_id, 'date' => $articles[0]->updated_at->format('M d, Y')]) }}
        </h1>

        @foreach ($articles as $item)
            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <div class="article-title">{{ $item->id }}. {{ $item->title }}</div>
                            @if ($item->picUrl)
                                <img src="{{ $item->picUrl }}" alt="{{ $item->title }}" class="article-image">
                            @endif
                            <div class="article-content">
                                <div class="article-description">{!! $item->description !!}</div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        @endforeach
    @else
        <table class="table">
            <tbody>
                <tr>
                    <td>
                        No Articles, create one first
                    </td>
                </tr>
            </tbody>
        </table>
    @endif
    {{-- @unless ($loop->last)
        <div class="row-divider"></div>
    @endunless --}}
    {{-- @endif --}}
    {{-- @php
                $counter++;
            @endphp --}}
    {{-- @endif --}}
    {{-- @endforeach --}}
    {{-- </tbody> --}}
    {{-- </table> --}}
</body>

</html>
