<x-admin-layout>

   @section('content')
   <div class="p-4 mx-auto">
      <div class="flex items-center justify-between mb-6">
         <h1 class="text-3xl font-bold text-gray-800">Website Settings</h1>
         {{-- //onsubmit="return confirm('Are you sure you want to reset all settings to default? This action cannot be undone.')" --}}
         <!-- Reset Button -->
         <form action="{{ route('website-settings.reset') }}" method="POST">
            @csrf
            <button onclick="ResetData(event)" type="submit"
               class="px-4 py-2 text-white transition-colors rounded-lg bg-green-950 bg-gradient-to-r from-green-500 to-green-800 hover:bg-blue-700">
               <i class="mr-2 fas fa-undo"></i>Reset to Default
            </button>
         </form>
      </div>

      <!-- Success/Error Messages -->
      @if (session('success'))
      <div class="p-4 mb-6 text-green-700 bg-green-100 border border-green-400 rounded-lg">
         <i class="mr-2 fas fa-check-circle"></i>{{ session('success') }}
      </div>
      @endif

      @if (session('error'))
      <div class="p-4 mb-6 text-red-700 bg-red-100 border border-red-400 rounded-lg">
         <i class="mr-2 fas fa-exclamation-circle"></i>{{ session('error') }}
      </div>
      @endif

      @if ($errors->any())
      <div class="p-4 mb-6 text-red-700 bg-red-100 border border-red-400 rounded-lg">
         <i class="mr-2 fas fa-exclamation-triangle"></i>Please correct the following errors:
         <ul class="mt-2 ml-4">
            @foreach ($errors->all() as $error)
            <li class="list-disc">{{ $error }}</li>
            @endforeach
         </ul>
      </div>
      @endif

      <div class="bg-white border rounded-lg shadow-sm">
         <!-- Tab Navigation -->
         <div class="flex flex-wrap px-3 py-2 bg-white border-b border-gray-200 rounded-t-lg">
            <button type="button"
               class="px-4 py-3 font-medium text-blue-600 transition-colors duration-200 border-b-2 border-blue-600 tab-button focus:outline-none"
               data-tab="website-info" aria-selected="true">
               <i class="mr-2 fas fa-cog"></i>Website Settings
            </button>
            <button type="button"
               class="px-4 py-3 font-medium text-gray-600 transition-colors duration-200 border-b-2 border-transparent tab-button hover:text-blue-600 hover:border-blue-300 focus:outline-none"
               data-tab="social-links" aria-selected="false">
               <i class="mr-2 fas fa-share-alt"></i>Social Links
            </button>
            <button type="button"
               class="px-4 py-3 font-medium text-gray-600 transition-colors duration-200 border-b-2 border-transparent tab-button hover:text-blue-600 hover:border-blue-300 focus:outline-none"
               data-tab="page-seo" aria-selected="false">
               <i class="mr-2 fas fa-search"></i>Page SEO
            </button>
         </div>

         <!-- Tab Content Container -->
         <div class="tab-content">
            <!-- Website Info Tab -->
            <div id="website-info" class="tab-pane active">
               <div class="border-b border-blue-200 bg-gradient-to-r from-blue-50 to-blue-100">
                  <h4 class="flex items-center px-4 py-4 text-2xl font-semibold text-blue-700">
                     <i class="mr-2 fas fa-info-circle"></i>Website Information
                  </h4>
               </div>
               <div class="p-6">
                  <form class="space-y-6" action="{{ route('website-settings.update') }}" method="POST"
                     enctype="multipart/form-data">
                     @csrf
                     @method('PUT')
                     <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                        <div>
                           <label for="site_name" class="block mb-2 font-medium text-gray-700">
                              <i class="mr-1 fas fa-globe"></i>Site Name *
                           </label>
                           <input type="text" id="site_name" name="site_name" required
                              class="w-full px-4 py-3 transition-all duration-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                              value="{{ old('site_name', $settings->site_name) }}"
                              placeholder="Enter Site Name...">
                        </div>

                        <div>
                           <label for="site_phone" class="block mb-2 font-medium text-gray-700">
                              <i class="mr-1 fas fa-phone"></i>Site Phone
                           </label>
                           <input type="tel" id="site_phone" name="site_phone"
                              class="w-full px-4 py-3 transition-all duration-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                              value="{{ old('site_phone', $settings->site_phone) }}"
                              placeholder="Enter Site Phone...">
                        </div>

                        <div>
                           <label for="site_email" class="block mb-2 font-medium text-gray-700">
                              <i class="mr-1 fas fa-envelope"></i>Site Email *
                           </label>
                           <input type="email" id="site_email" name="site_email" required
                              class="w-full px-4 py-3 transition-all duration-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                              value="{{ old('site_email', $settings->site_email) }}"
                              placeholder="Enter Site Email...">
                        </div>
                     </div>

                     <div>
                        <label for="site_address" class="block mb-2 font-medium text-gray-700">
                           <i class="mr-1 fas fa-map-marker-alt"></i>Site Address
                        </label>
                        <textarea id="site_address" name="site_address" rows="4"
                           class="w-full px-4 py-3 transition-all duration-200 border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Enter your complete address...">{{ old('site_address', $settings->site_address) }}</textarea>
                     </div>

                     <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                           <label for="site_logo" class="block mb-2 font-medium text-gray-700">
                              <i class="mr-1 fas fa-image"></i>Site Logo
                           </label>

                           <div class="p-3 mb-3 rounded-lg bg-gray-50">
                              <img src="{{ $settings->site_logo }}" alt="Current Logo" class="object-contain h-16">
                              <button type="button" onclick="deleteFile('logo')" class="mt-2 text-sm text-red-600 hover:text-red-800">
                                 <i class="mr-1 fas fa-trash"></i>Remove Logo
                              </button>

                           </div>

                           {{-- <img src="{{ asset($settings->site_logo) }}" alt="Current Logo"
                           class="object-contain h-16"> --}}

                           <input type="file" id="site_logo" name="site_logo" accept="image/*"
                              class="w-full px-4 py-3 transition-all duration-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                           <p class="mt-1 text-sm text-gray-500">Recommended: ICO, PNG (16x16 or 32x32)</p>
                        </div>
                     </div>

                     <div>
                        <label for="copy_right" class="block mb-2 font-medium text-gray-700">
                           <i class="mr-1 fas fa-copyright"></i>Copyright Text
                        </label>
                        <input type="text" id="copy_right" name="copy_right"
                           class="w-full px-4 py-3 transition-all duration-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           value="{{ old('copy_right', $settings->copy_right) }}"
                           placeholder="© 2024 Your Company Name. All rights reserved.">
                     </div>

                     <button type="submit" name="website" value="1"
                        class="flex items-center px-8 py-3 font-medium text-white transition-all duration-200 bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <i class="mr-2 fas fa-save"></i>Save Website Settings
                     </button>
                  </form>
               </div>
            </div>

            <!-- Social Links Tab -->
            <div id="social-links" class="hidden tab-pane">
               <div class="border-b border-purple-200 bg-gradient-to-r from-purple-50 to-purple-100">
                  <h4 class="flex items-center px-4 py-4 text-2xl font-semibold text-purple-700">
                     <i class="mr-2 fas fa-share-alt"></i>Social Media Links
                  </h4>
               </div>
               <div class="p-6">
                  <form class="space-y-6" action="{{ route('website-settings.update') }}" method="POST">
                     @csrf
                     @method('PUT')

                     <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                           <label for="facebook_url" class="block mb-2 font-medium text-gray-700">
                              <i class="mr-2 text-blue-600 fab fa-facebook-f"></i>Facebook URL
                           </label>
                           <input type="url" id="facebook_url" name="facebook_url"
                              class="w-full px-4 py-3 transition-all duration-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                              value="{{ old('facebook_url', $settings->facebook_url) }}"
                              placeholder="https://facebook.com/yourpage">
                        </div>

                        <div>
                           <label for="twitter_url" class="block mb-2 font-medium text-gray-700">
                              <i class="mr-2 text-blue-400 fab fa-twitter"></i>Twitter URL
                           </label>
                           <input type="url" id="twitter_url" name="twitter_url"
                              class="w-full px-4 py-3 transition-all duration-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                              value="{{ old('twitter_url', $settings->twitter_url) }}"
                              placeholder="https://twitter.com/yourhandle">
                        </div>

                        <div>
                           <label for="instagram_url" class="block mb-2 font-medium text-gray-700">
                              <i class="mr-2 text-pink-500 fab fa-instagram"></i>Instagram URL
                           </label>
                           <input type="url" id="instagram_url" name="instagram_url"
                              class="w-full px-4 py-3 transition-all duration-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                              value="{{ old('instagram_url', $settings->instagram_url) }}"
                              placeholder="https://instagram.com/youraccount">
                        </div>

                        <div>
                           <label for="linkedin_url" class="block mb-2 font-medium text-gray-700">
                              <i class="mr-2 text-blue-700 fab fa-linkedin"></i>LinkedIn URL
                           </label>
                           <input type="url" id="linkedin_url" name="linkedin_url"
                              class="w-full px-4 py-3 transition-all duration-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                              value="{{ old('linkedin_url', $settings->linkedin_url) }}"
                              placeholder="https://linkedin.com/company/yourcompany">
                        </div>

                        <div>
                           <label for="youtube_url" class="block mb-2 font-medium text-gray-700">
                              <i class="mr-2 text-red-600 fab fa-youtube"></i>YouTube URL
                           </label>
                           <input type="url" id="youtube_url" name="youtube_url"
                              class="w-full px-4 py-3 transition-all duration-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                              value="{{ old('youtube_url', $settings->youtube_url) }}"
                              placeholder="https://youtube.com/channel/yourchannel">
                        </div>

                        <div>
                           <label for="tiktok_url" class="block mb-2 font-medium text-gray-700">
                              <i class="mr-2 text-gray-800 fab fa-tiktok"></i>TikTok URL
                           </label>
                           <input type="url" id="tiktok_url" name="tiktok_url"
                              class="w-full px-4 py-3 transition-all duration-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                              value="{{ old('tiktok_url', $settings->tiktok_url) }}"
                              placeholder="https://tiktok.com/@youraccount">
                        </div>
                     </div>

                     <button type="submit" name="social_links" value="1"
                        class="flex items-center px-8 py-3 font-medium text-white transition-all duration-200 bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                        <i class="mr-2 fas fa-sync-alt"></i>Update Social Links
                     </button>
                  </form>
               </div>
            </div>

            <!-- Page SEO Tab -->
            <div id="page-seo" class="hidden tab-pane">
               <div class="border-b border-green-200 bg-gradient-to-r from-green-50 to-green-100">
                  <h4 class="flex items-center px-4 py-4 text-2xl font-semibold text-green-700">
                     <i class="mr-2 fas fa-search"></i>Search Engine Optimization
                  </h4>
               </div>
               <div class="p-6">
                  <form class="space-y-6" action="{{ route('website-settings.update') }}" method="POST">
                     @csrf
                     @method('PUT')

                     <div>
                        <label for="meta_title" class="block mb-2 font-medium text-gray-700">
                           <i class="mr-1 fas fa-heading"></i>Meta Title *
                        </label>
                        <input type="text" id="meta_title" name="meta_title" required maxlength="60"
                           class="w-full px-4 py-3 transition-all duration-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           value="{{ old('meta_title', $settings->meta_title) }}"
                           placeholder="Enter Meta Title (recommended: 50-60 characters)">
                        <p class="mt-1 text-sm text-gray-500">
                           <span id="title-count">{{ strlen($settings->meta_title ?? '') }}</span>/60
                           characters
                        </p>
                     </div>

                     <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                           <label for="meta_keywords" class="block mb-2 font-medium text-gray-700">
                              <i class="mr-1 fas fa-tags"></i>Meta Keywords
                           </label>
                           <textarea name="meta_keywords" id="meta_keywords" rows="6"
                              class="w-full px-4 py-3 transition-all duration-200 border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                              placeholder="Enter keywords separated by commas (e.g., web design, seo, digital marketing)">{{ old('meta_keywords', $settings->meta_keywords) }}</textarea>
                           <p class="mt-1 text-sm text-gray-500">Separate keywords with commas</p>
                        </div>

                        <div>
                           <label for="meta_description" class="block mb-2 font-medium text-gray-700">
                              <i class="mr-1 fas fa-align-left"></i>Meta Description *
                           </label>
                           <textarea name="meta_description" id="meta_description" rows="6" required maxlength="160"
                              class="w-full px-4 py-3 transition-all duration-200 border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                              placeholder="Enter meta description (recommended: 150-160 characters)">{{ old('meta_description', $settings->meta_description) }}</textarea>
                           <p class="mt-1 text-sm text-gray-500">
                              <span
                                 id="desc-count">{{ strlen($settings->meta_description ?? '') }}</span>/160
                              characters
                           </p>
                        </div>
                     </div>

                     <div class="p-4 border-l-4 border-blue-400 rounded-r-lg bg-blue-50">
                        <div class="flex">
                           <div class="flex-shrink-0">
                              <i class="text-blue-400 fas fa-lightbulb"></i>
                           </div>
                           <div class="ml-3">
                              <h3 class="text-sm font-medium text-blue-800">SEO Tips</h3>
                              <div class="mt-2 text-sm text-blue-700">
                                 <ul class="pl-5 space-y-1 list-disc">
                                    <li>Keep meta titles under 60 characters for best display</li>
                                    <li>Write compelling meta descriptions between 150-160 characters</li>
                                    <li>Use relevant keywords naturally in your content</li>
                                    <li>Each page should have unique meta tags</li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>

                     <button type="submit" name="seo_settings" value="1"
                        class="flex items-center px-8 py-3 font-medium text-white transition-all duration-200 bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        <i class="mr-2 fas fa-save"></i>Save SEO Settings
                     </button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>

   <script>
      // Tab switching functionality
      document.addEventListener('DOMContentLoaded', function() {
         const tabButtons = document.querySelectorAll('.tab-button');
         const tabPanes = document.querySelectorAll('.tab-pane');

         tabButtons.forEach(button => {
            button.addEventListener('click', function() {
               const targetTab = this.getAttribute('data-tab');

               // Remove active states
               tabButtons.forEach(btn => {
                  btn.classList.remove('text-blue-600', 'border-blue-600');
                  btn.classList.add('text-gray-600', 'border-transparent');
                  btn.setAttribute('aria-selected', 'false');
               });

               tabPanes.forEach(pane => {
                  pane.classList.add('hidden');
                  pane.classList.remove('active');
               });

               // Add active state to clicked button
               this.classList.remove('text-gray-600', 'border-transparent');
               this.classList.add('text-blue-600', 'border-blue-600');
               this.setAttribute('aria-selected', 'true');

               // Show target tab pane
               const targetPane = document.getElementById(targetTab);
               if (targetPane) {
                  targetPane.classList.remove('hidden');
                  targetPane.classList.add('active');
               }
            });
         });

         // Character counting for SEO fields
         const metaTitle = document.getElementById('meta_title');
         const metaDescription = document.getElementById('meta_description');
         const titleCount = document.getElementById('title-count');
         const descCount = document.getElementById('desc-count');

         if (metaTitle && titleCount) {
            metaTitle.addEventListener('input', function() {
               titleCount.textContent = this.value.length;
               if (this.value.length > 60) {
                  titleCount.classList.add('text-red-600');
               } else {
                  titleCount.classList.remove('text-red-600');
               }
            });
         }

         if (metaDescription && descCount) {
            metaDescription.addEventListener('input', function() {
               descCount.textContent = this.value.length;
               if (this.value.length > 160) {
                  descCount.classList.add('text-red-600');
               } else {
                  descCount.classList.remove('text-red-600');
               }
            });
         }

         // Form validation
         const forms = document.querySelectorAll('form');
         forms.forEach(form => {
            form.addEventListener('submit', function(e) {
               const requiredFields = form.querySelectorAll('[required]');
               let hasErrors = false;

               requiredFields.forEach(field => {
                  if (!field.value.trim()) {
                     field.classList.add('border-red-500');
                     hasErrors = true;
                  } else {
                     field.classList.remove('border-red-500');
                  }
               });

               if (hasErrors) {
                  e.preventDefault();
                  alert('Please fill in all required fields.');
               }
            });
         });
      });

      // File deletion function
      function deleteFile(fileType) {
         if (!confirm(`Are you sure you want to delete the ${fileType}?`)) {
            return;
         }

         fetch("{{ route('website-settings.delete-file') }}", {
               method: 'DELETE',
               headers: {
                  'Content-Type': 'application/json',
                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
               },
               body: JSON.stringify({
                  file_type: fileType
               })
            })
            .then(response => response.json())
            .then(data => {
               if (data.success) {
                  location.reload();
               } else {
                  alert(data.message || 'Error deleting file');
               }
            })
            .catch(error => {
               console.error('Error:', error);
               alert('Error deleting file');
            });
      }


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
   </script>
   @endsection

</x-admin-layout>