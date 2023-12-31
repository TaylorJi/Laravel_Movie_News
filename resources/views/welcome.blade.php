<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <title>Laravel</title>

    <style>
        body {
            font-family: 'figtree', sans-serif;
        }

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

        .register-btn {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            background-color: green;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .login-btn {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            background-color: blue;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
    </style>
</head>

<body>
    <div style="margin: 80px; border: 3px solid #000000; padding: 20px; display: inline-block;">
        <x-slot>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Articles') }}
            </h2>
        </x-slot>
        <div
            class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center dark:bg-dots-lighter">
            @if (Route::has('login'))
                <div class="fixed top-0 right-0 sm:static sm:p-6 text-right">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-secondary">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn login-btn" style=".reg">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn register-btn">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

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
    </div>

</html>
