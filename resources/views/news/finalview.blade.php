<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News') }}
        </h2>
    </x-slot>

    {{-- <table class="table-auto w-full">
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
        <tbody> --}}
    @php
        $counter = 0;
    @endphp

    @foreach ($news as $item)
        @if ($item->is_active == 1)
            @if ($counter < 5)
                <div class="bg-gray-100">
                    <div class="container mx-auto py-8">
                        <div class="max-w-lg mx-auto bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="sm:flex sm:items-center px-6 py-4">
                                <img class="block mx-auto sm:mx-0 sm:flex-shrink-0 h-24 sm:h-16 rounded-full"
                                    src="https://99designs-blog.imgix.net/blog/wp-content/uploads/2022/05/Screen-Shot-2022-05-23-at-12.45.30-PM-e1659040331310.png?auto=format&q=60&fit=max&w=930"
                                    alt="Newsletter logo">
                                <div class="text-center sm:text-left sm:ml-4 sm:my-2">
                                    <h1 class="text-xl font-bold leading-tight">Our Newsletter #{{ $item->id }}</h1>
                                    <p class="text-gray-600 text-sm">Get the latest news and updates from our company.
                                    </p>
                                </div>
                            </div>
                            <div class="px-6 py-4">
                                <h2 class="text-lg font-bold mb-4">Recent News</h2>
                                <ul>
                                    <li class="mb-4">
                                        <div class="flex items-center">
                                            <img src="{{ $item->picUrl }}" class="w-12 h-20 object-cover rounded" alt="{{ $item->title }}">
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
                </div>
            @endif
            @php
                $counter++;
            @endphp
        @endif
    @endforeach
    {{-- </tbody> --}}
    {{-- </table> --}}

</x-app-layout>
