<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News') }}
        </h2>
    </x-slot>
    <div class="flex justify-between items-center">
        <h2 class="text-lg font-medium">Add News</h2>
        <a href="{{ route('news.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Back
        </a>
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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="w-full">
                <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
                <input type="text" id="title" name="title"
                    class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="Title">
            </div>

            <div class="w-full">
                <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                <div class="border border-gray-300 p-2 rounded-md shadow-sm">
                    <textarea class="ckeditor form-control" name="description" id="description" rows="5"></textarea>
                </div>
            </div>

            <div class="w-full">
                <label for="imageUrl" class="block text-gray-700 font-bold mb-2">Image:</label>
                <input type="text" id="picUrl" name="picUrl"
                    class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="imageUrl">
            </div>
        </div>

        <div class="flex justify-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Submit
            </button>
        </div>

    </form>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>

</x-app-layout>
