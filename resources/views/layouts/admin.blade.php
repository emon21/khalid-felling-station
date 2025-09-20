<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'Admin Dashboard' }}</title>
    <!-- Include PHP Flasher CSS -->
    {{-- <link href="{{ asset('flasher/flasher.min.css') }}" rel="stylesheet"> --}}
</head>

<body class="bg-gray-100">

    <!-- Mobile overlay -->
    <div id="overlay" class="fixed inset-0 z-40 hidden bg-black bg-opacity-50 md:hidden"></div>

    <!-- Sidebar -->
    <x-sidebar />

    <!-- Main content wrapper -->
    <div class="flex flex-col flex-1 transition-all duration-300 md:ml-64">

        <!-- Top Navbar -->
        <x-topbar />

        <!-- Main content -->
        <main class="flex-1 p-6 transition-colors duration-300 bg-gray-100 dark:bg-gray-900">
            @yield('content')
        </main>

    </div>

    <!-- Include PHP Flasher JavaScript -->
    {{-- <script src="{{ asset('flasher/flasher.min.js') }}"></script> --}}

    <!-- Include PHP flasher JS -->
    <script src="{{ asset('flasher') }}/flasher.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- <script>
//    flasher.error('An error occurred while processing your request.');
flasher.success('Your product has been created successfully!', 'Store Data');
</script> --}}
@if(session('alert'))
<script>
//    flasher.error('An error occurred while processing your request.');
// flasher.success('Your product has been created successfully!', 'Store Data');
 flasher["{{ session('alert.type') }}"](
                    // "{{ session('alert.type') }}",
                    "{{ session('alert.message') }}",
                    "{{ session('alert.title') }}"

                    );
</script>
@endif

    {{-- @if (session('alert'))
    <script>
        Swal.fire({
            icon: "{{ session('alert.type') }}",
            title: "{{ session('alert.title') }}",
            text: "{{ session('alert.message') }}",
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
    </script>
@endif --}}

    <!-- Render Flash Notifications -->
    {{-- @flasher_render --}}
    <script>
        //  @if (session('Success'))
        //         // CustomMessage('{{ session('alert.type') }}', '{{ session('alert.title') }}',
        //         //     '{{ session('alert.message') }}');
        //         // CustomMessage('{{ session('alert.type') }}', '{{ session('alert.title') }}',
        //         //     '{{ session('alert.message') }}');

        //             // flasher message
        //             flasher["{{ session('alert.type') }}"](
        //             // "{{ session('alert.type') }}",
        //             "{{ session('alert.message') }}",
        //             "{{ session('alert.title') }}"

        //             );

        //             // flasher.success('Your product has been created successfully!', 'Hello');
        //             // flasher.success('{{ session('alert.title') }}');

        //         //     CustomMessage('{{ session('alert.type') }}', '{{ session('alert.title') }}', '{{ session('alert.message') }}');
        //     @endif

        //    flasher.success('Your product has been created successfully!', 'Success');

            //flash()->success('Your profile has been updated successfully.', 'Profile Updated');

            </script>

     {{-- Flasher notification --}}
    {{-- {!! flasher_render() !!} --}}

    <script>
        // Mobile sidebar toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        mobileMenuBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });

        // Sidebar profile dropdown
        const profileBtn = document.getElementById('profileBtnSidebar');
        const profileDropdown = document.getElementById('profileDropdownSidebar');
        const profileArrow = document.getElementById('profileArrow');

        profileBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            profileDropdown.classList.toggle('hidden');
            profileArrow.classList.toggle('rotate-180');
        });

        // Top user dropdown with outside click detection
        const topUserBtn = document.getElementById('topUserBtn');
        const topUserDropdown = document.getElementById('topUserDropdown');
        const topUserArrow = document.getElementById('topUserArrow');

        topUserBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            topUserDropdown.classList.toggle('hidden');
            topUserArrow.classList.toggle('rotate-180');
        });

        topUserDropdown.addEventListener('click', (e) => e.stopPropagation());

        document.addEventListener('click', () => {
            if (!topUserDropdown.classList.contains('hidden')) {
                topUserDropdown.classList.add('hidden');
                topUserArrow.classList.remove('rotate-180');
            }
            if (!profileDropdown.classList.contains('hidden')) {
                profileDropdown.classList.add('hidden');
                profileArrow.classList.remove('rotate-180');
            }
        });

        // Delete confirmation
        function ConfirmDelete(event) {
            event.preventDefault();
            const form = event.target.closest('form');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }

// function deleteConfirmation(id) {
//     Swal.fire({
//         title: "Are you sure?",
//         text: "You won’t be able to revert this!",
//         icon: "warning",
//         showCancelButton: true,
//         confirmButtonColor: "#3085d6",
//         cancelButtonColor: "#d33",
//         confirmButtonText: "Yes, delete it!"
//     }).then((result) => {
//         if (result.isConfirmed) {
//             document.getElementById('delete-form-' + id).submit();
//         }
//     });
// }
        
    </script>
    @stack('script')
</body>
</html>
