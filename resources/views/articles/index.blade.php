{{-- @extends('layouts.master')

@section('title', 'News List') --}}
<x-app-layout>
    <div style="margin: 20px">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Articles') }}
            </h2>
        </x-slot>

        @if ($message = Session::get('success'))
            <div class="border text-green-900 px-4 py-3 rounded-md my-4" style="background-color: #D1FAE5;">
                <p>{{ $message }}</p>
            </div>
        @endif
        <form action="{{ route('search') }}" method="get">
            <input type="text" name="search" placeholder="Search...">
            <button type="submit">Search</button>
        </form>

        <div class="flex justify-between items-center">
            <h2 class="text-lg font-medium">Articles List</h2>
            <div class="flex space-x-2">
                <a href="{{ route('articles.create', ['newsletter_id' => $newsletter_id]) }}"
                    class="text-white px-4 py-2 rounded-md transition" style="background-color: rgb(11, 234, 26)">Create
                    an
                    Article</a>
            </div>
        </div>
      


        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">image</th>
                    <th class="px-4 py-2">Created Date</th>
                    <th class="px-4 py-2">Last Updated Date</th>
                    <th class="px-4 py-2">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @if ($articles->isNotEmpty())
                    @foreach ($articles as $item)
                        <tr>
                            <td class="border px-4 py-2">{{ $item->id }}</td>
                            <td class="border px-4 py-2">{{ $item->title }}</td>
                            <td class="border px-4 py-2">{!! $item->description !!}</td>
                            <td class="border px-4 py-2"><img src="{{ $item->picUrl }}"
                                    class="w-12 h-30 object-cover rounded" alt="{{ $item->title }}"></td>
                            <td class="border px-4 py-2">{{ $item->created_at }}</td>
                            <td class="border px-4 py-2">{{ $item->updated_at }}</td>
                            <td class="border px-4 py-2">
                                {{-- <a href="{{ route('news.show', $item->id) }}" class="text-white px-2 py-1 rounded-md transition" style="background-color: rgb(75, 75, 237)">Generate</a> --}}
                                <a href="{{ route('articles.edit', $item->id) }}"
                                    class="text-white px-2 py-1 rounded-md transition"
                                    style="background-color: green">Edit</a>
                                <a href="{{ route('articles.destroy', ['id' => $item->id, 'newsletter_id' => $item->newsletter_id]) }}"
                                    class="text-white px-2 py-1 rounded-md transition"
                                    style="background-color: red">Del</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="border px-4 py-2 text-center text-gray-500">No articles available</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>
