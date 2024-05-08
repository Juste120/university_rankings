<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Display logo -->
                    <div class="flex items-center justify-center mb-4">
                        <img class="h-16 w-auto" src="{{ asset('storage/logo/logo-university.webp') }}" alt="University Logo">
                    </div>
                    <!-- Display universities -->
                    <h3 class="text-lg font-semibold mb-4">{{ __('Universities') }}</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($universities as $university)
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                <img src="{{ asset('storage/university_images/'. $university->image) }}" alt="{{ $university->name }}" class="w-full h-40 object-cover mb-4">
                                <h4 class="text-xl font-semibold mb-2">{{ $university->name }}</h4>
                                <p class="text-gray-700 dark:text-gray-200">{{ __('Location') }}: {{ $university->localisation }}</p>

                                <!-- Add more details as needed -->
                                <!-- Add rating and comment buttons -->
                                <button class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                                    {{ __('Rate') }}
                                </button>
                                <button class="mt-4 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    {{ __('Comment') }}
                                </button>

                                <!-- Comment form -->
                                <form action="{{ route('comment.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="university_id" value="{{ $university->id }}">
                                    <textarea name="content" rows="3" placeholder="Your comment" class="block w-full mt-4 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"></textarea>
                                    <button type="submit" class="mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        {{ __('Submit') }}
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
