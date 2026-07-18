<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Board</title>
    <!-- Ajout de Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen font-sans antialiased">

    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-bold text-gray-900">Nouveau Board</h1>
            <p class="text-gray-500 text-sm mt-1">Organisez vos tâches facilement</p>
        </div>

        <form action="{{ route('boards.store') }}" method="POST" class="space-y-5">
            @csrf
            
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Titre du Board</label>
                <!-- Inputs avec focus ring -->
                <input type="text" name="title" id="title" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description (Optionnel)</label>
                <textarea name="description" id="description" rows="3"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"></textarea>
            </div>

            <div class="flex justify-between items-center pt-4">
                <a href="{{ route('boards.index') }}" class="text-gray-500 hover:text-gray-800 text-sm font-medium transition">Annuler</a>
                <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-indigo-700 shadow-sm transition">
                    Sauvegarder
                </button>
            </div>
        </form>
    </div>

</body>
</html>