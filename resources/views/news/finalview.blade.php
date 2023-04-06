<x-app-layout>
    <div style="margin: 20px">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('News') }}
            </h2>
        </x-slot>


        <div class="flex justify-between items-center"
            style="display: flex; flex-direction: column; align-items: center; font-weight: bold; margin-bottom: 50px;">
            <h2 class="text-lg font-medium">Activated Newsletters List</h2>
        </div>

        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Logo</th>
                    <th class="px-4 py-2">Active</th>
                    <th class="px-4 py-2">Created Date</th>
                    <th class="px-4 py-2">Last Updated Date</th>
                    <th class="px-4 py-2">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($news as $item) --}}
                @foreach ($news->where('is_active', 1)->take(5) as $items)
                    <tr style="text-align: center;">
                        <td class="border px-4 py-2">{{ $items->id }}</td>
                        <td class="border px-4 py-2">{{ $items->title }}</td>
                        <td class="border px-4 py-2" style="max-width: 150px; max-height: 100px">
                            <img src="{{ $items->logoUrl }}" class="object-cover rounded" alt="{{ $items->title }}"
                                style="width: 150px; height: 100px">
                        </td>
                        <td class="border px-4 py-2">{{ $items->is_active }}</td>
                        <td class="border px-4 py-2">{{ $items->created_at }}</td>
                        <td class="border px-4 py-2">{{ $items->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
