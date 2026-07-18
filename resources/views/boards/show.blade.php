<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $board->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased">
    
    <!-- Navbar spécifique au Board -->
    <nav class="bg-indigo-600 p-4 shadow-md">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <a href="{{ route('boards.index') }}" class="text-indigo-100 hover:text-white font-medium transition">&larr; Retour aux boards</a>
            <h1 class="text-white text-xl font-bold">{{ $board->title }}</h1>
            <a href="{{ route('boards.edit', $board->id) }}" class="bg-white text-indigo-600 px-4 py-2 rounded-md font-semibold hover:bg-indigo-50 transition">
                Modifier le Board
            </a>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto p-6 mt-6">
        <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Description</h2>
            <!-- On utilise ?? pour afficher un texte par défaut si la description est vide -->
            <p class="text-gray-700 text-lg mb-8">{{ $board->description ?? 'Aucune description fournie.' }}</p>
            
            <hr class="mb-6">

            <!-- Le bouton Supprimer DOIT être dans un formulaire en Laravel -->
            <form action="{{ route('boards.destroy', $board->id) }}" method="POST" onsubmit="return confirm('Es-tu sûr de vouloir supprimer ce board ? Cette action est irréversible.');">
                @csrf
                <!-- Laravel a besoin de @method('DELETE') pour comprendre que c'est une suppression -->
                @method('DELETE')
                <button type="submit" class="text-red-600 font-medium hover:text-red-800 hover:underline transition">
                    Supprimer ce board définitivement
                </button>
            </form>
        </div>
    </main>

</body>
</html>