<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EW::Felling Station - Complete Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .page-section { display: none; }
        .page-section.active { display: block; }
        .nav-item.active { color: #4f46e5; border-bottom: 2px solid #4f46e5; }
        .feature-card { transition: all 0.3s ease; }
        .feature-card:hover { transform: translateY(-5px); }
    </style>
</head>
<body class="text-gray-800 bg-gray-50">

    <!-- Navigation Bar -->
    <nav class="fixed top-0 left-0 z-20 w-full bg-white shadow">
        <div class="flex items-center justify-between px-6 py-4 mx-auto max-w-7xl">
            <h1 class="text-2xl font-bold text-indigo-600">
                <strong>EastWest</strong>
                <span class="text-lg text-gray-600">Felling Station</span>
            </h1>
            <ul class="hidden space-x-8 font-medium md:flex">
                <li><a href="#" class="pb-2 transition-all duration-300 ease-in-out border-indigo-600 nav-item hover:text-indigo-600 hover:border-b-2" onclick="showPage('home')">Home</a></li>
                <li><a href="#" class="pb-2 transition-all duration-300 ease-in-out border-indigo-600 nav-item hover:text-indigo-600 hover:border-b-2" onclick="showPage('about')">About</a></li>
                <li><a href="#" class="pb-2 transition-all duration-300 ease-in-out border-indigo-600 nav-item hover:text-indigo-600 hover:border-b-2" onclick="showPage('services')">Services</a></li>
                <li><a href="#" class="pb-2 transition-all duration-300 ease-in-out border-indigo-600 nav-item hover:text-indigo-600 hover:border-b-2" onclick="showPage('contact')">Contact</a></li>
                <li><a href="#" class="pb-2 transition-all duration-300 ease-in-out border-indigo-600 nav-item hover:text-indigo-600 hover:border-b-2" onclick="showPage('portfolio')">Portfolio</a></li>
            </ul>
            
            <!-- Auth Buttons -->
            <div class="flex items-center justify-end gap-4">
                <a href="#" class="inline-block px-5 py-1.5 text-sm leading-normal text-gray-700 border border-transparent rounded-sm hover:border-gray-300">
                    Log in
                </a>
                <a href="#" class="inline-block px-5 py-1.5 text-sm leading-normal text-white bg-green-700 border border-green-700 rounded-sm hover:bg-green-800">
                    Dashboard
                </a>
            </div>
        </div>
    </nav>

    <!-- HOME PAGE -->
    <div id="home-page" class="page-section active">
        <!-- Hero Section -->
        <section class="pb-20 text-white bg-gradient-to-r from-indigo-600 to-purple-600 pt-28">
            <div class="flex flex-col items-center px-6 mx-auto max-w-7xl md:flex-row">
                <div class="flex-1">
                    <h2 class="mb-6 text-5xl font-extrabold leading-tight">
                        Professional Tree Felling & <br />
                        <span class="text-yellow-300">Forest Management</span>
                    </h2>
                    <p class="mb-6 text-lg">
                        EastWest Felling Station - Your trusted partner for safe, efficient, and sustainable forestry services across the region.
                    </p>
                    <div class="space-x-4">
                        <button class="px-6 py-3 font-semibold text-gray-900 bg-yellow-400 rounded-lg hover:bg-yellow-300">
                            Get Quote
                        </button>
                        <button class="px-6 py-3 border border-white rounded-lg hover:bg-white hover:text-indigo-600" onclick="showPage('services')">
                            Our Services
                        </button>
                    </div>
                </div>
                <div class="flex-1 mt-10 md:mt-0">
                    <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?q=80&w=1170&auto=format&fit=crop" alt="Forest Management" class="shadow-lg rounded-xl" />
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="px-6 py-16 mx-auto max-w-7xl">
            <h2 class="mb-12 text-3xl font-bold text-center">Why Choose EastWest Felling Station</h2>
            <div class="grid gap-8 md:grid-cols-3">
                <div class="p-8 text-center bg-white shadow feature-card rounded-xl hover:shadow-lg">
                    <div class="mb-4 text-4xl text-indigo-600">🌲</div>
                    <h3 class="mb-2 text-xl font-semibold">Expert Tree Felling</h3>
                    <p>Professional tree removal services with certified arborists and modern equipment for safe operations.</p>
                </div>
                <div class="p-8 text-center bg-white shadow feature-card rounded-xl hover:shadow-lg">
                    <div class="mb-4 text-4xl text-indigo-600">♻️</div>
                    <h3 class="mb-2 text-xl font-semibold">Sustainable Practices</h3>
                    <p>Environmentally conscious forestry management that balances commercial needs with ecological preservation.</p>
                </div>
                <div class="p-8 text-center bg-white shadow feature-card rounded-xl hover:shadow-lg">
                    <div class="mb-4 text-4xl text-indigo-600">🚛</div>
                    <h3 class="mb-2 text-xl font-semibold">Full Service Logistics</h3>
                    <p>Complete timber processing, transportation, and delivery services to meet all your forestry needs.</p>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="py-16 text-white bg-indigo-600">
            <div class="px-6 mx-auto max-w-7xl">
                <div class="grid gap-8 text-center md:grid-cols-4">
                    <div>
                        <div class="mb-2 text-4xl font-bold">150+</div>
                        <div class="text-indigo-200">Projects Completed</div>
                    </div>
                    <div>
                        <div class="mb-2 text-4xl font-bold">25</div>
                        <div class="text-indigo-200">Years Experience</div>
                    </div>
                    <div>
                        <div class="mb-2 text-4xl font-bold">50+</div>
                        <div class="text-indigo-200">Happy Clients</div>
                    </div>
                    <div>
                        <div class="mb-2 text-4xl font-bold">100%</div>
                        <div class="text-indigo-200">Safety Record</div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- ABOUT PAGE -->
    <div id="about-page" class="page-section">
        <section class="pb-16 pt-28">
            <!-- About Hero -->
            <div class="px-6 mx-auto max-w-7xl">
                <div class="mb-12 text-center">
                    <h1 class="mb-4 text-4xl font-bold">About EastWest Felling Station</h1>
                    <p class="max-w-3xl mx-auto text-xl text-gray-600">
                        Established in 1998, we've been Bangladesh's leading forestry management company, combining traditional expertise with modern sustainable practices.
                    </p>
                </div>
            </div>

            <!-- Story Section -->
            <div class="py-16 bg-gray-100">
                <div class="flex flex-col items-center px-6 mx-auto max-w-7xl md:flex-row">
                    <div class="flex-1 mb-10 md:mb-0">
                        <img src="https://unsplash.com/photo-1574263867128-adac69a1e14a?q=80&w=1170&auto=format&fit=crop" 
                             alt="Our Team" class="shadow-md rounded-xl" />
                    </div>
                    <div class="flex-1 md:pl-12">
                        <h2 class="mb-4 text-3xl font-bold">Our Story</h2>
                        <p class="mb-6 text-gray-600">
                            Founded by Mohammad Rahman in 1998, EastWest Felling Station began as a small local operation in Dhaka. 
                            Over 25 years, we've grown into Bangladesh's most trusted forestry management company, serving clients 
                            across the country with professional tree felling, forest management, and timber processing services.
                        </p>
                        <p class="mb-6 text-gray-600">
                            Our commitment to sustainable practices and safety has earned us recognition from environmental 
                            organizations and government agencies. We believe in balancing commercial forestry needs with 
                            ecological responsibility.
                        </p>
                        <button class="px-6 py-3 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700" onclick="showPage('contact')">
                            Contact Us
                        </button>
                    </div>
                </div>
            </div>

            <!-- Team Section -->
            <div class="px-6 py-16 mx-auto max-w-7xl">
                <h2 class="mb-12 text-3xl font-bold text-center">Our Leadership Team</h2>
                <div class="grid gap-8 md:grid-cols-3">
                    <div class="p-6 text-center bg-white shadow rounded-xl">
                        <div class="flex items-center justify-center w-24 h-24 mx-auto mb-4 bg-indigo-100 rounded-full">
                            <span class="text-2xl font-bold text-indigo-600">MR</span>
                        </div>
                        <h3 class="mb-2 text-xl font-semibold">Mohammad Rahman</h3>
                        <p class="mb-2 text-gray-600">Founder & CEO</p>
                        <p class="text-sm text-gray-500">25+ years in forestry management</p>
                    </div>
                    <div class="p-6 text-center bg-white shadow rounded-xl">
                        <div class="flex items-center justify-center w-24 h-24 mx-auto mb-4 bg-indigo-100 rounded-full">
                            <span class="text-2xl font-bold text-indigo-600">SA</span>
                        </div>
                        <h3 class="mb-2 text-xl font-semibold">Sarah Ahmed</h3>
                        <p class="mb-2 text-gray-600">Operations Director</p>
                        <p class="text-sm text-gray-500">Certified Arborist & Safety Expert</p>
                    </div>
                    <div class="p-6 text-center bg-white shadow rounded-xl">
                        <div class="flex items-center justify-center w-24 h-24 mx-auto mb-4 bg-indigo-100 rounded-full">
                            <span class="text-2xl font-bold text-indigo-600">KH</span>
                        </div>
                        <h3 class="mb-2 text-xl font-semibold">Karim Hassan</h3>
                        <p class="mb-2 text-gray-600">Environmental Consultant</p>
                        <p class="text-sm text-gray-500">Forest Ecology & Sustainability</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- SERVICES PAGE -->
    <div id="services-page" class="page-section">
        <section class="pb-16 pt-28">
            <!-- Services Hero -->
            <div class="px-6 mx-auto mb-16 text-center max-w-7xl">
                <h1 class="mb-4 text-4xl font-bold">Our Services</h1>
                <p class="max-w-3xl mx-auto text-xl text-gray-600">
                    Comprehensive forestry solutions tailored to meet your specific needs, from residential tree care to large-scale commercial operations.
                </p>
            </div>

            <!-- Services Grid -->
            <div class="px-6 mx-auto max-w-7xl">
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    <!-- Tree Felling -->
                    <div class="overflow-hidden bg-white shadow-lg rounded-xl">
                        <div class="h-48 bg-gradient-to-r from-green-400 to-green-600"></div>
                        <div class="p-6">
                            <h3 class="mb-3 text-xl font-semibold">Professional Tree Felling</h3>
                            <p class="mb-4 text-gray-600">Safe and efficient tree removal using advanced techniques and equipment.</p>
                            <ul class="mb-4 space-y-1 text-sm text-gray-500">
                                <li>• Residential tree removal</li>
                                <li>• Commercial forest clearing</li>
                                <li>• Emergency storm damage cleanup</li>
                                <li>• Stump grinding and removal</li>
                            </ul>
                            <button class="w-full px-4 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700">
                                Get Quote
                            </button>
                        </div>
                    </div>

                    <!-- Forest Management -->
                    <div class="overflow-hidden bg-white shadow-lg rounded-xl">
                        <div class="h-48 bg-gradient-to-r from-indigo-400 to-indigo-600"></div>
                        <div class="p-6">
                            <h3 class="mb-3 text-xl font-semibold">Forest Management</h3>
                            <p class="mb-4 text-gray-600">Sustainable forestry practices for long-term land health and productivity.</p>
                            <ul class="mb-4 space-y-1 text-sm text-gray-500">
                                <li>• Forest planning and assessment</li>
                                <li>• Selective harvesting</li>
                                <li>• Reforestation programs</li>
                                <li>• Wildlife habitat management</li>
                            </ul>
                            <button class="w-full px-4 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
                                Learn More
                            </button>
                        </div>
                    </div>

                    <!-- Timber Processing -->
                    <div class="overflow-hidden bg-white shadow-lg rounded-xl">
                        <div class="h-48 bg-gradient-to-r from-yellow-400 to-orange-500"></div>
                        <div class="p-6">
                            <h3 class="mb-3 text-xl font-semibold">Timber Processing</h3>
                            <p class="mb-4 text-gray-600">Complete timber processing from raw logs to finished lumber products.</p>
                            <ul class="mb-4 space-y-1 text-sm text-gray-500">
                                <li>• Log processing and milling</li>
                                <li>• Custom lumber cutting</li>
                                <li>• Quality grading and sorting</li>
                                <li>• Kiln drying services</li>
                            </ul>
                            <button class="w-full px-4 py-2 text-white bg-orange-600 rounded-lg hover:bg-orange-700">
                                View Products
                            </button>
                        </div>
                    </div>

                    <!-- Transportation -->
                    <div class="overflow-hidden bg-white shadow-lg rounded-xl">
                        <div class="h-48 bg-gradient-to-r from-blue-400 to-blue-600"></div>
                        <div class="p-6">
                            <h3 class="mb-3 text-xl font-semibold">Logistics & Transportation</h3>
                            <p class="mb-4 text-gray-600">Reliable transportation services for timber and forestry equipment.</p>
                            <ul class="mb-4 space-y-1 text-sm text-gray-500">
                                <li>• Heavy-duty truck transport</li>
                                <li>• Crane and equipment services</li>
                                <li>• Nationwide delivery</li>
                                <li>• Load securing and safety</li>
                            </ul>
                            <button class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                                Schedule Pickup
                            </button>
                        </div>
                    </div>

                    <!-- Consultation -->
                    <div class="overflow-hidden bg-white shadow-lg rounded-xl">
                        <div class="h-48 bg-gradient-to-r from-purple-400 to-purple-600"></div>
                        <div class="p-6">
                            <h3 class="mb-3 text-xl font-semibold">Environmental Consultation</h3>
                            <p class="mb-4 text-gray-600">Expert guidance on sustainable forestry and environmental compliance.</p>
                            <ul class="mb-4 space-y-1 text-sm text-gray-500">
                                <li>• Environmental impact assessments</li>
                                <li>• Regulatory compliance support</li>
                                <li>• Sustainability planning</li>
                                <li>• Carbon credit programs</li>
                            </ul>
                            <button class="w-full px-4 py-2 text-white bg-purple-600 rounded-lg hover:bg-purple-700">
                                Consult Now
                            </button>
                        </div>
                    </div>

                    <!-- Emergency Services -->
                    <div class="overflow-hidden bg-white shadow-lg rounded-xl">
                        <div class="h-48 bg-gradient-to-r from-red-400 to-red-600"></div>
                        <div class="p-6">
                            <h3 class="mb-3 text-xl font-semibold">Emergency Services</h3>
                            <p class="mb-4 text-gray-600">24/7 emergency response for storm damage and hazardous tree situations.</p>
                            <ul class="mb-4 space-y-1 text-sm text-gray-500">
                                <li>• Storm damage cleanup</li>
                                <li>• Hazardous tree removal</li>
                                <li>• Power line clearance</li>
                                <li>• 24/7 emergency response</li>
                            </ul>
                            <button class="w-full px-4 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700">
                                Emergency Call
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- CONTACT PAGE -->
    <div id="contact-page" class="page-section">
        <section class="pb-16 pt-28">
            <!-- Contact Hero -->
            <div class="px-6 mx-auto mb-16 text-center max-w-7xl">
                <h1 class="mb-4 text-4xl font-bold">Get In Touch</h1>
                <p class="max-w-3xl mx-auto text-xl text-gray-600">
                    Ready to start your forestry project? Contact us for a free consultation and quote.
                </p>
            </div>

            <div class="px-6 mx-auto max-w-7xl">
                <div class="grid gap-8 lg:grid-cols-2">
                    <!-- Contact Form -->
                    <div class="p-8 bg-white shadow-lg rounded-xl">
                        <h2 class="mb-6 text-2xl font-semibold">Send us a Message</h2>
                        <form class="space-y-6">
                            <div class="grid gap-6 md:grid-cols-2">
                                <div>
                                    <label class="block mb-2 text-sm font-medium">Full Name</label>
                                    <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium">Phone Number</label>
                                    <input type="tel" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                </div>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium">Email Address</label>
                                <input type="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium">Service Needed</label>
                                <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                    <option>Tree Felling</option>
                                    <option>Forest Management</option>
                                    <option>Timber Processing</option>
                                    <option>Emergency Services</option>
                                    <option>Consultation</option>
                                </select>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium">Project Details</label>
                                <textarea rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="Tell us about your project..."></textarea>
                            </div>
                            <button class="w-full px-6 py-3 font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
                                Send Message
                            </button>
                        </form>
                    </div>

                    <!-- Contact Info -->
                    <div class="space-y-8">
                        <!-- Contact Details -->
                        <div class="p-8 bg-white shadow-lg rounded-xl">
                            <h2 class="mb-6 text-2xl font-semibold">Contact Information</h2>
                            <div class="space-y-6">
                                <div class="flex items-start">
                                    <div class="flex items-center justify-center w-12 h-12 mr-4 bg-indigo-100 rounded-lg">
                                        <span class="text-xl text-indigo-600">📍</span>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold">Office Address</h3>
                                        <p class="text-gray-600">House #12, Road #7<br>Dhanmondi, Dhaka-1205<br>Bangladesh</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex items-center justify-center w-12 h-12 mr-4 bg-indigo-100 rounded-lg">
                                        <span class="text-xl text-indigo-600">📞</span>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold">Phone Numbers</h3>
                                        <p class="text-gray-600">+880 1712-345678<br>+880 2-9876543</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex items-center justify-center w-12 h-12 mr-4 bg-indigo-100 rounded-lg">
                                        <span class="text-xl text-indigo-600">✉️</span>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold">Email</h3>
                                        <p class="text-gray-600">info@eastwestfelling.com<br>projects@eastwestfelling.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Business Hours -->
                        <div class="p-8 bg-white shadow-lg rounded-xl">
                            <h2 class="mb-6 text-2xl font-semibold">Business Hours</h2>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span>Monday - Friday</span>
                                    <span class="font-semibold">8:00 AM - 6:00 PM</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Saturday</span>
                                    <span class="font-semibold">9:00 AM - 4:00 PM</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Sunday</span>
                                    <span class="text-red-600">Closed</span>
                                </div>
                                <div class="pt-3 mt-4 border-t">
                                    <div class="flex justify-between">
                                        <span>Emergency Services</span>
                                        <span class="font-semibold text-green-600">24/7 Available</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- PORTFOLIO PAGE -->
    <div id="portfolio-page" class="page-section">
        <section class="pb-16 pt-28">
            <!-- Portfolio Hero -->
            <div class="px-6 mx-auto mb-16 text-center max-w-7xl">
                <h1 class="mb-4 text-4xl font-bold">Our Portfolio</h1>
                <p class="max-w-3xl mx-auto text-xl text-gray-600">
                    Explore our successful forestry projects and see the quality of work we deliver across Bangladesh.
                </p>
            </div>

            <!-- Portfolio Filter -->
            <div class="px-6 mx-auto mb-12 max-w-7xl">
                <div class="flex flex-wrap justify-center gap-4">
                    <button class="px-6 py-2 text-white bg-indigo-600 rounded-full hover:bg-indigo-700">All Projects</button>
                    <button class="px-6 py-2 text-gray-700 bg-gray-200 rounded-full hover:bg-gray-300">Residential</button>
                    <button class="px-6 py-2 text-gray-700 bg-gray-200 rounded-full hover:bg-gray-300">Commercial</button>
                    <button class="px-6 py-2 text-gray-700 bg-gray-200 rounded-full hover:bg-gray-300">Forest Management</button>
                    <button class="px-6 py-2 text-gray-700 bg-gray-200 rounded-full hover:bg-gray-300">Emergency</button>
                </div>
            </div>

            <!-- Portfolio Grid -->
            <div class="px-6 mx-auto max-w-7xl">
                <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                    <!-- Project 1 -->
                    <div class="overflow-hidden bg-white shadow-lg rounded-xl">
                        <div class="h-64 bg-gradient-to-r from-green-400 to-blue-500"></div>
                        <div class="p-6">
                            <span class="inline-block px-3 py-1 mb-2 text-xs font-semibold text-green-800 bg-green-100 rounded-full">
                                Commercial
                            </span>
                            <h3 class="mb-2 text-xl font-semibold">Savar Industrial Zone Clearing</h3>
                            <p class="mb-4 text-sm text-gray-600">Large-scale forest clearing for industrial development with environmental compliance.</p>
                            <div class="text-sm text-gray-500">
                                <p>• 150 acres cleared</p>
                                <p>• 3 months completion</p>
                                <p>• Zero accidents</p>
                            </div>
                        </div>
                    </div>

                    <!-- Project 2 -->
                    <div class="overflow-hidden bg-white shadow-lg rounded-xl">
                        <div class="h-64 bg-gradient-to-r from-yellow-400 to-orange-500"></div>
                        <div class="p-6">
                            <span class="inline-block px-3 py-1 mb-2 text-xs font-semibold text-blue-800 bg-blue-100 rounded-full">
                                Residential
                            </span>
                            <h3 class="mb-2 text-xl font-semibold">Gulshan Residential Complex</h3>
                            <p class="mb-4 text-sm text-gray-600">Selective tree removal and landscaping for luxury residential project.</p>
                            <div class="text-sm text-gray-500">
                                <p>• 25 mature trees removed</p>
                                <p>• Landscape preservation</p>
                                <p>• Community satisfaction</p>
                            </div>
                        </div>
                    </div>

                    <!-- Project 3 -->
                    <div class="overflow-hidden bg-white shadow-lg rounded-xl">
                        <div class="h-64 bg-gradient-to-r from-purple-400 to-pink-500"></div>
                        <div class="p-6">
                            <span class="inline-block px-3 py-1 mb-2 text-xs font-semibold text-red-800 bg-red-100 rounded-full">
                                Emergency
                            </span>
                            <h3 class="mb-2 text-xl font-semibold">Cyclone Amphan Cleanup</h3>
                            <p class="mb-4 text-sm text-gray-600">Emergency response for storm-damaged trees across Dhaka metropolitan area.</p>
                            <div class="text-sm text-gray-500">
                                <p>• 48-hour response time</p>
                                <p>• 200+ trees cleared</p>
                                <p>• Road restoration</p>
                            </div>
                        </div>
                    </div>

                    <!-- Project 4 -->
                    <div class="overflow-hidden bg-white shadow-lg rounded-xl">
                        <div class="h-64 bg-gradient-to-r from-indigo-400 to-purple-600"></div>
                        <div class="p-6">
                            <span class="inline-block px-3 py-1 mb-2 text-xs font-semibold text-purple-800 bg-purple-100 rounded-full">
                                Forest Management
                            </span>
                            <h3 class="mb-2 text-xl font-semibold">Sundarbans Conservation Project</h3>
                            <p class="mb-4 text-sm text-gray-600">Sustainable forest management and reforestation in the Sundarbans region.</p>
                            <div class="text-sm text-gray-500">
                                <p>• 500 hectares managed</p>
                                <p>• 10,000 saplings planted</p>
                                <p>• Wildlife habitat preserved</p>
                            </div>
                        </div>
                    </div>

                    <!-- Project 5 -->
                    <div class="overflow-hidden bg-white shadow-lg rounded-xl">
                        <div class="h-64 bg-gradient-to-r from-teal-400 to-blue-600"></div>
                        <div class="p-6">
                            <span class="inline-block px-3 py-1 mb-2 text-xs font-semibold text-green-800 bg-green-100 rounded-full">
                                Commercial
                            </span>
                            <h3 class="mb-2 text-xl font-semibold">Padma Bridge Access Road</h3>
                            <p class="mb-4 text-sm text-gray-600">Forest clearing and timber processing for major infrastructure development.</p>
                            <div class="text-sm text-gray-500">
                                <p>• 80km road corridor</p>
                                <p>• Government project</p>
                                <p>• Environmental compliance</p>
                            </div>
                        </div>
                    </div>

                    <!-- Project 6 -->
                    <div class="overflow-hidden bg-white shadow-lg rounded-xl">
                        <div class="h-64 bg-gradient-to-r from-rose-400 to-red-500"></div>
                        <div class="p-6">
                            <span class="inline-block px-3 py-1 mb-2 text-xs font-semibold text-blue-800 bg-blue-100 rounded-full">
                                Residential
                            </span>
                            <h3 class="mb-2 text-xl font-semibold">Bashundhara Housing Estate</h3>
                            <p class="mb-4 text-sm text-gray-600">Comprehensive tree management for Bangladesh's largest residential project.</p>
                            <div class="text-sm text-gray-500">
                                <p>• 300+ trees relocated</p>
                                <p>• Urban planning integration</p>
                                <p>• Green space development</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonials Section -->
            <div class="px-6 py-16 mx-auto max-w-7xl">
                <h2 class="mb-12 text-3xl font-bold text-center">What Our Clients Say</h2>
                <div class="grid gap-8 md:grid-cols-3">
                    <div class="p-6 text-center bg-white shadow rounded-xl">
                        <p class="mb-4 text-gray-600">"EastWest Felling Station completed our industrial project ahead of schedule with exceptional safety standards."</p>
                        <h4 class="font-semibold">- Md. Karim, Project Manager</h4>
                        <p class="text-sm text-gray-500">Savar Industrial Development</p>
                    </div>
                    <div class="p-6 text-center bg-white shadow rounded-xl">
                        <p class="mb-4 text-gray-600">"Their emergency response during Cyclone Amphan was incredible. Roads were cleared within 48 hours."</p>
                        <h4 class="font-semibold">- Sarah Rahman, City Planner</h4>
                        <p class="text-sm text-gray-500">Dhaka City Corporation</p>
                    </div>
                    <div class="p-6 text-center bg-white shadow rounded-xl">
                        <p class="mb-4 text-gray-600">"Professional, reliable, and environmentally conscious. The best forestry company in Bangladesh."</p>
                        <h4 class="font-semibold">- Dr. Ahmed Hassan</h4>
                        <p class="text-sm text-gray-500">Environmental Consultant</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="py-12 text-gray-300 bg-gray-900">
        <div class="px-6 mx-auto max-w-7xl">
            <div class="grid gap-8 md:grid-cols-4">
                <div>
                    <h3 class="mb-4 text-xl font-bold text-white">EastWest Felling Station</h3>
                    <p class="mb-4 text-gray-400">Bangladesh's leading forestry management company, providing professional and sustainable forest services since 1998.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white">📘</a>
                        <a href="#" class="text-gray-400 hover:text-white">🐦</a>
                        <a href="#" class="text-gray-400 hover:text-white">💼</a>
                    </div>
                </div>
                <div>
                    <h4 class="mb-4 font-semibold text-white">Services</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white">Tree Felling</a></li>
                        <li><a href="#" class="hover:text-white">Forest Management</a></li>
                        <li><a href="#" class="hover:text-white">Timber Processing</a></li>
                        <li><a href="#" class="hover:text-white">Transportation</a></li>
                        <li><a href="#" class="hover:text-white">Emergency Services</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="mb-4 font-semibold text-white">Company</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white" onclick="showPage('about')">About Us</a></li>
                        <li><a href="#" class="hover:text-white" onclick="showPage('portfolio')">Portfolio</a></li>
                        <li><a href="#" class="hover:text-white">Careers</a></li>
                        <li><a href="#" class="hover:text-white">Safety Standards</a></li>
                        <li><a href="#" class="hover:text-white">Certifications</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="mb-4 font-semibold text-white">Contact Info</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li>📍 Dhanmondi, Dhaka-1205</li>
                        <li>📞 +880 1712-345678</li>
                        <li>✉️ info@eastwestfelling.com</li>
                        <li class="pt-2">
                            <span class="font-semibold text-green-400">24/7 Emergency:</span><br>
                            +880 1700-EMERGENCY
                        </li>
                    </ul>
                </div>
            </div>
            <div class="pt-8 mt-8 text-center border-t border-gray-800">
                <p>&copy; 2025 EastWest Felling Station. All rights reserved. | Privacy Policy | Terms of Service</p>
            </div>
        </div>
    </footer>

    <script>
        function showPage(pageId) {
            // Hide all pages
            const pages = document.querySelectorAll('.page-section');
            pages.forEach(page => {
                page.classList.remove('active');
            });

            // Show selected page
            document.getElementById(pageId + '-page').classList.add('active');

            // Update navigation
            const navItems = document.querySelectorAll('.nav-item');
            navItems.forEach(item => {
                item.classList.remove('active');
            });
            
            // Find and activate the corresponding nav item
            const activeNav = Array.from(navItems).find(item => 
                item.getAttribute('onclick') && item.getAttribute('onclick').includes(pageId)
            );
            if (activeNav) {
                activeNav.classList.add('active');
            }

            // Scroll to top
            window.scrollTo(0, 0);
        }

        // Set home as active by default
        document.addEventListener('DOMContentLoaded', function() {
            const homeNav = document.querySelector('[onclick="showPage(\'home\')"]');
            if (homeNav) homeNav.classList.add('active');
        });

        // Add some interactive effects
        document.querySelectorAll('.feature-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Portfolio filter functionality
        document.querySelectorAll('#portfolio-page button').forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                document.querySelectorAll('#portfolio-page button').forEach(btn => {
                    btn.classList.remove('bg-indigo-600', 'text-white');
                    btn.classList.add('bg-gray-200', 'text-gray-700');
                });
                
                // Add active class to clicked button
                this.classList.remove('bg-gray-200', 'text-gray-700');
                this.classList.add('bg-indigo-600', 'text-white');
            });
        });
    </script>
</body>
</html>