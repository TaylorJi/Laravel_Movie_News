<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>
    <div class="flex flex-row justify-between">
        <h2 class="text-2xl font-bold">Edit articles</h2>
        <a href="{{ route('articles.index') }}"
            class="px-4 py-2 font-semibold text-white bg-blue-500 rounded hover:bg-blue-700">
            Back
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.update', $articles->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $articles->id }}" />

        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3">
            <div class="form-group">
                <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
                <input type="text" name="title" value="{{ $articles->title }}" id="title"
                    class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="Title">
            </div>

            <div class="form-group col-span-3">
                <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                <div class="border border-gray-300 p-2 rounded-md shadow-sm">
                    <textarea class="ckeditor form-control" name="description" id="description" rows="5">{{ $articles->description }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="picUrl" class="block text-sm font-medium text-gray-700">Image:</label>
                <input type="text" name="picUrl" value="{{ $articles->picUrl }}" id="picUrl"
                    class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="imageUrl">
            </div>
        </div>

        <div class="flex justify-center mt-6">
            <button type="submit" class="px-4 py-2 font-semibold text-white rounded" style="background-color: rgb(48, 220, 117)">
                Update
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