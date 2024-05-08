<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criteria List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="container mx-auto mt-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">
            <a href="{{ route('dashboard') }}" class="text-blue-500 hover:underline">
                Dashboard
            </a> / Criteria List
        </h2>
        <a href="{{ route('criteria.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create Criterion
        </a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($criteria as $criterion)
            <div class="bg-white rounded-md p-4 shadow-md hover:shadow-lg transition duration-500">
                <h3 class="text-lg font-semibold text-center text-blue-600">{{ $criterion->name }}</h3>
                <p class="text-sm text-gray-600 text-center">{{ $criterion->description }}</p>
                <p class="text-sm text-gray-600 text-center">{{ $criterion->valeur }}</p>
                <div class="flex justify-around mt-4">
                    <a href="{{ route('criteria.edit', $criterion->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                        Update
                    </a>
                    <form action="{{ route('criteria.destroy', $criterion->id) }}" method="POST">
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
</div>
</body>
</html>
