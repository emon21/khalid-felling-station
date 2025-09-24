<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'East-West Felling Station' }}</title>
   {{-- @vite('resources/css/app.css') --}}
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    

</head>

<body class="text-gray-800 bg-gray-50">

     <!-- Navigation -->
    <x-fronend.navbar/>
     
    <!-- Hero Section -->
    @yield('content')

   
    <!-- Footer -->

<script src="https://cdn.tailwindcss.com"></script>
    @stack('script')

</body>
</html>
