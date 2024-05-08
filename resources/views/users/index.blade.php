<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Ajout d'une animation pour les cartes */
        .card-animation {
            animation: card-animation 1s ease-in-out;
        }
        @keyframes card-animation {
            0% {
                transform: scale(0.9);
                opacity: 0.7;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
        /* Ajout d'une animation pour les images */
        .image-animation {
            animation: image-animation 2s infinite linear;
        }
        @keyframes image-animation {
            0% {
                filter: brightness(100%);
            }
            50% {
                filter: brightness(80%);
            }
            100% {
                filter: brightness(100%);
            }
        }
    </style>
</head>
<body class="bg-gray-100">
<div class="container mx-auto px-4 py-5">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-semibold mb-4 text-center text-blue-700">Liste des utilisateurs</h1>
        <!-- Ajout d'un bouton pour revenir au tableau de bord -->
        <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors duration-200">Retour au tableau de bord</a>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($users as $user)
            <div class="bg-white shadow-md rounded-lg p-4 card-animation">
                <img src="https://source.unsplash.com/random/200x200?university" alt="Image de l'université" class="w-full h-32 object-cover rounded image-animation">
                <h2 class="text-lg font-semibold text-blue-600 mt-2">{{ $user->name }}</h2>
                <p class="text-gray-700">{{ $user->email }}</p>
                <p class="text-sm text-gray-500">Type d'utilisateur: {{ $user->usertype }}</p>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
