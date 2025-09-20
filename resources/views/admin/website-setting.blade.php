<x-admin-layout>
    @section('content')
        <h1 class="mb-6 text-2xl font-bold text-gray-800">⚙️ Website Settings</h1>
        
        <div class="bg-white rounded-lg">
            <!-- Tab Navigation -->
            <div class="flex flex-wrap p-2 bg-white border-b border-gray-200">
                <button type="button"
                    class="px-2 py-3 text-blue-500 border-b-2 border-blue-500 nor border-font-medium tab-button focus:outline-none"
                    aria-selected="true">Website Info</button>
                <button type="button"
                    class="px-2 py-3 text-gray-600 border-b-2 border-transparent border-font-medium tab-button hover:border-blue-500 focus:outline-none"
                    aria-selected="false">Social Link</button>
                <button type="button"
                    class="px-2 py-3 text-gray-600 border-b-2 border-transparent border-font-medium tab-button hover:border-blue-500 focus:outline-none"
                    aria-selected="false">Page Seo</button>
            </div>

            <!-- Tab Content -->
            <div class="rounded-lg">

                <!-- Website Info Tab -->
                <div class="tab-pane">
                    <div class="mt-3 bg-gray-300 rounded-lg shadow">
                        <h4 class="py-3 pl-3 text-2xl text-blue-600"> Website Information :</h4>
                    </div>
                    <div class="p-4">
                        <form class="p-3 border rounded-lg" action="#" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="flex items-center justify-between gap-2">
                                <div class="w-1/2 mb-4 mr-2">
                                    <label for="site_name" class="block mb-2 font-medium text-gray-700">Site Name</label>
                                    <input type="text" id="site_name" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        value="{{ old('site_name') }}">
                                </div>
                                <div class="w-1/2 mb-4 mr-2">
                                    <label for="site_phone" class="block mb-2 font-medium text-gray-700">Site Phone</label>
                                    <input type="text" id="site_phone" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        value="{{ old('site_phone') }}">
                                </div>
                                <div class="w-1/2 mb-4 mr-2">
                                    <label for="site_email" class="block mb-2 font-medium text-gray-700">Site Email</label>
                                    <input type="text" id="site_email" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        value="{{ old('site_email') }}">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="site_address"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Site
                                    Address</label>
                                <textarea id="site_address" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Write your thoughts here..." value="{{ old('site_address') }}"></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="site_logo" class="block mb-2 font-medium text-gray-700">site_logo</label>
                                <input type="file" id="site_logo" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    value="{{ old('site_logo') }}">
                            </div>


                            <!-- Save Button -->
                            <button class="px-6 py-2 text-white transition bg-blue-600 rounded-lg hover:bg-blue-700">
                                Save Settings
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Social Link Tab -->
                <div class="hidden tab-pane">
                    <div class="mt-3 bg-green-600 rounded-tl-lg rounded-tr-lg">
                        <h4 class="py-3 pl-3 text-2xl text-white"> Social Link :</h4>
                    </div>
                    <div class="p-4">
                        <form class="p-3 border rounded-lg" action="#" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="flex items-center justify-between gap-2">
                                <div class="w-1/2 mb-4 mr-2">
                                    <label for="site_name" class="block mb-2 font-medium text-gray-700">Site Name</label>
                                    <input type="text" id="site_name" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        value="{{ old('site_name') }}">
                                </div>
                                <div class="w-1/2 mb-4 mr-2">
                                    <label for="site_phone" class="block mb-2 font-medium text-gray-700">Site Phone</label>
                                    <input type="text" id="site_phone" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        value="{{ old('site_phone') }}">
                                </div>
                                <div class="w-1/2 mb-4 mr-2">
                                    <label for="site_email" class="block mb-2 font-medium text-gray-700">Site Email</label>
                                    <input type="text" id="site_email" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        value="{{ old('site_email') }}">
                                </div> 
                                <div class="w-1/2 mb-4 mr-2">
                                    <label for="site_email" class="block mb-2 font-medium text-gray-700">Site Email</label>
                                    <input type="text" id="site_email" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        value="{{ old('site_email') }}">
                                </div>
                            </div>

                            <!-- Save Button -->
                            <button class="px-6 py-2 text-white transition bg-blue-600 rounded-lg hover:bg-blue-700">
                                Update
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Page Seo Tab -->
                <div class="hidden tab-pane">
                    <div class="mt-3 bg-green-600 rounded-tl-lg rounded-tr-lg">
                        <h4 class="py-3 pl-3 text-2xl text-white"> Page Seo</h4>
                    </div>
                    <div class="p-4">
                        <form  class="p-3 border rounded-lg" action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                           <div class="flex items-center justify-between gap-2">
                             <div class="w-1/2 mb-4 mr-2">
                                <label for="site_name" class="block mb-2 font-medium text-gray-700">Site Name</label>
                                <input type="text" id="site_name" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    value="{{ old('site_name') }}">
                            </div>
                            <div class="w-1/2 mb-4 mr-2">
                                <label for="site_phone" class="block mb-2 font-medium text-gray-700">Site Phone</label>
                                <input type="text" id="site_phone" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    value="{{ old('site_phone') }}">
                            </div>
                            <div class="w-1/2 mb-4 mr-2">
                                <label for="site_email" class="block mb-2 font-medium text-gray-700">Site Email</label>
                                <input type="text" id="site_email" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    value="{{ old('site_email') }}">
                            </div>
                           </div>

                            <!-- Save Button -->
                            <button class="px-6 py-2 text-white transition bg-blue-600 rounded-lg hover:bg-blue-700">
                                Save Settings
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- <form class="w-full p-6 bg-white rounded-lg shadow-md">
                <!-- Tab Navigation -->
                <div class="flex flex-wrap border-b border-gray-200">
                    <button type="button"
                        class="px-4 py-2 font-medium text-blue-500 border-b-2 border-blue-500 tab-button focus:outline-none"
                        aria-selected="true">Personal Info</button>
                    <button type="button"
                        class="px-4 py-2 font-medium text-gray-600 border-b-2 border-transparent tab-button hover:border-blue-500 focus:outline-none"
                        aria-selected="false">Contact Info</button>
                    <button type="button"
                        class="px-4 py-2 font-medium text-gray-600 border-b-2 border-transparent tab-button hover:border-blue-500 focus:outline-none"
                        aria-selected="false">Message</button>
                </div>

                <!-- Tab Content -->
                <div class="mt-4 tab-content">
                    <!-- Personal Info Tab -->
                    <div class="tab-pane">
                        <div class="mb-4">
                            <label for="first-name" class="block mb-2 font-medium text-gray-700">First Name</label>
                            <input type="text" id="first-name" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent invalid:border-red-500 invalid:focus:ring-red-500">
                        </div>
                        <div class="mb-4">
                            <label for="last-name" class="block mb-2 font-medium text-gray-700">Last Name</label>
                            <input type="text" id="last-name" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent invalid:border-red-500 invalid:focus:ring-red-500">
                        </div>
                    </div>
                    <!-- Contact Info Tab -->
                    <div class="hidden tab-pane">
                        <div class="mb-4">
                            <label for="email" class="block mb-2 font-medium text-gray-700">Email</label>
                            <input type="email" id="email" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent invalid:border-red-500 invalid:focus:ring-red-500">
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block mb-2 font-medium text-gray-700">Phone</label>
                            <input type="tel" id="phone"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                    <!-- Message Tab -->
                    <div class="hidden tab-pane">
                        <div class="mb-4">
                            <label for="message" class="block mb-2 font-medium text-gray-700">Message</label>
                            <textarea id="message" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                rows="4"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                {{-- <button type="submit"
                    class="w-full py-2 mt-4 font-semibold text-white transition duration-200 bg-blue-500 rounded-md hover:bg-blue-600">Submit</button>

                <!-- Save Button -->
                <button class="px-6 py-2 text-white transition bg-blue-600 rounded-lg hover:bg-blue-700">
                    Save Settings
                </button>
            </form> --}}
        </div>
    @endsection
    @push('script')
        <!-- Tab-Switching JavaScript -->
        <script>
            const buttons = document.querySelectorAll('.tab-button');
            const panes = document.querySelectorAll('.tab-pane');

            buttons.forEach((button, index) => {
                button.addEventListener('click', () => {
                    buttons.forEach(btn => {
                        btn.classList.remove('border-blue-500', 'text-blue-500');
                        btn.classList.add('border-transparent', 'text-gray-600');
                        btn.setAttribute('aria-selected', 'false');
                    });
                    button.classList.add('border-blue-500', 'text-blue-500');
                    button.classList.remove('border-transparent', 'text-gray-600');
                    button.setAttribute('aria-selected', 'true');
                    panes.forEach(pane => pane.classList.add('hidden'));
                    panes[index].classList.remove('hidden');
                });
            });
        </script>
    @endpush
</x-admin-layout>
