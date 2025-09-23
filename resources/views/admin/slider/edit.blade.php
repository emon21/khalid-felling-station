-- Active: 1736588980492@@127.0.0.1@3306@fellingstation
<x-admin-layout>
    @section('content')
        <h1 class="mb-6 text-2xl font-bold text-gray-800">📄 Slider Settings</h1>

        <div class="mb-6">
            <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                <!-- Card Header -->
                <div class="flex items-center justify-between px-3 py-3 text-gray-600 bg-white border-b border-gray-300">
                    <h2 class="text-lg font-semibold ">All Slider</h2>

                    <a href="{{ route('slider.index') }}"
                        class="px-4 py-2 text-sm text-white bg-green-500 rounded hover:bg-green-600">Slider List</a>
                </div>
                <!-- Card Body -->
                <div class="bg-white rounded-lg">
                    <div class="p-6">
                        <form action="{{ route('slider.update', $slider) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label class="block text-gray-700 font-medium mb-1">Picture</label>
                                <input type="file" name="slider_picture"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">

                                {{-- <img src="{{ asset($slider->slider_picture ?? '') ?: 'https://placehold.co/600x400/EEE/31343C?font=lato&text=Slider Image' }}"
                                    alt="Picture" class="w-48 h-48 object-cover mt-3 rounded-lg"> --}}

                                <img src="{{ $slider->slider_picture ? asset($slider->slider_picture) : 'https://placehold.co/600x400/EEE/31343C?font=lato&text=Slider Image' }}"
                                    alt="Picture" class="w-48 h-48 object-cover mt-3 rounded-lg">
                            </div>
                            <div class="mb-4">
                                <label for="page_description" class="block mb-2 font-medium text-gray-700">
                                    Status</label>

                                <select name="status" id="" class="w-full focus:outline-none ">
                                    <option value=""
                                        class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                        >> Select Status << </option>
                                    <option value="Enable" {{ old('status', $slider->status) == 'Enable' ? 'selected' : '' }}
                                        class="">
                                        Enable</option>
                                    <option value="Disable"
                                        {{ old('status', $slider->status) == 'Disable' ? 'selected' : '' }} class="">
                                        Disable</option>
                                </select>

                            </div>

                            <div class="flex justify-start gap-3">
                                <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">Update</button>
                                <a href="{{ route('our-value.index') }}"
                                    class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    @endsection

</x-admin-layout>
