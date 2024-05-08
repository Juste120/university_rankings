<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <title>Admin Page</title>
</head>
<body class="bg-gray-100">
<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex-shrink-0">
                <img class="h-8 w-auto" src="{{ asset('storage/logo/logo-university.webp') }}" alt="University Logo">
            </div>
            <div class="hidden sm:block sm:ml-6">
                <div class="flex space-x-4">
                    <a href="#" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                    <a href="{{ route('universities.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Universities</a>
                    <a href="{{ route('criteria.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Criteria</a>
                    <a href="{{ route('users.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Users</a>
                    <a href="{{ route('comments.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Comments</a>

                    <!-- Logout button -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         this.closest('form').submit();"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                        >
                            Logout
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>

<main class="container mx-auto mt-8 p-4 bg-white rounded shadow">
    <!-- Your page content goes here -->
    <div x-data="{ slide: 0, images: ['https://source.unsplash.com/random/1200x600?university', 'https://source.unsplash.com/random/1200x600?university', 'https://source.unsplash.com/random/1200x600?university'] }" class="w-full max-w-screen-xl mx-auto px-6">
        <div class="relative shadow-2xl overflow-hidden">
            <div class="relative pt-56 pb-32 flex">
                <template x-for="(image, index) in images" :key="index">
                    <img class="absolute inset-0 w-full h-full object-cover transition-opacity duration-300" :src="image" :alt="'Slide ' + index" :class="{ 'opacity-0': slide !== index, 'opacity-100': slide === index }">
                </template>
            </div>
            <div class="absolute bottom-0 inset-x-0 p-4 md:flex md:items-center md:justify-between">
                <div class="flex">
                    <button @click="slide = (slide === 0 ? images.length - 1 : slide - 1)" class="rounded-full p-2 inline-flex items-center justify-center text-gray-400 hover:text-white hover:bg-white hover:bg-opacity-10 focus:outline-none transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <button @click="slide = (slide + 1) % images.length" class="ml-3 rounded-full p-2 inline-flex items-center justify-center text-gray-400 hover:text-white hover:bg-white hover:bg-opacity-10 focus:outline-none transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
                <h2 class="mt-2 md:mt-0 text-center md:text-left text-lg leading-6 font-medium text-gray-900">Universities</h2>
            </div>
        </div>
    </div>
</main>

</body>
</html>
