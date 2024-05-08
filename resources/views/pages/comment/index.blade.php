<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des commentaires</title>
    <!-- Mettez vos liens CSS, scripts, etc. ici -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            color: #374151;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .comment {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 15px;
            margin-bottom: 20px;
        }
        .comment p {
            margin: 0;
            padding: 0;
        }
        .comment .user {
            font-weight: bold;
            color: #1f2937;
        }
        .comment .university {
            color: #6b7280;
        }
        .back-btn {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
        }
        .back-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Liste des commentaires</h2>
    @forelse($comments as $comment)
        <div class="comment">
            <p><span class="user">{{ $comment->user ? $comment->user->name : 'Utilisateur inconnu' }}</span> a commenté sur <span class="university">{{ $comment->university ? $comment->university->name : 'Université inconnue' }}</span>:</p>
            <p>{{ $comment->content }}</p>
        </div>
    @empty
        <p>Aucun commentaire trouvé.</p>
    @endforelse

    <a href="{{ route('dashboard') }}" class="back-btn">Retour au dashboard</a>
</div>
</body>
</html>
