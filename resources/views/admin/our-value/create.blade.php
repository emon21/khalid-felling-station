<x-admin-layout>
   @section('content')
<div class="max-w-3xl mx-auto px-6 py-8">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Add New Value</h2>

    <form action="{{ route('our-value.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-xl shadow">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Title</label>
            <input type="text" name="title" value="{{ old('title') }}"
                   class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300">
            @error('title') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Description</label>
            <textarea name="description" rows="4"
                      class="w-full border rounded-lg px-3 py-2 focus:ring focus:ring-blue-300">{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Picture</label>
            <input type="file" name="file_upload" class="w-full">
        </div>


        <div class="flex justify-end gap-3">
            <a href="{{ route('our-value.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">Save</button>
        </div>
    </form>
</div>
@endsection
</x-admin-layout>
