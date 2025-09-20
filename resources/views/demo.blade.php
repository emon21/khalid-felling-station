<x-admin-layout>
    @section('content')
         <!-- Page brudecam --->
            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">Welcome!</h1>
            <p class="mt-4 text-gray-600 dark:text-gray-300">This is your professional modern dashboard content.</p>
            <div class="p-6 mt-3 overflow-x-auto bg-white shadow-lg">
                <div class="inline-block min-w-full overflow-hidden rounded-lg">
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
                                    Status</th>
                            </tr>
                        </thead>

                        <!-- Table Body -->
                        <tbody class="bg-white">
                            <tr class="transition-colors hover:bg-gray-50">
                                <td class="px-6 py-4 border border-gray-300">1</td>
                                <td class="px-6 py-4 border border-gray-300">John Doe</td>
                                <td class="px-6 py-4 border border-gray-300">john@example.com</td>
                                <td class="px-6 py-4 border border-gray-300">
                                    <span
                                        class="inline-flex px-3 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">
                                        Active
                                    </span>
                                </td>
                            </tr>
                            <tr class="transition-colors bg-gray-50 hover:bg-gray-100">
                                <td class="px-6 py-4 border border-gray-300">2</td>
                                <td class="px-6 py-4 border border-gray-300">Jane Smith</td>
                                <td class="px-6 py-4 border border-gray-300">jane@example.com</td>
                                <td class="px-6 py-4 border border-gray-300">
                                    <span
                                        class="inline-flex px-3 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded-full">
                                        Inactive
                                    </span>
                                </td>
                            </tr>
                            <tr class="transition-colors hover:bg-gray-50">
                                <td class="px-6 py-4 border border-gray-300">3</td>
                                <td class="px-6 py-4 border border-gray-300">Mike Johnson</td>
                                <td class="px-6 py-4 border border-gray-300">mike@example.com</td>
                                <td class="px-6 py-4 border border-gray-300">
                                    <span
                                        class="inline-flex px-3 py-1 text-xs font-semibold text-yellow-800 bg-yellow-100 rounded-full">
                                        Pending
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
           </div>
    @endsection
</x-admin-layout>
