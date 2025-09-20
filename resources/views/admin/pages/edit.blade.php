<x-admin-layout>
    @section('content')
        <h1 class="mb-6 text-2xl font-bold text-gray-800">📄 Page Edit</h1>

        <div class="mb-6">
            <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                <!-- Card Header -->
                <div class="flex items-center justify-between px-3 py-3 text-gray-600 bg-white border-b-2 border-blue-500">
                    <h2 class="text-lg font-semibold ">📄 Edit Pages</h2>
                    <a href="{{ route('page.index') }}"
                        class="px-4 py-2 text-sm text-white bg-green-500 rounded hover:bg-green-600">+ Page List</a>
                </div>
                <!-- Card Body -->
                <div class="p-6 bg-white rounded-lg">
                    <form action="{{ route('page.update',$page) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="page_title" class="block mb-2 font-medium text-gray-700">Page Title</label>
                        <input type="text" name="page_title" id="page_title"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            value="{{ $page->page_title }}" >
                    </div>
                    <div class="mb-4">
                        <label for="page_name" class="block mb-2 font-medium text-gray-700">Page Name</label>
                        <input type="text" name="page_name" id="page_name"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            value="{{ $page->page_name }}">
                    </div>
                    <div class="mb-4">
                        <label for="page_description" class="block mb-2 font-medium text-gray-700">
                            Page Description</label>
                        <textarea name="page_description" id="page_description" rows="4"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            value="{{ $page->page_description }}">{{ $page->page_description }}</textarea>
                    </div>

                    <button type="submit"
                        class="px-4 py-2 font-semibold text-white transition duration-200 bg-green-500 rounded-md hover:bg-green-600">Update</button>
                </form>
                </div>
            </div>
        </div>        
    @endsection
</x-admin-layout>
