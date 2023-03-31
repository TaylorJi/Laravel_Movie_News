{{-- @extends('layouts.master')

@section('title', 'News List') --}}
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News') }}
        </h2>
    </x-slot>

    
    <div class="flex justify-between items-center">
        <h2 class="text-lg font-medium">Newsletters List</h2>
        <div class="flex space-x-2">
            <a href="{{ route('news.create') }}" class="text-white px-4 py-2 rounded-md transition" style="background-color: rgb(11, 234, 26)">Create News</a>
            {{-- <a href="{{ route('news.article') }}" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition">Article</a> --}}
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="bg-green-100 text-green-900 px-4 py-3 rounded-md my-4">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Description</th>
                <th class="px-4 py-2">image</th>
                <th class="px-4 py-2">Active</th>
                <th class="px-4 py-2">Created Date</th>
                <th class="px-4 py-2">Last Updated Date</th>
                <th class="px-4 py-2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $item)
                <tr>
                    <td class="border px-4 py-2">{{ $item->id }}</td>
                    <td class="border px-4 py-2">{{ $item->title }}</td>
                    <td class="border px-4 py-2">{!! $item->description !!}</td>
                    <td class="border px-4 py-2"><img src="{{ $item->picUrl }}" class="w-12 h-30 object-cover rounded" alt="{{ $item->title }}"></td>
                    <td class="border px-4 py-2">{{ $item->is_active }}</td>
                    <td class="border px-4 py-2">{{ $item->created_at }}</td>
                    <td class="border px-4 py-2">{{ $item->updated_at }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('news.show', $item->id) }}" class="text-white px-2 py-1 rounded-md transition" style="background-color: rgb(75, 75, 237)">Generate</a>
                        <a href="{{ route('news.edit', $item->id) }}" class="text-white px-2 py-1 rounded-md transition" style="background-color: green">Edit</a>
                        <a href="{{ route('news.destroy', $item->id) }}" class="text-white px-2 py-1 rounded-md transition" style="background-color: red">Del</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</x-app-layout>