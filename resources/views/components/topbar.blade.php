<header class="flex items-center justify-between px-4 py-3 bg-white shadow dark:bg-gray-800">
    <!-- Left side: Mobile menu & page title -->
    <div class="flex items-center space-x-4">
        <button id="mobileMenuBtn"
            class="p-2 text-gray-700 rounded-lg md:hidden dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none">
            ☰
        </button>
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Dashboard</h1>
    </div>

    <!-- Right side -->
    <div class="flex items-center space-x-4">
        <!-- Search -->
        <div class="items-center hidden px-3 py-1 bg-gray-100 rounded-lg md:flex dark:bg-gray-700">
            <input type="text" placeholder="Search..."
                class="text-gray-700 bg-transparent outline-none dark:text-gray-200" />
            <svg class="w-5 h-5 ml-2 text-gray-500 dark:text-gray-300" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
            </svg>
        </div>

        <!-- Notifications -->
        <button
            class="relative p-2 text-gray-700 rounded-full hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none dark:text-gray-300">
            🔔
            <span class="absolute top-0 right-0 inline-block w-2 h-2 bg-red-500 rounded-full"></span>
        </button>

        <!-- User dropdown -->
        <div class="relative">
            <button id="topUserBtn"
                class="flex items-center p-1 space-x-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none">
                <img src="https://i.pravatar.cc/32" alt="User" class="w-8 h-8 rounded-full" />
                <span
                    class="hidden font-medium text-gray-800 md:block dark:text-gray-100">{{ Auth::user()->name }}</span>
                <svg id="topUserArrow"
                    class="w-4 h-4 text-gray-500 transition-transform duration-300 dark:text-gray-300" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div id="topUserDropdown"
                class="absolute right-0 z-50 hidden mt-2 overflow-hidden bg-white rounded-md shadow-lg w-44 dark:bg-gray-700">
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
                        class="block w-full px-4 py-2 text-left text-gray-100 bg-red-500 hover:bg-red-600">Logout</button>
                </form>
            </div>
        </div>
    </div>
</header>
