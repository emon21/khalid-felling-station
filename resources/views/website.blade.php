<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EW::Felling Station</title>
   @vite('resources/css/app.css')

</head>

<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-white shadow fixed w-full z-20 top-0 left-0">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">
            <h1 class="text-2xl font-bold text-indigo-600"><strong>EastWest</strong>
                <span class="text-gray-600 text-lg">Felling Station</span> </h1>
            <ul class="hidden md:flex space-x-8 font-medium">
                <li><a href="#" class="hover:text-indigo-600 pb-2 hover:border-b-2 border-indigo-600 transition-all ease-in-out duration-300">Home</a></li>
                <li><a href="#" class="hover:text-indigo-600">About</a></li>
                <li><a href="#" class="hover:text-indigo-600">Services</a></li>
                <li><a href="#" class="hover:text-indigo-600">Contact</a></li>
            </ul>
            <!-- Navigation Links -->
            {{-- <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="bg-indigo-600 text-white px-5 rounded-lg hover:bg-indigo-700 hover:text-white">
                    <span class="py-2 px-3 hover:text-white">{{ __('Dashboard') }}</span>
                </x-nav-link>
            </div> --}}

            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/admin/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#ebebe7] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal bg-green-700"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif

            {{-- <button class="bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700">
                Get Started
            </button> --}}
        </div>
    </nav>

    <!-- Hero -->
    <section class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white pt-28 pb-20">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center">
            <div class="flex-1">
                <h2 class="text-5xl font-extrabold mb-6 leading-tight">
                    Build Stunning Websites with <br />
                    <span class="text-yellow-300">Tailwind CSS</span>
                </h2>
                <p class="text-lg mb-6">
                    The fastest way to build modern, responsive, and professional websites with utility-first CSS.
                </p>
                <div class="space-x-4">
                    <button class="bg-yellow-400 text-gray-900 px-6 py-3 rounded-lg font-semibold hover:bg-yellow-300">
                        Start Free
                    </button>
                    <button class="border border-white px-6 py-3 rounded-lg hover:bg-white hover:text-indigo-600">
                        Learn More
                    </button>
                </div>
            </div>
            <div class="flex-1 mt-10 md:mt-0">
                <img src="https://picsum.photos/id/1060/536/360" alt="Hero" class="rounded-xl shadow-lg" />
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="max-w-7xl mx-auto px-6 py-16">
        <h2 class="text-3xl font-bold text-center mb-12">Our Features</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg text-center">
                <div class="text-indigo-600 text-4xl mb-4">⚡</div>
                <h3 class="text-xl font-semibold mb-2">Fast Development</h3>
                <p>Quickly build and launch websites with Tailwind’s utility-first approach.</p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg text-center">
                <div class="text-indigo-600 text-4xl mb-4">🎨</div>
                <h3 class="text-xl font-semibold mb-2">Modern Design</h3>
                <p>Create sleek and modern UI with minimal effort using pre-built classes.</p>
            </div>
            <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg text-center">
                <div class="text-indigo-600 text-4xl mb-4">📱</div>
                <h3 class="text-xl font-semibold mb-2">Responsive Layout</h3>
                <p>Ensure your website looks great on any device, big or small.</p>
            </div>
        </div>
    </section>

    <!-- About -->
    <section class="bg-gray-100 py-16">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center">
            <div class="flex-1 mb-10 md:mb-0">
                <img src="https://plus.unsplash.com/premium_photo-1678565999332-1cde462f7b24?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    class="rounded-xl shadow-md" />
            </div>
            <div class="flex-1 md:pl-12">
                <h2 class="text-3xl font-bold mb-4">Who We Are</h2>
                <p class="text-gray-600 mb-6">
                    We are a passionate team of developers and designers helping businesses build their online presence.
                </p>
                <button class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700">
                    Learn More
                </button>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="max-w-7xl mx-auto px-6 py-16">
        <h2 class="text-3xl font-bold text-center mb-12">What Our Clients Say</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow text-center">
                <p class="mb-4 text-gray-600">"This framework made our website development 5x faster!"</p>
                <h4 class="font-semibold">- John Doe</h4>
            </div>
            <div class="bg-white p-6 rounded-xl shadow text-center">
                <p class="mb-4 text-gray-600">"Tailwind is simply the best tool for modern responsive design."</p>
                <h4 class="font-semibold">- Sarah Lee</h4>
            </div>
            <div class="bg-white p-6 rounded-xl shadow text-center">
                <p class="mb-4 text-gray-600">"Our clients love the sleek and professional look."</p>
                <h4 class="font-semibold">- Mike Johnson</h4>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="bg-indigo-600 text-white py-16 text-center">
        <h2 class="text-4xl font-bold mb-4">Ready to Build Your Website?</h2>
        <p class="mb-6">Get started today and bring your ideas to life with Tailwind CSS.</p>
        <button class="bg-yellow-400 text-gray-900 px-6 py-3 rounded-lg font-semibold hover:bg-yellow-300">
            Get Started Now
        </button>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-6">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <p>&copy; 2025 MyBrand. All rights reserved.</p>
            <div class="space-x-4">
                <a href="#" class="hover:text-white">Facebook</a>
                <a href="#" class="hover:text-white">Twitter</a>
                <a href="#" class="hover:text-white">LinkedIn</a>
            </div>
        </div>
    </footer>

</body>

</html>
