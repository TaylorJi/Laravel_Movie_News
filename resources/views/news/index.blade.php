<x-app-layout>
    <div style="margin: 20px">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('News') }}
            </h2>
        </x-slot>

        <div class="flex justify-between items-center"
            style="display: flex; flex-direction: column; align-items: center; font-weight: bold; margin-bottom: 50px;">
            <h2 class="text-lg font-medium" style="margin-bottom: 20px">Newsletters List</h2>
            <div class="flex space-x-2">
                <div class="flex space-x-2 mr-4">
                    <a href="{{ route('news.create') }}" class="text-white px-4 py-2 rounded-md transition"
                        style="background-color: rgb(13, 117, 20)">Create a newsletter</a>
                </div>
                <div class="flex space-x-2 ml-4">
                    <a href="{{ route('news.finalview') }}" class="text-white px-4 py-2 rounded-md transition"
                        style="background-color: rgb(156, 37, 95)">Show 5 active newsletters</a>
                </div>
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
                    <tr style="text-align: center;">
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
        <h2 class="text-lg font-medium">Team:-</h2>
        <div>Jashanjot Singh (A01275230)</div>
        <div>Johnathan (A01256345)</div>
        <div>Siwoon Lim (A01181611)</div>
        <div>Taylor Ji (A01304056)</div>
    </div>
</x-app-layout>
