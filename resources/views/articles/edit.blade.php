<x-app-layout>
    <div style="margin: 20px; display: flex; flex-direction: column; align-items: center;">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Articles') }}
            </h2>
        </x-slot>
        <div style="display: flex; justify-content: flex-end; width: 100%;">
            <a href="{{ route('articles.show', $articles->newsletter_id) }}"
                class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded" style="background-color:lightblue">
                Back
            </a>
        </div>

        <div
            style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-top: 20px;">
            <h2 class="text-lg font-medium">Edit Article</h2>
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

            {{-- <div class="form-group col-span-3">
                <label for="position" class="block text-sm font-medium text-gray-700">Position:</label>
                <div class="border border-gray-300 p-2 rounded-md shadow-sm">
                    <textarea class="ckeditor form-control" name="position" id="position" rows="5">{{ $articles->position }}</textarea>
                </div>
            </div> --}}
            <div class="form-group col-span-3">
                <p>Image Placement</p>
                {{-- <input type="text" style="margin-left: 15px; width: 400px;" class="form-control" id="imagePosition" name="imagePosition" placeholder="Left or Right" value="{{ $news->imagePosition }}" required> --}}
                @if ($articles->position == 'Left')
                    <input type="radio" id="left" name="position" value="Left" checked>
                    <label for="left">Left</label><br>
                    <input type="radio" id="right" name="position" value="Right">
                    <label for="right">Right</label><br>
                @else
                    <input type="radio" id="left" name="position" value="Left">
                    <label for="left">Left</label><br>
                    <input type="radio" id="right" name="position" value="Right" checked>
                    <label for="right">Right</label><br>
                @endif
            </div>

            <div class="flex justify-center mt-6">
                <button type="submit" class="px-4 py-2 font-semibold text-white rounded"
                    style="background-color: rgb(48, 220, 117)">
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
    </div>
</x-app-layout>
