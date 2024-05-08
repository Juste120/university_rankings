<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="container mx-auto mt-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">University List</h2>
        <a href="{{ route('universities.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create University
        </a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($universities as $university)
            <div class="bg-white rounded-md p-4 shadow-md hover:shadow-lg transition duration-500">
                @if($university->image)
                    <img src="{{ asset('storage/university_images/' . $university->image) }}" alt="{{ $university->name }}" class="w-full h-40 object-cover mx-auto mb-4 rounded-md">
                @else
                    <div class="w-full h-40 bg-gray-200"></div>
                @endif
                <h3 class="text-lg font-semibold text-center text-blue-600">{{ $university->name }}</h3>
                <p class="text-sm text-gray-600 text-center">{{ $university->localisation }}</p>
                <div class="flex justify-around mt-4">
                    <a href="{{ route('universities.edit', $university->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                        Update
                    </a>
                    <form action="{{ route('universities.destroy', $university->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-8">
        <!-- Ajoutez un lien vers la page d'accueil de l'administrateur -->
        <a href="{{ route('dashboard') }}" class="text-blue-500 hover:underline">Back to Admin Home</a>
    </div>
</div>
</body>
</html>
