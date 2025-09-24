<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Your Company</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    {{-- <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.6s ease-in-out',
                        'slide-up': 'slideUp 0.8s ease-out',
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(20px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            }
                        },
                        slideUp: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(40px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            }
                        },
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0px)'
                            },
                            '50%': {
                                transform: 'translateY(-10px)'
                            }
                        }
                    }
                }
            }
        }
    </script> --}}
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50">
    <!-- Navigation -->
    <nav class="sticky top-0 z-50 border-b border-gray-100 shadow-lg bg-white/80 backdrop-blur-md">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between py-4">
                <div class="flex items-center space-x-2">
                    <div
                        class="flex items-center justify-center w-10 h-10 rounded-lg bg-gradient-to-r from-blue-600 to-purple-600">
                        <i class="text-xl text-white fas fa-bolt"></i>
                    </div>
                    <span
                        class="text-xl font-bold text-transparent bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text">YourCompany</span>
                </div>
                <div class="hidden space-x-8 md:flex">
                    <a href="#" class="text-gray-700 transition-colors duration-300 hover:text-blue-600">Home</a>
                    <a href="#" class="text-gray-700 transition-colors duration-300 hover:text-blue-600">About</a>
                    <a href="#"
                        class="text-gray-700 transition-colors duration-300 hover:text-blue-600">Services</a>
                    <a href="#" class="font-semibold text-blue-600">Contact</a>
                </div>
                <button class="text-gray-700 md:hidden">
                    <i class="text-xl fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative py-20 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600/10 to-purple-600/10"></div>
        <div
            class="absolute bg-blue-300 rounded-full top-10 left-10 w-72 h-72 mix-blend-multiply filter blur-xl opacity-20 animate-float">
        </div>
        <div class="absolute bg-purple-300 rounded-full bottom-10 right-10 w-72 h-72 mix-blend-multiply filter blur-xl opacity-20 animate-float"
            style="animation-delay: -3s;"></div>

        <div class="relative px-4 mx-auto text-center max-w-7xl sm:px-6 lg:px-8">
            <h1 class="mb-6 text-5xl font-bold md:text-7xl animate-fade-in">
                <span
                    class="text-transparent bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text">Get
                    In Touch</span>
            </h1>
            <p class="max-w-3xl mx-auto text-xl text-gray-600 animate-slide-up">
                We'd love to hear from you. Send us a message and we'll respond as soon as possible.
            </p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-10">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">

            <!-- alert-message -->
<div id="alert-wrapper" class="hidden py-4 my-4 text-center border border-blue-600 rounded-lg shadow">
    @if (session('success'))
        <div id="alert-message"
             class="px-4 mb-2 text-green-700 ">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div id="alert-message"
             class="px-4 mb-2 text-red-700 ">
            {{ session('error') }}
        </div>
    @endif
</div>

            <div class="grid grid-cols-1 gap-12 lg:grid-cols-3">

                <!-- Contact Information -->
                <div class="space-y-8 lg:col-span-1">
                    <div
                        class="p-8 transition-all duration-300 bg-white border border-gray-100 shadow-xl rounded-2xl hover:shadow-2xl">
                        <h3 class="mb-6 text-2xl font-bold text-gray-800">Contact Information</h3>
                        <div class="space-y-6">
                            <div class="flex items-start space-x-4 group">
                                <div
                                    class="flex items-center justify-center w-12 h-12 transition-transform duration-300 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl group-hover:scale-110">
                                    <i class="text-white fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <h4 class="mb-1 font-semibold text-gray-800">Address</h4>
                                    <p class="text-gray-600">123 Business Street<br>City, State 12345<br>United States
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4 group">
                                <div
                                    class="flex items-center justify-center w-12 h-12 transition-transform duration-300 bg-gradient-to-r from-green-500 to-green-600 rounded-xl group-hover:scale-110">
                                    <i class="text-white fas fa-phone"></i>
                                </div>
                                <div>
                                    <h4 class="mb-1 font-semibold text-gray-800">Phone</h4>
                                    <p class="text-gray-600">+1 (555) 123-4567</p>
                                    <p class="text-gray-600">+1 (555) 987-6543</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4 group">
                                <div
                                    class="flex items-center justify-center w-12 h-12 transition-transform duration-300 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl group-hover:scale-110">
                                    <i class="text-white fas fa-envelope"></i>
                                </div>
                                <div>
                                    <h4 class="mb-1 font-semibold text-gray-800">Email</h4>
                                    <p class="text-gray-600">hello@yourcompany.com</p>
                                    <p class="text-gray-600">support@yourcompany.com</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4 group">
                                <div
                                    class="flex items-center justify-center w-12 h-12 transition-transform duration-300 bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl group-hover:scale-110">
                                    <i class="text-white fas fa-clock"></i>
                                </div>
                                <div>
                                    <h4 class="mb-1 font-semibold text-gray-800">Business Hours</h4>
                                    <p class="text-gray-600">Mon - Fri: 9:00 AM - 6:00 PM</p>
                                    <p class="text-gray-600">Sat - Sun: 10:00 AM - 4:00 PM</p>
                                </div>
                            </div>
                        </div>

                        <!-- Social Media -->
                        <div class="pt-8 mt-8 border-t border-gray-100">
                            <h4 class="mb-4 font-semibold text-gray-800">Follow Us</h4>
                            <div class="flex space-x-4">
                                <a href="#"
                                    class="flex items-center justify-center w-10 h-10 text-white transition-colors duration-300 bg-blue-600 rounded-full hover:bg-blue-700">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#"
                                    class="flex items-center justify-center w-10 h-10 text-white transition-colors duration-300 bg-blue-400 rounded-full hover:bg-blue-500">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#"
                                    class="flex items-center justify-center w-10 h-10 text-white transition-colors duration-300 bg-blue-700 rounded-full hover:bg-blue-800">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#"
                                    class="flex items-center justify-center w-10 h-10 text-white transition-colors duration-300 bg-pink-600 rounded-full hover:bg-pink-700">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="lg:col-span-2">
                    <div
                        class="p-8 transition-all duration-300 bg-white border border-gray-100 shadow-xl rounded-2xl hover:shadow-2xl">
                        <h3 class="mb-6 text-2xl font-bold text-gray-800">Send us a Message</h3>

                        <form action="/contact" class="space-y-6" method="POST">
                            @csrf

                            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                                <!-- Name -->
                                <div class="mb-4 group">
                                    <label class="block mb-2 text-sm font-semibold text-gray-700">Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="w-full px-4 py-3 transition-all duration-300 border rounded-xl focus:ring-2 focus:border-transparent 
                                       @error('name') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-blue-500 @enderror"
                                        placeholder="Your Name....">

                                    @error('name')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="mb-4 group">
                                    <label class="block mb-2 text-sm font-semibold text-gray-700">Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="w-full px-4 py-3 transition-all duration-300 border rounded-xl focus:ring-2 focus:border-transparent 
                                       @error('email') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-blue-500 @enderror"
                                        placeholder="Your Email....">

                                    @error('email')
                                        <span class="text-sm text-red-600">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Subject -->
                            <div class="mb-4 group">
                                <label class="block mb-2 text-sm font-semibold text-gray-700">Subject</label>
                                <input type="text" name="subject" value="{{ old('subject') }}"
                                    class="w-full px-4 py-3 transition-all duration-300 border rounded-xl focus:ring-2 focus:border-transparent 
                                       @error('subject') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-blue-500 @enderror"
                                    placeholder="Your Email....">

                                @error('subject')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Message -->
                            <div class="mb-4 group">
                                <label class="block mb-2 text-sm font-semibold text-gray-700">Message *</label>
                                <textarea rows="6" name="message"
                                    class="w-full px-4 py-3 transition-all duration-300 border rounded-xl resize-none focus:ring-2 focus:border-transparent group-hover:border-blue-300 
                                       @error('message') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-blue-500 @enderror"
                                    placeholder="Tell us about your project or question...">{{ old('message') }}</textarea>

                                @error('message')
                                    <span class="text-sm text-red-600">{{ $message }}</span>
                                @enderror
                            </div>


                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full px-8 py-4 font-semibold text-white transition-all duration-300 transform shadow-lg bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl hover:from-blue-700 hover:to-purple-700 hover:scale-105 hover:shadow-xl">
                                <i class="mr-2 fas fa-paper-plane"></i>
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="py-12 text-white bg-gray-900">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 md:grid-cols-4">
                <div class="md:col-span-2">
                    <div class="flex items-center mb-4 space-x-2">
                        <div
                            class="flex items-center justify-center w-10 h-10 rounded-lg bg-gradient-to-r from-blue-600 to-purple-600">
                            <i class="text-xl text-white fas fa-bolt"></i>
                        </div>
                        <span class="text-xl font-bold">YourCompany</span>
                    </div>
                    <p class="mb-4 text-gray-400">
                        We're dedicated to providing exceptional service and building lasting relationships with our
                        clients.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 transition-colors duration-300 hover:text-white">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 transition-colors duration-300 hover:text-white">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 transition-colors duration-300 hover:text-white">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="text-gray-400 transition-colors duration-300 hover:text-white">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="mb-4 font-semibold">Quick Links</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="transition-colors duration-300 hover:text-white">Home</a></li>
                        <li><a href="#" class="transition-colors duration-300 hover:text-white">About</a></li>
                        <li><a href="#" class="transition-colors duration-300 hover:text-white">Services</a>
                        </li>
                        <li><a href="#" class="transition-colors duration-300 hover:text-white">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="mb-4 font-semibold">Newsletter</h4>
                    <p class="mb-4 text-sm text-gray-400">Subscribe to get updates</p>
                    <div class="flex">
                        <input type="email" placeholder="Your email"
                            class="flex-1 px-3 py-2 text-white bg-gray-800 border border-gray-700 rounded-l-lg focus:border-blue-500 focus:outline-none">
                        <button
                            class="px-4 py-2 transition-colors duration-300 bg-blue-600 rounded-r-lg hover:bg-blue-700">
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="pt-8 mt-8 text-center text-gray-400 border-t border-gray-800">
                <p>&copy; 2024 YourCompany. All rights reserved.</p>
            </div>
        </div>
    </footer>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let wrapper = document.getElementById("alert-wrapper");
        let alertBox = document.getElementById("alert-message");

        if(alertBox){
            // show wrapper
            wrapper.classList.remove("hidden");

            // auto hide after 3 seconds
            setTimeout(() => {
                alertBox.style.transition = "opacity 0.5s ease";
                alertBox.style.opacity = "0";
                setTimeout(() => wrapper.classList.add("hidden"), 500); // hide wrapper
            }, 3000);
        }
    });
</script>


</body>

</html>
