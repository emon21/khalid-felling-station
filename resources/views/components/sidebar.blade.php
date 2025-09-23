<aside id="sidebar"
    class="fixed inset-y-0 left-0 z-50 flex flex-col w-64 transition-transform duration-300 transform -translate-x-full bg-white shadow-lg dark:bg-gray-800 md:translate-x-0">

    <!-- Logo -->
    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">Dashboard</h1>
    </div>

    <!-- Navigation Links -->
    {{-- <nav class="flex-1 mt-4 overflow-y-auto">
      <ul>
        <li>
          <a href="#"
            class="flex items-center px-6 py-3 mb-1 text-gray-700 transition rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
            🏠 Dashboard
          </a>
        </li>
        <li>
          <a href="#"
            class="flex items-center px-6 py-3 mb-1 text-gray-700 transition rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
            📦 Products
          </a>
        </li>
        <li>
          <a href="#"
            class="flex items-center px-6 py-3 mb-1 text-gray-700 transition rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
            👥 Users
          </a>
        </li>
        <li>
          <a href="#"
            class="flex items-center px-6 py-3 text-gray-700 transition rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
            ⚙️ Settings
          </a>
        </li>
      </ul>
    </nav> --}}

    <!-- Navigation Links with bottom border -->
    <nav class="mt-1">
        <ul class="">
            <li> <a href="#"
                    class="flex items-center px-6 py-2 text-gray-700 transition border-b border-gray-200 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 dark:border-gray-700">
                    🏠 Dashboard </a> </li>
            <li> <a href="#"
                    class="flex items-center px-6 py-2 text-gray-700 transition border-b border-gray-200 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 dark:border-gray-700">
                    📦 Products </a> </li>
            <li> <a href="#"
                    class="flex items-center px-6 py-2 text-gray-700 transition border-b border-gray-200 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 dark:border-gray-700">
                    👥 Users </a> </li>
            <li> <a href="#"
                    class="flex items-center px-6 py-2 text-gray-700 transition border-b border-gray-200 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 dark:border-gray-700">
                    ⚙️ Settings </a> </li>
        </ul>
    </nav>

    <hr>

    <nav class="mt-1">
        <ul>
            <!-- Home -->
            <li>
                <a href="#"
                    class="flex items-center gap-3 px-6 py-3 text-gray-700 transition border-b border-gray-200 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 dark:border-gray-700">
                    🏠
                    <span>Home</span>
                </a>
            </li>

            <!-- About -->
            <li>
                <a href="{{ route('about') }}"
                    class="flex items-center gap-3 px-6 py-3 text-gray-700 transition border-b border-gray-200 {{ request()->routeIs('about')
                        ? 'bg-gray-200  text-gray-900 font-semibold'
                        : 'text-gray-700  hover:bg-gray-200 ' }} hover:bg-gray-200 ">
                    ℹ️
                    <span>About</span>
                </a>
            </li>

            <!-- Services -->
            <li>
                <a href="{{ route('service.index') }}"
                    class="flex items-center gap-3 px-6 py-3 text-gray-700 transition border-b border-gray-200 {{ request()->routeIs('service.index') ? 'bg-gray-200  text-gray-900 font-semibold' : 'text-gray-700' }} hover:bg-gray-200 ">
                    💼
                    <span>Services</span>
                </a>
            </li>
            <!-- our-value -->
            <li>
                <a href="{{ route('our-value.index') }}"
                    class="flex items-center gap-3 px-6 py-3 text-gray-700 transition border-b border-gray-200 {{ request()->routeIs('our-value.index') ? 'bg-gray-200  text-gray-900 font-semibold' : 'text-gray-700' }} hover:bg-gray-200 ">
                    📦 <span>Our value</span>
                </a>
            </li>

            <!-- Contact -->
            <li>
                <a href="#"
                    class="flex items-center gap-3 px-6 py-3 text-gray-700 transition dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700">
                    📞
                    <span>Contact</span>
                </a>
            </li>

            <!-- Settings -->
            <li>
                <a href="{{ route('website-settings') }}"
                    class="flex items-center gap-3 px-6 py-3 text-gray-700 transition border-b border-gray-200 {{ request()->routeIs('website-settings')
                        ? 'bg-gray-200  text-gray-900 font-semibold'
                        : 'text-gray-700  hover:bg-gray-200 ' }} hover:bg-gray-200 ">
                    ⚙️
                    <span>WebSite Settings</span>
                </a>
            </li>
            <!-- Page Settings -->
            <li>
                <a href="{{ route('page.index') }}"
                    class="flex items-center gap-3 px-6 py-3 transition border-b border-gray-200 
                        {{ request()->routeIs('page.index')
                            ? 'bg-gray-200  text-gray-900 dark:text-white font-semibold'
                            : 'text-gray-700  hover:bg-gray-200 ' }}">
                    <span class="text-lg">📄</span>
                    <span>Page Settings</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- User Profile Dropdown -->
    <div class="relative px-6 py-4 mt-auto border-t border-gray-200 dark:border-gray-700">
        <button id="profileBtnSidebar"
            class="flex items-center justify-between w-full p-2 transition rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
            <div class="flex items-center space-x-3">
                <img src="https://i.pravatar.cc/40" alt="User" class="w-10 h-10 rounded-full" />
                <div class="text-left">
                    <p class="font-semibold text-gray-800 dark:text-gray-100">John Doe</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Account</p>
                </div>
            </div>
            <svg id="profileArrow" class="w-5 h-5 text-gray-500 transition-transform duration-300 dark:text-gray-400"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <div id="profileDropdownSidebar"
            class="absolute z-50 hidden w-48 overflow-hidden bg-white rounded-md shadow-lg left-6 bottom-16 dark:bg-gray-700">
            <a href="#"
                class="block px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">👤
                Profile</a>
            <a href="#"
                class="block px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">🔒
                Logout</a>
        </div>
    </div>
</aside>
