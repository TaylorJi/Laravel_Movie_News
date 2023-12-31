<x-app-layout>
    <div style="margin: 20px; display: flex; flex-direction: column; align-items: center;">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('News') }}
            </h2>
        </x-slot>

        <div style="display: flex; justify-content: flex-end; width: 100%;">
            <a href="{{ route('news.index') }}" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded"
                style="background-color:lightblue">
                Back
            </a>
        </div>

        <div
            style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-top: 20px;">
            <h2 class="text-lg font-medium">Add News</h2>

        </div>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Whoops!</strong>
                <span class="block sm:inline">There were some problems with your input.</span>
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('news.store') }}" method="POST" class="mt-5 space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6"
                style="display: flex; flex-direction: column; align-items: center;">
                <div class="w-full">
                    <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
                    <input type="text" id="title" name="title"
                        class="form-input rounded-md shadow-sm mt-1 block" placeholder="Title">
                </div>

                <div class="w-full">
                    <label for="logoUrl" class="block text-gray-700 font-bold mb-2">Image:</label>
                    <input type="text" id="logoUrl" name="logoUrl"
                        class="form-input rounded-md shadow-sm mt-1 block" placeholder="logoUrl">
                </div>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="text-white font-bold py-2 px-4 rounded"
                    style="background-color: rgb(62, 90, 231)">
                    Submit
                </button>
            </div>

        </form>
    </div>
</x-app-layout>
