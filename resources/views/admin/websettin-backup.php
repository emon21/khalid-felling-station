<x-admin-layout>
   @section('content')
   <style>
      .img-preview {
         display: none;
         width: 200px;
         height: 200px;
         object-fit: cover;
         margin-top: 10px;
         border: 2px solid #ddd;
         border-radius: 8px;
      }
   </style>
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
                     <div class="w-1/2 mb-4 mr-2">
                        <label for="site_name" class="block mb-2 font-medium text-gray-700">Site Name</label>
                        <input type="text" id="site_name" name="site_name"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           value="{{ old('site_name', $settings->site_name) }}"
                           placeholder="Enter Site Name....">
                     </div>
                     <div class="w-1/2 mb-4 mr-2">
                        <label for="site_phone" class="block mb-2 font-medium text-gray-700">Site Phone</label>
                        <input type="text" id="site_phone" name="site_phone"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           value="{{ old('site_phone', $settings->site_phone) }}"
                           placeholder="Enter Site Phone....">
                     </div>
                     <div class="w-1/2 mb-4 mr-2">
                        <label for="site_email" class="block mb-2 font-medium text-gray-700">Site Email</label>
                        <input type="text" id="site_email" name="site_email"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           value="{{ old('site_email', $settings->site_email) }}"
                           placeholder="Enter Site Email....">
                     </div>
                  </div>

                  <div class="mb-4">
                     <label for="site_address"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Site
                        Address</label>
                     <textarea id="site_address" name="site_address" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your thoughts here...." value="{{ old('site_address', $settings->site_address) }}">{{ $settings->site_address }}</textarea>
                  </div>

                  <div class="mb-4">
                     <label for="site_logo" class="block mb-2 font-medium text-gray-700">site_logo</label>
                     <input type="file" id="site_logo" name="site_logo"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        value="{{ old('site_logo') }}">
                     <img src="{{ asset('images/logo.png') }}" alt="Site Logo" width="150" height="50">
                     <img src="{{ asset(Storage::url($settings->site_logo ?? 'images/default-logo.png')) }}"
                        alt="Site Logo">
                  </div>

                  <div class="flex items-center justify-start rounded-lg shadow-md ">

                     <div>
                        <h2 class="mb-4 text-lg font-semibold text-gray-700">Upload Image</h2>
                        <label for="imageUpload"
                           class="flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">

                           <div class="flex flex-col items-center justify-center px-5 pt-5 pb-6">
                              <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6H16a5 5 0 011 9.9M15 13l-3-3-3 3m3-3v12" />
                              </svg>
                              <p class="text-sm text-gray-500">Click to upload or drag & drop</p>
                              <p class="text-xs text-gray-400">PNG, JPG, GIF up to 5MB</p>
                           </div>

                           <input id="imageUpload" type="file" class="hidden" />
                        </label>
                     </div>


                     <!-- Preview -->
                     <h2 class="mb-4 text-lg font-semibold text-gray-700">Preview Image</h2>
                     <div id="preview" class="hidden w-48 h-48 px-6 mt-4">

                        <img id="previewImg" class="object-cover border rounded-lg">
                     </div>
                  </div>

                  <div class="mb-4">
                     <label for="image_upload" class="block text-sm font-medium text-gray-700">Upload Image</label>
                     <input type="file" id="image_upload" name="image_upload" accept="image/*" class="block w-full mt-1 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                     <p class="mt-1 text-xs text-gray-500">JPG, PNG, GIF (MAX. 10MB)</p>
                  </div>


                  <div class="flex items-center justify-center w-full">
                     <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                           <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                           </svg>
                           <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                           <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" />
                     </label>
                  </div>



                  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
                  <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
                  <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>


                  <div class="flex items-center justify-between">
                     <div class="w-1/2 mb-4 mr-2">

                        <label for="site_favicon" class="block mb-2 font-medium text-gray-700">Site
                           Favicon</label>
                        <input type="text" id="site_favicon"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           value="{{ old('site_favicon') }}" placeholder="Enter Site Favicon....">

                     </div>
                     <form>
                        <input type="file" id="image" name="image" accept="image/*"
                           onchange="PreviewImage()">
                        <br>
                        <img class="img-preview" alt="Image Preview">
                     </form>






                     <div class="w-1/2 mb-4 mr-2">
                        <label for="copy_right" class="block mb-2 font-medium text-gray-700">Copy
                           Right</label>
                        <input type="text" id="copy_right" name="copy_right"
                           class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           value="{{ old('copy_right', $settings->copy_right) }}"
                           placeholder="Enter Copy Right....">
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




         <div class="flex flex-col items-center">
            <div class="relative w-6/12 h-48 bg-white rounded-lg ">
               <img id="avatarPreview" class="object-cover w-full h-48 border-2 border-gray-200 border-dashed rounded-lg shadow-md"
                  src="https://via.placeholder.com/150" alt="Avatar">

               <label for="avatarUpload"
                  class="absolute bottom-0 right-0 p-2 transition duration-300 ease-in-out delay-150 opacity-75 cursor-pointer hover:-translate-y-1 hover:scale-110">
                  {{-- <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 3a2 2 0 00-2 2v12a2 2 0
                         002 2h12a2 2 0 002-2V7.414A2 2
                         0 0017.586 6L14 2.414A2 2 0
                         0012.586 2H4z" />
                            </svg> --}}
                  <div class="flex flex-col items-center justify-center pt-5 pb-6">
                     <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                           d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6H16a5 5 0 011 9.9M15 13l-3-3-3 3m3-3v12" />
                     </svg>
                     <p class="text-sm text-gray-500">Click to upload or drag & drop</p>
                     <p class="text-xs text-gray-400">PNG, JPG, GIF up to 5MB</p>
                  </div>

                  {{-- <svg class="w-10 text-gray-400 " fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6H16a5 5 0 011 9.9M15 13l-3-3-3 3m3-3v12" />
 
</svg> --}}

                  {{-- <svg class="w-10 mb-3 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6H16a5 5 0 011 9.9M15 13l-3-3-3 3m3-3v12" />
                                        </svg> --}}
                  <input id="avatarUpload" type="file" accept="image/*" class="hidden" />
               </label>
            </div>
            <p class="mt-2 text-sm text-gray-500">Upload Profile Picture</p>
         </div>



         {{-- <div class="max-w-2xl p-6 mx-auto bg-white border border-gray-200 shadow-sm rounded-xl">
    <h2 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">Upload Images</h2>

    <!-- Drop Zone -->
    <div id="dropZone"
        class="p-8 text-center transition-all duration-200 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer hover:border-gray-400 bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
        <div id="uploadIcon" class="w-12 h-12 mx-auto mb-4 text-gray-400">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-full h-full">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
            </svg>
        </div>
        <p class="mb-2 text-lg font-medium text-gray-900 dark:text-white">Drop your images here</p>
        <p class="mb-4 text-sm text-gray-500 dark:text-gray-400">or click to browse files (PNG, JPG, GIF, up to 5MB)</p>
        <button id="browseBtn"
            class="px-6 py-2 font-medium text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Choose Files
        </button>
        <input id="fileInput" type="file" multiple accept="image/*" class="hidden" aria-label="Upload images">
    </div>

    <!-- Preview Area -->
    <div id="previewArea" class="grid hidden grid-cols-1 gap-4 mt-6 sm:grid-cols-2 lg:grid-cols-3">
        <!-- Image previews will be dynamically added here -->
    </div>

</div> --}}




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
                        <input type="text" id="facebook_url" name="facebook_url"
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
                           value="{{ old('meta_keywords', $settings->meta_keywords) }}" placeholder="Enter Meta Keywords...." ...."
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
         // function PreviewImage(){
         //     const image = document.querySelector('#image');
         //     const imgPreview = document.querySelector('.img-preview');
         //     imgPreview.style.display = 'block';
         //     const oFReader = new FileReader();
         //     oFReader.readAsDataURL(image.files[0]);
         //     oFReader.onload = function(oFREvent){
         //         imgPreview.src = oFREvent.target.result;
         //     }


         // }

         // Image upload & Preview
         function PreviewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
               imgPreview.src = oFREvent.target.result;
            }
         }

         //             document.getElementById('profileInput').onchange = function(event) {
         //     const file = event.target.files[0];
         //     if (file) {
         //         const reader = new FileReader();
         //         reader.onload = function(e) {
         //             document.getElementById('preview').src = e.target.result;
         //             document.getElementById('preview').style.display = 'block';
         //         };
         //         reader.readAsDataURL(file);
         //     }
         // };

         const imageUpload = document.getElementById("imageUpload");
         const preview = document.getElementById("preview");
         const previewImg = document.getElementById("previewImg");

         imageUpload.addEventListener("change", (e) => {
            const file = e.target.files[0];
            if (file) {
               preview.classList.remove("hidden");
               previewImg.src = URL.createObjectURL(file);
            }
         });


         const avatarUpload = document.getElementById("avatarUpload");
         const avatarPreview = document.getElementById("avatarPreview");

         avatarUpload.addEventListener("change", (e) => {
            const file = e.target.files[0];
            if (file) {
               avatarPreview.src = URL.createObjectURL(file);
            }
         });
      </script>
      @endpush


</x-admin-layout>