<x-admin-layout>
    @section('content')
        <h1 class="mb-6 text-2xl font-bold text-gray-800">📄 Page Settings</h1>

        <div class="mb-6">
            <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                <!-- Card Header -->
                <div class="flex items-center justify-between px-3 py-3 text-gray-600 bg-white border-b border-gray-300">
                    <h2 class="text-lg font-semibold ">All Pages</h2>
                    <button id="openModalBtn" class="px-4 py-2 text-sm text-white bg-green-500 rounded hover:bg-green-600">+
                        Create Slider</button>
                </div>
                <!-- Card Body -->
                <div class="bg-white rounded-lg">
                    <table class="min-w-full bg-white">
                        <!-- Table Header -->
                        <thead class="text-gray-600 ">
                            <tr>
                                <th
                                    class="px-4 py-2 text-sm font-semibold tracking-wider text-left uppercase border border-gray-300">
                                    ID</th>
                                <th
                                    class="px-6 py-3 text-sm font-semibold tracking-wider text-left uppercase border border-gray-300">
                                    Slider Picture</th>
                                <th
                                    class="px-6 py-3 text-sm font-semibold tracking-wider text-left uppercase border border-gray-300">
                                    Status</th>

                                <th
                                    class="px-6 py-3 text-sm font-semibold tracking-wider text-left uppercase border border-gray-300">
                                    Action</th>
                            </tr>
                        </thead>
                        <!-- Table Body -->
                        <tbody class="bg-white">
                            @foreach ($sliders as $slider)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 border border-gray-200">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 border border-gray-200">
                                        {{-- <img src="{{ asset( $slider->slider_picture) }}" alt="Picture"
                                    class="w-20 h-20 object-cover mt-3 rounded-lg"> --}}
                                        <img src="{{ $slider->slider_picture ? asset($slider->slider_picture) : 'https://placehold.co/600x400/EEE/31343C?font=lato&text=Slider+Image' }}"
                                            alt="Slider Image" class="w-25 h-20 rounded-lg">
                                    </td>
                                    <td class="px-6 py-4 border border-gray-200">
                                        @if ($slider->status == 'Enable')
                                            <span class="px-2 py-3 text-green-600 text-2xl">
                                                {{ $slider->status }}
                                            </span>
                                        @else
                                            <span class="px-2 py-3 text-red-600 text-2xl">
                                                {{ $slider->status }}
                                            </span>
                                        @endif
                                    </td>

                                    <td class="flex gap-2 px-6 py-4 border border-gray-200">
                                        <a href="{{ route('slider.edit', $slider->id) }}"
                                            class="px-4 py-2 text-sm text-white bg-green-500 rounded-lg hover:bg-green-600">Edit</a>

                                        <form action="{{ route('slider.destroy', $slider->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="ConfirmDelete(event)"
                                                class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Card Footer -->
                <div class="flex justify-end px-6 py-4 space-x-2">
                    <!-- Pagination -->
                    <div class="flex justify-end">
                        {{ $sliders->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div id="modal" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-50"
            aria-hidden="true">
            <div id="modalContent"
                class="w-full max-w-md p-6 transition-all duration-300 transform scale-75 bg-white rounded-lg opacity-0"
                class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg">

                <div class="flex items-center justify-between mb-4 border-b border-blue-600 py-3">
                    <h2 class="text-xl font-semibold text-gray-800">Slider Information</h2>
                    <button id="closeModalBtn" class="px-4 py-2 text-red-500 transition rounded " aria-label="Close modal">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>
                <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="slider_picture" class="block mb-2 font-medium text-gray-700">Slider Picture</label>
                        <input type="file" name="slider_picture" id="slider_picture"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            value="{{ old('slider_picture') }}">
                    </div>

                    <div class="mb-4">
                        <label for="page_description" class="block mb-2 font-medium text-gray-700">
                            Status</label>

                        <select name="status" id="" class="w-full focus:outline-none ">
                            <option value=""
                                class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                >> Select Status << </option>
                            <option value="Enable" class="">Enable</option>
                            <option value="Disable" class="">Disable</option>
                        </select>

                    </div>

                    <button type="submit"
                        class="px-4 py-2 font-semibold text-white transition duration-200 bg-green-500 rounded-md hover:bg-green-600">Save</button>
                </form>
            </div>
        </div>
    @endsection

    @push('script')
        <script>
            // Modal functionality
            const openModalBtn = document.getElementById('openModalBtn');
            const modal = document.getElementById('modal');
            const modalContent = document.getElementById('modalContent');
            const closeModalBtn = document.getElementById('closeModalBtn');

            // Open modal with animation
            openModalBtn.addEventListener('click', () => {
                modal.classList.remove('hidden');
                setTimeout(() => {
                    modalContent.classList.remove('scale-75', 'opacity-0');
                    modalContent.classList.add('scale-100', 'opacity-100');
                }, 10); // Small delay to trigger transition
            });

            // Close modal with animation
            closeModalBtn.addEventListener('click', () => {
                modalContent.classList.add('scale-75', 'opacity-0');
                modalContent.classList.remove('scale-100', 'opacity-100');
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300); // Match the transition duration
            });

            // Close modal when clicking outside
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modalContent.classList.add('scale-75', 'opacity-0');
                    modalContent.classList.remove('scale-100', 'opacity-100');
                    setTimeout(() => {
                        modal.classList.add('hidden');
                    }, 300);
                }
            });
        </script>
    @endpush
</x-admin-layout>
