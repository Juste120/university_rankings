<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit University</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="container mx-auto mt-8">
    <div class="max-w-md mx-auto bg-white rounded-md p-8 shadow-md">
        <h2 class="text-2xl font-bold mb-6">Edit University</h2>
        <form action="{{ route('universities.update', $university->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">University Name</label>
                <input type="text" name="name" id="name" value="{{ $university->name }}" class="w-full border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-400" required>
            </div>
            <div class="mb-4">
                <label for="localisation" class="block text-gray-700 font-semibold mb-2">Location</label>
                <input type="text" name="localisation" id="localisation" value="{{ $university->localisation }}" class="w-full border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-400" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:border-blue-400" required>{{ $university->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-semibold mb-2">University Image</label>
                <div class="flex items-center">
                    <label for="image-upload" class="cursor-pointer flex items-center">
                        <span class="w-12 h-12 flex justify-center items-center bg-gray-200 rounded-full mr-4">
                            <i class="fas fa-image text-gray-500 text-lg"></i>
                        </span>
                        <span class="text-gray-700 font-medium">Choose an image...</span>
                    </label>
                    <input type="file" name="image" id="image-upload" class="hidden" accept="image/*" onchange="previewImage(event)">
                </div>
                <div class="mt-2">
                    <img id="image-preview" src="{{ asset('storage/university_images/' . $university->image) }}" alt="Image Preview" class="max-w-xs mt-2">
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Update</button>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const imagePreview = document.getElementById('image-preview');
            imagePreview.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
</body>
</html>
