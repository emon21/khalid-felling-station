<x-admin-layout>
    @section('content')
        <div class="flex flex-wrap justify-between itmes-center">
            <h1 class="mb-6 text-2xl font-bold text-gray-800">⚙️ Website Settings</h1>
            <!-- Reset Button -->
            <form action="{{ route('website-settings.reset') }}" method="POST">
                @csrf
                <button onclick="ResetData(event)" type="submit"
                    class="px-4 py-2 text-white transition-colors rounded-lg bg-green-950 bg-gradient-to-r from-green-500 to-green-800 hover:bg-blue-700">
                    <i class="mr-2 fas fa-undo"></i>Reset to Default
                </button>
            </form>
        </div>

        <div class="bg-white rounded-lg">
            <!-- Tab Navigation -->
            <div class="flex flex-wrap bg-white border-b border-gray-200 rounded-t-lg">
                <button type="button"
                    class="py-3 pr-2 font-medium text-blue-600 transition-colors duration-200 border-b-2 border-blue-600 tab-button focus:outline-none"
                    data-tab="website-info" aria-selected="true">
                    <i class="mr-2 fas fa-cog"></i>Website Settings
                </button>
                <button type="button"
                    class="py-3 pr-2 font-medium text-gray-600 transition-colors duration-200 border-b-2 border-transparent tab-button hover:text-blue-600 hover:border-blue-300 focus:outline-none"
                    data-tab="social-links" aria-selected="false">
                    <i class="mr-2 fas fa-share-alt"></i>Social Links
                </button>
              
                <button type="button"
                    class="py-3 pr-2 font-medium text-gray-600 transition-colors duration-200 border-b-2 border-transparent tab-button hover:text-blue-600 hover:border-blue-300 focus:outline-none"
                    data-tab="page-seo" aria-selected="false">
                    <i class="mr-2 fas fa-search"></i>Page SEO
                </button>
            </div>

            <!-- Tab Content -->
            <div class="rounded-lg">
                <!-- Website Info Tab -->
                <div id="website-info" class="tab-pane">
                    <div class="border-b border-blue-200 bg-gradient-to-r from-blue-100 to-blue-200">
                        <h4 class="flex items-center py-4 text-2xl font-semibold text-blue-700">
                            <i class="mr-2 fas fa-info-circle"></i>Website Information
                        </h4>
                    </div>
                    <div class="p-4 border border-blue-300">
                        <form action="{{ route('website-settings.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="flex items-center justify-between gap-2">

                                <!-- Site Name -->
                                <div class="w-1/2 mb-4 mr-2">
                                    <label for="site_name" class="block mb-2 font-medium text-gray-700">Site Name</label>
                                    <input type="text" id="site_name" name="site_name"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        value="{{ old('site_name', $settings->site_name) }}"
                                        placeholder="Enter Site Name....">
                                </div>

                                <!-- Site Phone -->
                                <div class="w-1/2 mb-4 mr-2">
                                    <label for="site_phone" class="block mb-2 font-medium text-gray-700">Site Phone</label>
                                    <input type="text" id="site_phone" name="site_phone"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        value="{{ old('site_phone', $settings->site_phone) }}"
                                        placeholder="Enter Site Phone....">
                                </div>

                                <!-- Site Email -->
                                <div class="w-1/2 mb-4 mr-2">
                                    <label for="site_email" class="block mb-2 font-medium text-gray-700">Site Email</label>
                                    <input type="text" id="site_email" name="site_email"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        value="{{ old('site_email', $settings->site_email) }}"
                                        placeholder="Enter Site Email....">
                                </div>
                            </div>

                            <!-- Site Address -->
                            <div class="mb-4">
                                <label for="site_address"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Site
                                    Address</label>
                                <textarea id="site_address" name="site_address" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Write your thoughts here...." value="{{ old('site_address', $settings->site_address) }}">{{ $settings->site_address }}</textarea>
                            </div>

                            <!-- Site Logo upload && Preview -->
                            <div class="mb-4">
                                <label for="site_logo" class="block mb-2 font-medium text-gray-700">Site Logo</label>
                                <input type="file" id="image" name="site_logo"
                                    class="w-3/12 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    value="{{ old('site_logo') }}" onchange="PreviewImage()">

                                <!-- Image Preview -->
                                <img src="{{ asset($settings->site_logo ?? 'https://placehold.co/600x400/EEE/31343C?font=lora&text=Lora') }}"
                                    class="w-3/12 px-4 py-6 mt-4 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 img-preview"
                                    alt="Image Preview">

                            </div>

                            <!-- Site Favicon upload -->
                            <div class="bg-white rounded-lg">
                                <div class="flex items-start justify-between gap-3">
                                    <!-- Site Favicon Section -->
                                    <div class="w-1/2">
                                        <div class="mb-4">
                                            <label for="site_favicon" class="block mb-2 font-medium text-gray-700">Site
                                                Favicon</label>
                                            <input type="file" id="site_favicon" name="site_favicon"
                                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                accept="image/*">
                                        </div>

                                        <!-- Image Preview - Site Favicon এর নিচে -->
                                        <div class="mb-4">
                                            <label class="block mb-2 font-medium text-gray-700">Current Favicon</label>
                                            <div
                                                class="w-24 h-24 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 hover:bg-gray-100 cursor-pointer overflow-hidden">
                                                <img src="{{ asset($settings->site_favicon ?? 'https://placehold.co/600x400/EEE/000?font=lora&text=Favicon') }}"
                                                    class="w-full h-full object-cover img-preview" alt="Favicon Preview"
                                                    id="favicon-preview">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Copy Right Section -->
                                    <div class="w-1/2">
                                        <div class="mb-4">
                                            <label for="copy_right" class="block mb-2 font-medium text-gray-700">Copy
                                                Right</label>
                                            <input type="text" id="copy_right" name="copy_right"
                                                class="w-full px-4 py-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                                value="© 2024 Your Website Name. All rights reserved."
                                                placeholder="Enter Copy Right....">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Save Button -->
                            <button type="submit" name="website"
                                class="flex items-center px-2 py-3 font-medium text-white transition-all duration-200 bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                <i class="mr-2 fas fa-save"></i>Save Website Settings
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Social Link Tab -->
                <div id="social-links" class="hidden tab-pane">
                    <div class="border-b border-purple-200 bg-gradient-to-r from-purple-50 to-purple-100">
                        <h4 class="flex items-center py-4 text-2xl font-semibold text-purple-700">
                            <i class="mr-2 fas fa-share-alt"></i>Social Media Links
                        </h4>
                    </div>
                    <div class="p-4 border border-purple-200">
                        <form action="{{ route('website-settings.update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="flex items-center justify-between gap-2">
                                <div class="w-1/2 mb-4 mr-2">
                                    <label for="facebook_url" class="block mb-2 font-medium text-gray-700">Facebook
                                        Url</label>
                                    <input type="text" id="facebook_url"name="facebook_url"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        value="{{ old('facebook_url', $settings->facebook_url) }}"
                                        placeholder="Enter Facebook Url....">
                                </div>
                                <div class="w-1/2 mb-4 mr-2">
                                    <label for="twitter_url" class="block mb-2 font-medium text-gray-700">Twitter
                                        Url</label>
                                    <input type="text" id="twitter_url" name="twitter_url"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        value="{{ old('twitter_url', $settings->twitter_url) }}"
                                        placeholder="Enter Twitter Url....">
                                </div>
                                <div class="w-1/2 mb-4 mr-2">
                                    <label for="instagram_url" class="block mb-2 font-medium text-gray-700">Instagram
                                        Url</label>
                                    <input type="text" id="instagram_url" name="instagram_url"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        value="{{ old('instagram_url', $settings->instagram_url) }}"
                                        placeholder="Enter Instagram Url....">
                                </div>
                                <div class="w-1/2 mb-4 mr-2">
                                    <label for="linkedin_url" class="block mb-2 font-medium text-gray-700">linkedin
                                        Url</label>
                                    <input type="text" id="linkedin_url" name="linkedin_url"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        value="{{ old('linkedin_url', $settings->linkedin_url) }}"
                                        placeholder="Enter linkedin Url....">
                                </div>
                            </div>

                            <!-- Save Button -->
                            <button type="submit" name="social_links"
                                class="flex items-center px-2 py-3 font-medium text-white transition-all duration-200 bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                <i class="mr-2 fas fa-sync-alt"></i>Update Social Links
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Page Seo Tab -->
                <div id="page-seo" class="hidden tab-pane">
                    <div class="border-b border-green-200 bg-gradient-to-r from-green-50 to-green-100">
                        <h4 class="flex items-center py-4 text-2xl font-semibold text-green-700">
                            <i class="mr-2 fas fa-search"></i>Search Engine Optimization
                        </h4>
                    </div>
                    <div class="p-4 border border-green-200">
                        <form action="{{ route('website-settings.update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-4 mr-2">
                                <label for="meta_title" class="block mb-2 font-medium text-gray-700">Meta Title</label>
                                <input type="text" id="meta_title" name="meta_title"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    value="{{ old('meta_title', $settings->meta_title) }}"
                                    placeholder="Enter Meta Title....">
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="w-1/2 mb-4 mr-2">
                                    <label for="meta_keywords" class="block mb-2 font-medium text-gray-700">Meta
                                        Keywords</label>
                                    <textarea name="meta_keywords" id="meta_keywords"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        value="{{ old('meta_keywords', $settings->meta_keywords) }}" placeholder="Enter Meta Keywords...."...."
                                        cols="30" rows="10">{{ $settings->meta_keywords }}</textarea>
                                </div>
                                <div class="w-1/2 mb-4 mr-2">
                                    <label for="meta_description" class="block mb-2 font-medium text-gray-700">Meta
                                        Description</label>
                                    <textarea name="meta_description" id="meta_description"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        value="{{ old('meta_description', $settings->meta_description) }}" placeholder="Enter Meta Description...."
                                        cols="30" rows="10">{{ $settings->meta_description }}</textarea>
                                </div>
                            </div>

                            <!-- Save Button -->
                            <button type="submit" name="seo_settings"
                                class="flex items-center px-2 py-3 font-medium text-white transition-all duration-200 bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                <i class="mr-2 fas fa-save"></i>Save SEO Settings
                            </button>
                        </form>
                    </div>
                </div>
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

                // Delete confirmation
                function ResetData(event) {
                    event.preventDefault();
                    const form = event.target.closest('form');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't  To Default Data Reset",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Data Reset'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                }


                // Image upload & Preview
                function PreviewImage() {
                    const image = document.querySelector('#image');
                    const imgPreview = document.querySelector('.img-preview');
                    imgPreview.style.display = 'block';

                    const reader = new FileReader();
                    reader.readAsDataURL(image.files[0]);
                    reader.onload = function(reader) {
                        imgPreview.src = reader.target.result;
                    }
                }

                // const imageUpload = document.getElementById("imageUpload");
                // const preview = document.getElementById("preview");
                // const previewImg = document.getElementById("previewImg");

                // imageUpload.addEventListener("change", (event) => {
                //     const file = event.target.files[0];
                //     if (file) {
                //         preview.classList.remove("hidden");
                //         previewImg.src = URL.createObjectURL(file);
                //     }
                // });

                // Image preview functionality
                document.getElementById('site_favicon').addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            document.getElementById('favicon-preview').src = e.target.result;
                        }
                        reader.readAsDataURL(file);
                    }
                });
            </script>
        @endpush


</x-admin-layout>
