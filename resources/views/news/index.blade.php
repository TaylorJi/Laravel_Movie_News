<x-app-layout>
    <div style="margin: 20px">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('News') }}
            </h2>
        </x-slot>
          <form action="{{ route('search') }}" method="get">
            <input type="text" name="search" placeholder="Search...">
            <button type="submit">Search</button>
        </form>



        <div class="flex justify-between items-center">
            <h2 class="text-lg font-medium">Newsletters List</h2>
            <div class="flex space-x-2">
                <a href="{{ route('news.create') }}" class="text-white px-4 py-2 rounded-md transition"
                    style="background-color: rgb(11, 234, 26)">Create a newsletter</a>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="border text-green-900 px-4 py-3 rounded-md my-4" style="background-color: #D1FAE5;">
                <p>{{ $message }}</p>
            </div>
        @endif
      
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Logo</th>
                    <th class="px-4 py-2">Active</th>
                    <th class="px-4 py-2">Created Date</th>
                    <th class="px-4 py-2">Last Updated Date</th>
                    <th class="px-4 py-2">CRUD</th>
                    <th class="px-4 py-2">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $item)
                    <tr>
                        <td class="border px-4 py-2">{{ $item->id }}</td>
                        <td class="border px-4 py-2">{{ $item->title }}</td>
                        <td class="border px-4 py-2" style="max-width: 150px; max-height: 100px">
                            <img src="{{ $item->logoUrl }}" class="object-cover rounded" alt="{{ $item->title }}"
                                style="width: 150px; height: 100px">
                        </td>
                        <td class="border px-4 py-2">{{ $item->is_active }}</td>
                        <td class="border px-4 py-2">{{ $item->created_at }}</td>
                        <td class="border px-4 py-2">{{ $item->updated_at }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('articles.view', $item->id) }}"
                                class="text-white px-2 py-1 rounded-md transition"
                                style="background-color: rgb(75, 75, 237)">View</a>
                            <a href="{{ route('news.edit', $item->id) }}"
                                class="text-black px-2 py-1 rounded-md transition" style="background-color: cyan">Edit
                                Newsletter</a>
                            <a href="{{ route('articles.show', $item->id) }}"
                                class="text-white px-2 py-1 rounded-md transition" style="background-color: green">Edit
                                Ariticles</a>
                            <a href="{{ route('news.delete', $item->id) }}"
                                class="text-white px-2 py-1 rounded-md transition"
                                style="background-color: red">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="my-4" style="margin: 20px">
        <h2 class="text-lg font-medium">Team</h2>
        <div>Jashinjot()</div>
        <div>Johnathan(A01256345)</div>
        <div>Siwoon Lim (A01181611)</div>
        <div>Taylor Ji()</div>
    </div>
</x-app-layout>
