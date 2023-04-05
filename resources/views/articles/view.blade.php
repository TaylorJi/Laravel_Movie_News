<x-app-layout>
    <div style="margin: 20px">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Articles') }}
            </h2>
        </x-slot>

        <style>
            .article-title {
                font-weight: bold;
                font-size: 18px;
                margin-bottom: 50px;
                margin-left: 50px;
            }

            .title {
                color: blue;
                font-size: 24px;
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
                width: 25%;
                height: auto;
            }

            .article-content {
                display: block;
                overflow: hidden;
            }

            .article-description {
                float: right;
                width: 75%;
                height: 100%;
            }
        </style>

        <h1 class="title">Newsletter #{{ $articles[0]->newsletter_id }} - {{ $articles[0]->updated_at }}</h1>

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
            @unless ($loop->last)
                <div class="row-divider"></div>
            @endunless
        @endforeach
    </div>
</x-app-layout>
