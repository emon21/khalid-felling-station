<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'East-West Felling Station' }}</title>
   @vite('resources/css/app.css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>

<body class="text-gray-800 bg-gray-50">

     <!-- Navigation -->
     <x-fronted.top-menu/>
     
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

   

    <!-- Footer -->
    <x-fronend.footer/>

</body>

</html>
