<x-app-layout>
    <h1>Search Results</h1>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Description</th>
                <th class="px-4 py-2">Created Date</th>
                <th class="px-4 py-2">Last Updated Date</th>
                <th class="px-4 py-2">Type</th>

                <th class="px-4 py-2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @if ($results->count() > 0)
                <ul>
                    @foreach ($results as $result)
                        <tr style="text-align: center">
                            <td class="border px-4 py-2">{{ $result->id }}</td>
                            <td class="border px-4 py-2">{{ $result->title }}</td>
                            <td class="border px-4 py-2">{!! $result->description !!}</td>
                            <td class="border px-4 py-2">{{ $result->created_at }}</td>
                            <td class="border px-4 py-2">{{ $result->updated_at }}</td>
                            <td class="border px-4 py-2">
                                @if (empty($result->description))
                                    {{-- This is a News object --}}
                                    <p>News</p>
                                    {{-- <a href="{{ route('news.show', $result->id) }}"
                                        class="text-white px-2 py-1 rounded-md transition"
                                        style="background-color: rgb(75, 75, 237)">View</a>
                                    <a href="{{ route('news.show', $result->id) }}"
                                        class="text-white px-2 py-1 rounded-md transition"
                                        style="background-color: green">Edit</a>
                                    <a href="{{ route('news.delete', $result->id) }}"
                                        class="text-white px-2 py-1 rounded-md transition"
                                        style="background-color: red">Del</a> --}}
                                @else
                                    {{-- This is an Article object --}}
                                    <p>Article</p>
                                    {{-- <a href="{{ route('articles.show', $result->id) }}"
                                        class="text-white px-2 py-1 rounded-md transition"
                                        style="background-color: rgb(75, 75, 237)">View</a>
                                    <a href="{{ route('articles.show', $result->id) }}"
                                        class="text-white px-2 py-1 rounded-md transition"
                                        style="background-color: green">Edit</a> --}}
                                    {{-- <a href="{{ route('articles.destroy', $result->id) }}"
                                        class="text-white px-2 py-1 rounded-md transition"
                                        style="background-color: red">Del</a> --}}
                                @endif
                            </td>
                            <td class="border px-4 py-2"></td>
                        </tr>
                    @endforeach
                </ul>
            @else
                <p>No results found.</p>
            @endif
        </tbody>
    </table>
</x-app-layout>
