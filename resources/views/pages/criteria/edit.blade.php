<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Criterion</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="container mx-auto mt-8">
    <div class="max-w-md mx-auto bg-white rounded-md p-8 shadow-md">
        <h2 class="text-2xl font-bold mb-6">Edit Criterion</h2>
        <form action="{{ route('criteria.update', $criterion->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Criterion Name</label>
                <input type="text" name="name" id="name" value="{{ $criterion->name }}" class="w-full border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-400" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-400" required>{{ $criterion->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="valeur" class="block text-gray-700 font-semibold mb-2">Valeur</label>
                <input type="text" name="valeur" id="valeur" value="{{ $criterion->valeur }}" class="w-full border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-400" required>
            </div>
            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Update</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
