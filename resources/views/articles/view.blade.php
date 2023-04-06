<x-app-layout>
    <div style="display: flex; justify-content: flex-end; width: 100%;">
        <a href="{{ route('news.index') }}" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded"
            style="background-color:lightblue">
            Back
        </a>
    </div>
    <div style="margin: 80px; border: 3px solid #000000; padding: 20px; display: inline-block;">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Articles') }}
            </h2>
        </x-slot>

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
</x-app-layout>
