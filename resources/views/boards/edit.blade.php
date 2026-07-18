<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier {{ $board->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen font-sans antialiased">

    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-bold text-gray-900">Modifier le Board</h1>
        </div>

        <form action="{{ route('boards.update', $board->id) }}" method="POST" class="space-y-5">
            @csrf
            <!-- Les navigateurs web ne comprennent que GET et POST. Laravel utilise @method('PUT') pour forcer une mise à jour RESTful -->
            @method('PUT')
            
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Titre du Board</label>
                <!-- On pré-remplit avec la valeur de la BDD : value="{{ $board->title }}" -->
                <input type="text" name="title" id="title" value="{{ $board->title }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <!-- Pour un textarea, la valeur va ENTRE les balises -->
                <textarea name="description" id="description" rows="3"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition">{{ $board->description }}</textarea>
            </div>

            <div class="flex justify-between items-center pt-4">
                <a href="{{ route('boards.show', $board->id) }}" class="text-gray-500 hover:text-gray-800 text-sm font-medium transition">Annuler</a>
                <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-indigo-700 shadow-sm transition">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>

</body>
</html>