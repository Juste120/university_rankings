<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to university rankings</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .btn {
            display: inline-block;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn:hover {
            background-color: rgba(52, 152, 219, 0.8); /* Couleur bleue assombrie */
        }

        .btn-primary {
            background-color: #3498db;
            color: white;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        .btn-secondary {
            background-color: #e74c3c;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
<div class="bg-gradient-to-r from-gray-200 to-gray-300 min-h-screen flex flex-col justify-center items-center">
    <h2 class="text-4xl font-bold text-gray-800 mb-8">Welcome to university rankings</h2>
    <div class="flex space-x-8">
        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
        @endif
    </div>
</div>
</body>
</html>
