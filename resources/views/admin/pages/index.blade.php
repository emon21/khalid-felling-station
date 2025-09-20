<x-admin-layout>
    @section('content')
        <h1 class="mb-6 text-2xl font-bold text-gray-800">📄 Page Settings</h1>

        <div class="mb-6">
            <div class="overflow-hidden bg-white rounded-lg shadow-lg">
                <!-- Card Header -->
                <div class="flex items-center justify-between px-3 py-3 text-gray-600 bg-white border-b border-gray-300">
                    <h2 class="text-lg font-semibold ">All Pages</h2>
                    <button id="openModalBtn"
                        class="px-4 py-2 text-sm text-white bg-green-500 rounded hover:bg-green-600">+ Add New Page</button>
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
                                    Page Title</th>
                                <th
                                    class="px-6 py-3 text-sm font-semibold tracking-wider text-left uppercase border border-gray-300">
                                    Page Name</th>
                                    <th
                                    class="px-6 py-3 text-sm font-semibold tracking-wider text-left uppercase border border-gray-300">
                                    Slug</th>
                                <th
                                    class="px-6 py-3 text-sm font-semibold tracking-wider text-left uppercase border border-gray-300">
                                    Page Description</th>
                                <th
                                    class="px-6 py-3 text-sm font-semibold tracking-wider text-left uppercase border border-gray-300">
                                    Action</th>
                            </tr>
                        </thead>
                        <!-- Table Body -->
                        <tbody class="bg-white">
                            @foreach ($pages as $page)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 border border-gray-200">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 border border-gray-200">{{ $page->page_title }}</td>
                                    <td class="px-6 py-4 border border-gray-200">{{ $page->page_name }}</td>
                                    <td class="px-6 py-4 border border-gray-200">{{ $page->slug }}</td>
                                    <td class="px-6 py-4 border border-gray-200">{{ $page->page_description }}</td>
                                    <td class="flex gap-2 px-6 py-4 border border-gray-200">
                                        <a href="{{ route('page.edit', $page->id) }}"
                                            class="px-4 py-2 text-sm text-white bg-green-500 rounded-lg hover:bg-green-600">Edit</a>

                                        <form action="{{ route('page.destroy', $page->id) }}" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="ConfirmDelete(event)" class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600">
                                                Delete
                                            </button>
                                        </form>

                                        {{-- <form id="delete-form-{{ $page->id }}"
                                            action="{{ route('page.destroy', $page->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                        <button onclick="deleteConfirmation({{ $page->id }})"
                                            class="px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700">
                                            Delete
                                        </button> --}}
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
                        {{ $pages->links() }}
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

                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-semibold text-gray-800">Add Information</h2>
                    <button id="closeModalBtn" class="px-4 py-2 text-red-500 transition rounded "
                        aria-label="Close modal">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </button>
                </div>
                <form action="{{ route('page.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="page_title" class="block mb-2 font-medium text-gray-700">Page Title</label>
                        <input type="text" name="page_title" id="page_title"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            value="{{ old('page_title') }}">
                    </div>
                    <div class="mb-4">
                        <label for="page_name" class="block mb-2 font-medium text-gray-700">Page Name</label>
                        <input type="text" name="page_name" id="page_name"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            value="{{ old('page_name') }}">
                    </div>
                    <div class="mb-4">
                        <label for="page_description" class="block mb-2 font-medium text-gray-700">
                            Page Description</label>
                        <textarea name="page_description" id="page_description" rows="4"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            value="{{ old('page_description') }}"></textarea>
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
