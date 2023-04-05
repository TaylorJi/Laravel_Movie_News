<x-app-layout>
    <div style="margin: 20px">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Articles') }}
            </h2>
        </x-slot>
        <div class="flex justify-between items-center">
            <h2 class="text-lg font-medium">Add articles</h2>
            <a href="{{ route('articles.show', ['newsletter_id' => $newsletter_id]) }}"
                class="text-white font-bold py-2 px-4 rounded" style="background-color: rgb(60, 36, 240)">
                Back
            </a>
        </div>

        @if ($errors->any())
            <div class="border text-red-700 px-4 py-3 rounded relative" role="alert"
                style="border-color: #EF4444; background-color: #FEE2E2;">
                <strong class="font-bold">Whoops!</strong>
                <span class="block sm:inline">There were some problems with your input.</span>
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('articles.store') }}" method="POST" class="mt-5 space-y-6">
            @csrf
            <input type="hidden" name="newsletter_id" id="newsletter_id" value="{{ $newsletter_id }}">

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
                <button type="submit" class="text-white font-bold py-2 px-4 rounded"
                    style="background-color: rgb(62, 90, 231)">
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
    </div>
</x-app-layout>
