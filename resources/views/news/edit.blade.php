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
            <h2 class="text-lg font-medium">Edit News</h2>
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

        <form action="{{ route('news.update', $news->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $news->id }}" />

            <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3">
                <div class="form-group">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
                    <input type="text" name="title" value="{{ $news->title }}" id="title"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="Title">
                </div>

                <div class="form-group">
                    <label for="logoUrl" class="block text-sm font-medium text-gray-700">Logo:</label>
                    <input type="text" name="logoUrl" value="{{ $news->logoUrl }}" id="logoUrl"
                        class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="logo">
                </div>
            </div>

            <div class="flex justify-center mt-6">
                <button type="submit" class="px-4 py-2 font-semibold text-white rounded"
                    style="background-color: rgb(48, 220, 117)">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
