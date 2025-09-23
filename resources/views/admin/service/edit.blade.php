<x-admin-layout>
    @section('content')
        <h1 class="mb-6 text-2xl font-bold text-gray-800">ℹ️ Service Information :</h1>

        <div class="mb-6">
            <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                <!-- Card Header -->
                <div class="flex items-center justify-between px-3 py-3 text-gray-600 bg-white border-b-2 border-blue-500">
                    <h2 class="text-lg font-semibold ">ℹ️ Edit Service</h2>
                    <a href="{{ route('service.index') }}" class="px-4 py-2 text-white bg-blue-500 rounded">Service List</a>
                </div>

                <!-- Card Body -->
                <div class="p-6 bg-white rounded-lg">
                    <form action="{{ route('service.update',$service) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="service_name" class="block mb-2 font-medium text-gray-700">Service Name</label>
                            <input type="text" name="service_name" id="service_name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                value="{{ $service->service_name }}">
                        </div>

                        <!-- About Picture -->
                        <div class="w-3/12 mb-3">
                            <div class="mb-4">
                                <label for="service_picture" class="block mb-2 font-medium text-gray-700">About
                                    Picture</label>
                                <input type="file" id="service_picture" name="service_picture"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                     onchange="PreviewImage()">
                            </div>

                            <!-- Image Preview - Site Favicon এর নিচে -->
                            <div
                                class="w-auto h-48 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 hover:bg-gray-100 cursor-pointer overflow-hidden">
                                <img src="{{ asset($service->service_picture ?? 'https://placehold.co/600x400/EEE/31343C?font=lora&text=Picture') }}"
                                    class="w-full h-full object-cover img-preview" alt="Favicon Preview"
                                    id="favicon-preview">
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
                const image = document.querySelector('#service_picture');
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
