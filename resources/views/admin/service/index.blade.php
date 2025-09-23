<x-admin-layout>
    @section('content')
        <h1 class="mb-6 text-2xl font-bold text-gray-800">ℹ️ About Information :</h1>

        <div class="mb-6">
            <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                <!-- Card Header -->
                <div class="flex items-center justify-between px-3 py-3 text-gray-600 bg-white border-b-2 border-blue-500">
                    <h2 class="text-lg font-semibold ">ℹ️ Edit About</h2>
                </div>

                <!-- Card Body -->
                <div class="p-6 bg-white rounded-lg">
                    <form action="{{ route('about.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="about_title" class="block mb-2 font-medium text-gray-700">Service Name</label>
                            <input type="text" name="about_title" id="about_title"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                value="{{ $about->title }}">
                        </div>

                        <!-- Site Favicon upload -->
                        <div class="bg-white rounded-lg">
                            <div class="flex items-start justify-between gap-3">
                                <!-- About Description -->
                                <div class="w-9/12">
                                    <div class="mb-4">
                                        <label for="about_description" class="block mb-2 font-medium text-gray-700">
                                            About Description
                                        </label>
                                        <textarea name="about_description" id="about_description" rows="10" cols="30"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                            value="{{ $about->short_description }}">{{ $about->short_description }}</textarea>
                                    </div>
                                </div>

                                <!-- About Picture -->
                                <div class="w-3/12">
                                    <div class="mb-4">
                                        <label for="about_picture" class="block mb-2 font-medium text-gray-700">About Picture</label>
                                        <input type="file" id="about_picture" name="about_picture"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                            accept="image/*" onchange="PreviewImage()">
                                    </div>

                                    <!-- Image Preview - Site Favicon এর নিচে -->
                                        <div
                                            class="w-auto h-48 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 hover:bg-gray-100 cursor-pointer overflow-hidden">
                                            <img src="{{ asset($about->about_picture ?? 'https://placehold.co/600x400/EEE/31343C?font=lora&text=Picture') }}"
                                                class="w-full h-full object-cover img-preview" alt="Favicon Preview"
                                                id="favicon-preview">
                                        </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit"
                            class="px-4 py-2 font-semibold text-white transition duration-200 bg-blue-500 rounded-md hover:bg-blue-600">Update</button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
    @push('script')
        <script>
            // Image upload & Preview
            function PreviewImage() {
                const image = document.querySelector('#about_picture');
                const imgPreview = document.querySelector('.img-preview');
                imgPreview.style.display = 'block';

                const reader = new FileReader();
                reader.readAsDataURL(image.files[0]);
                reader.onload = function(reader) {
                    imgPreview.src = reader.target.result;
                }
            }
        </script>
    @endpush
</x-admin-layout>
