<x-admin-layout>
    <style>
        .transition-all {
            transition: all 0.3s ease;
        }
    </style>
    @section('content')
        <h1 class="mb-6 text-2xl font-bold text-gray-800">📄 Our Value Settings</h1>

        <div class="mb-6">
            <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                <!-- Card Header -->
                <div class="flex items-center justify-between px-3 py-3 text-gray-600 bg-white border-b border-gray-300">
                    <h2 class="text-lg font-semibold ">All Our Value </h2>
                    <button id="openModalBtn" class="px-4 py-2 text-sm text-white bg-green-500 rounded hover:bg-green-600">+
                        Add New Value</button>
                    {{-- <a href="{{ route('our-value.create') }}"
                        class="px-4 py-2 text-sm text-white bg-green-500 rounded hover:bg-green-600">Create</a> --}}
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
                                    Title</th>
                                <th
                                    class="px-6 py-3 text-sm font-semibold tracking-wider text-left uppercase border border-gray-300">
                                    Picture</th>
                                <th
                                    class="px-6 py-3 text-sm font-semibold tracking-wider text-left uppercase border border-gray-300">
                                    Description</th>
                                <th
                                    class="px-6 py-3 text-sm font-semibold tracking-wider text-left uppercase border border-gray-300">
                                    Action</th>
                            </tr>
                        </thead>
                        <!-- Table Body -->
                        <tbody class="bg-white">
                            @foreach ($our_values as $our_value)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-2 border border-gray-200">{{ $loop->iteration }}</td>
                                    <td class="px-2 py-2 border border-gray-200">{{ $our_value->title }}</td>
                                    <td class="px-2 py-3 border border-gray-200">
                                        <img src="{{ asset($our_value->picture) }}" alt="" class="w-20 h-25">
                                    </td>
                                    <td class="px-2 py-2 border border-gray-200">
                                        <!-- Collapsible Text Component -->
                                        <div class="collapsible-text">
                                            <!-- Preview text with icon -->
                                            <div class="flex items-start gap-3">
                                                <div class="flex-1">
                                                    <p class="text-gray-700 leading-relaxed">
                                                        <span class="preview-text">
                                                            {!! Str::limit($our_value->description, 170,'...') !!}
                                                        </span>
                                                        <span class="full-text hidden">
                                                            {{ $our_value->description  }}
                                                        </span>
                                                    </p>
                                                </div>

                                                <!-- Expandable Icon -->
                                                <button
                                                    class="toggle-btn flex-shrink-0 p-2 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-full transition-all duration-200"
                                                    onclick="toggleText(this)">
                                                    <svg class="expand-icon w-5 h-5 transform transition-transform duration-300"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                    </td>
                                    <td class="flex gap-2 px-2 py-4 border border-gray-200">
                                        <a href="{{ route('our-value.edit', $our_value->id) }}"
                                            class="px-4 py-2 text-sm text-white bg-green-500 rounded-lg hover:bg-green-600">Edit</a>

                                        <form action="{{ route('our-value.destroy', $our_value->id) }}" method="POST">
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
                    {{-- <div class="flex justify-end">
                        {{ $our_values->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div id="modal" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-50"
            aria-hidden="true">
            <div id="modalContent"
                class="w-full max-w-md  p-6 transition-all duration-300 transform scale-75 bg-white rounded-lg opacity-0 shadow-lg">

                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-gray-800">Add Information</h2>
                    <button id="closeModalBtn" class="px-4 py-2 text-red-500 transition rounded " aria-label="Close modal">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>
                <form action="{{ route('our-value.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block mb-2 font-medium text-gray-700">Page Title</label>
                        <input type="text" name="title" id="title"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            value="{{ old('title') }}">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium mb-1">Description</label>
                        <textarea name="description" id="description" rows="10" cols="30"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            value="{{ old('description') }}"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="file_upload" class="block mb-2 font-medium text-gray-700">Picture</label>
                        <input type="file" name="file_upload" id="file_upload"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            value="{{ old('file_upload') }}">
                    </div>

                    <button type="submit"
                        class="px-4 py-2 font-semibold text-white transition duration-200 bg-green-500 rounded-md hover:bg-green-600">Save</button>
                </form>
            </div>
        </div>

    @endsection

    @push('script')
        <script>
            function toggleText(button) {
                const container = button.closest('.collapsible-text');
                const previewText = container.querySelector('.preview-text');
                const fullText = container.querySelector('.full-text');
                const icon = button.querySelector('.expand-icon');

                if (fullText.classList.contains('hidden')) {
                    // Show full text
                    previewText.classList.add('hidden');
                    fullText.classList.remove('hidden');
                    icon.style.transform = 'rotate(180deg)';
                    button.setAttribute('aria-expanded', 'true');
                } else {
                    // Show preview text
                    fullText.classList.add('hidden');
                    previewText.classList.remove('hidden');
                    icon.style.transform = 'rotate(0deg)';
                    button.setAttribute('aria-expanded', 'false');
                }
            }

            // Initialize all buttons
            document.addEventListener('DOMContentLoaded', function() {
                const buttons = document.querySelectorAll('.toggle-btn');
                buttons.forEach(button => {
                    button.setAttribute('aria-expanded', 'false');
                });
            });


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
