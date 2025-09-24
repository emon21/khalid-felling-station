<x-admin-layout>
    @section('content')
        <!-- Page brudecam --->
        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">Welcome!</h1>
        <p class="mt-4 text-gray-600 dark:text-gray-300">This is your professional modern dashboard content.</p>

        <div class="px-4 py-3 mt-3 overflow-x-auto bg-white border-2 border-blue-600 rounded shadow-lg">
            <!-- -->
            <div class="flex items-start justify-between py-3">
                <h2 class="px-1 text-xl font-medium text-gray-900">All Contact Message</h2>
                {{-- <a href="#" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700"> Create </a>        --}}
            </div>

            <div class="inline-block min-w-full overflow-hidden ">
                <table class="min-w-full border border-gray-300">
                    <!-- Table Head -->
                    <thead class="text-white bg-gradient-to-r from-blue-500 to-indigo-500">
                        <tr>
                            <th
                                class="px-6 py-3 text-xs font-semibold tracking-wider text-left uppercase border border-gray-300">
                                ID</th>
                            <th
                                class="px-6 py-3 text-xs font-semibold tracking-wider text-left uppercase border border-gray-300">
                                Name</th>
                            <th
                                class="px-6 py-3 text-xs font-semibold tracking-wider text-left uppercase border border-gray-300">
                                Email</th>
                            <th
                                class="px-6 py-3 text-xs font-semibold tracking-wider text-left uppercase border border-gray-300">
                                Subject</th>
                            <th
                                class="px-6 py-3 text-xs font-semibold tracking-wider text-left uppercase border border-gray-300">
                                Message</th>
                            <th
                                class="px-6 py-3 text-xs font-semibold tracking-wider text-left uppercase border border-gray-300">
                                Action</th>
                        </tr>
                    </thead>

                    <!-- Table Body -->
                    <tbody class="bg-white">

                        @forelse ($contacts as $contact)
                            <tr class="transition-colors hover:bg-gray-50">
                                <td class="px-6 py-4 border border-gray-300">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 border border-gray-300">{{ $contact->name }}</td>
                                <td class="px-6 py-4 border border-gray-300">{{ $contact->email }}</td>
                                <td class="px-6 py-4 border border-gray-300">{{ $contact->subject }}</td>
                                <td class="px-6 py-4 border border-gray-300">{{ $contact->message }}</td>

                                <td class="px-6 py-4 border border-gray-300">
                                    <form action="{{ route('contact-delete', $contact->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="px-3 py-2 text-white bg-red-600 rounded-lg"
                                            onclick="ConfirmDelete(event)">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty

                            <span class="px-3 py-5 text-2xl text-center text-red-600">No Data</span>
                        @endforelse

                        {{-- <tr class="transition-colors hover:bg-gray-50">
                                <td class="px-6 py-4 border border-gray-300">1</td>
                                <td class="px-6 py-4 border border-gray-300">John Doe</td>
                                <td class="px-6 py-4 border border-gray-300">john@example.com</td>
                                <td class="px-6 py-4 border border-gray-300">
                                    <span
                                        class="inline-flex px-3 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">
                                        Active
                                    </span>
                                </td>
                            </tr> --}}


                    </tbody>
                </table>
            </div>
        </div>
    @endsection
</x-admin-layout>
