<x-admin-layout>
    @section('content')
         <!-- Page brudecam --->
            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">Welcome!</h1>
            <p class="mt-4 text-gray-600 dark:text-gray-300">This is your professional modern dashboard content.</p>
            <div class="overflow-x-auto mt-3 bg-white p-6 shadow-lg">
                <div class="inline-block min-w-full rounded-lg overflow-hidden">
                    <table class="min-w-full border border-gray-300">
                        <!-- Table Head -->
                        <thead class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider border border-gray-300">
                                    ID</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider border border-gray-300">
                                    Name</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider border border-gray-300">
                                    Email</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider border border-gray-300">
                                    Status</th>
                            </tr>
                        </thead>

                        <!-- Table Body -->
                        <tbody class="bg-white">
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 border border-gray-300">1</td>
                                <td class="px-6 py-4 border border-gray-300">John Doe</td>
                                <td class="px-6 py-4 border border-gray-300">john@example.com</td>
                                <td class="px-6 py-4 border border-gray-300">
                                    <span
                                        class="px-3 py-1 inline-flex text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                            </tr>
                            <tr class="bg-gray-50 hover:bg-gray-100 transition-colors">
                                <td class="px-6 py-4 border border-gray-300">2</td>
                                <td class="px-6 py-4 border border-gray-300">Jane Smith</td>
                                <td class="px-6 py-4 border border-gray-300">jane@example.com</td>
                                <td class="px-6 py-4 border border-gray-300">
                                    <span
                                        class="px-3 py-1 inline-flex text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                        Inactive
                                    </span>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 border border-gray-300">3</td>
                                <td class="px-6 py-4 border border-gray-300">Mike Johnson</td>
                                <td class="px-6 py-4 border border-gray-300">mike@example.com</td>
                                <td class="px-6 py-4 border border-gray-300">
                                    <span
                                        class="px-3 py-1 inline-flex text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
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
