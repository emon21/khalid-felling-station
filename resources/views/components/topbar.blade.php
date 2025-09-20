<header class="flex items-center justify-between bg-white dark:bg-gray-800 shadow px-4 py-3">
    <!-- Left side: Mobile menu & page title -->
    <div class="flex items-center space-x-4">
        <button id="mobileMenuBtn"
            class="md:hidden p-2 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none">
            ☰
        </button>
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Dashboard</h1>
    </div>

    <!-- Right side -->
    <div class="flex items-center space-x-4">
        <!-- Search -->
        <div class="hidden md:flex items-center bg-gray-100 dark:bg-gray-700 rounded-lg px-3 py-1">
            <input type="text" placeholder="Search..."
                class="bg-transparent outline-none text-gray-700 dark:text-gray-200" />
            <svg class="w-5 h-5 text-gray-500 dark:text-gray-300 ml-2" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
            </svg>
        </div>

        <!-- Notifications -->
        <button
            class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none relative text-gray-700 dark:text-gray-300">
            🔔
            <span class="absolute top-0 right-0 inline-block w-2 h-2 bg-red-500 rounded-full"></span>
        </button>

        <!-- User dropdown -->
        <div class="relative">
            <button id="topUserBtn"
                class="flex items-center space-x-2 p-1 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none">
                <img src="https://i.pravatar.cc/32" alt="User" class="w-8 h-8 rounded-full" />
                <span
                    class="hidden md:block text-gray-800 dark:text-gray-100 font-medium">{{ Auth::user()->name }}</span>
                <svg id="topUserArrow"
                    class="w-4 h-4 text-gray-500 dark:text-gray-300 transition-transform duration-300" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div id="topUserDropdown"
                class="hidden absolute right-0 mt-2 w-44 bg-white dark:bg-gray-700 shadow-lg rounded-md overflow-hidden z-50">
                <a href="#"
                    class="block px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">Profile</a>
                <a href="#"
                    class="block px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">Settings</a>

                <!-- Authentication -->

                {{-- <form action="{{ route('logout') }}" method="POST" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                           @csrf
                           <button class="block px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600"> {{ __('Log Out') }}</button>
                        </form> --}}

                <form action="{{ route('logout') }}" method="POST"
                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    @csrf
                    <button
                        class="w-full block text-left px-4 py-2 text-gray-100 bg-red-500 hover:bg-red-600">Logout</button>
                </form>
            </div>
        </div>
    </div>
</header>
