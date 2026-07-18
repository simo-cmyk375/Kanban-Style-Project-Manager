<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Boards</title>
    <!-- Ajout de Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans antialiased">
    
    <!-- Navbar moderne -->
    <nav class="bg-indigo-600 p-4 shadow-md">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <h1 class="text-white text-xl font-bold">Mon Kanban</h1>
           <form action="{{ route('logout') }}" method="POST" class="inline-block">
                @csrf
                <button type="submit" class="bg-red-50 text-red-600 px-4 py-2 rounded-md font-semibold hover:bg-red-100 transition shadow-sm">
                    Déconnexion
                </button>
            </form>
            <a href="{{ route('boards.create') }}" class="bg-white text-indigo-600 px-4 py-2 rounded-md font-semibold hover:bg-indigo-50 transition">
                + Créer un Board
            </a>
        </div>
    </nav>

    <!-- Contenu principal -->
    <main class="max-w-6xl mx-auto p-6 mt-6">
        
        <!-- Grille responsive pour les boards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($boards as $board)
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition">
                    <h2 class="text-xl font-bold text-gray-900 mb-2">{{ $board->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ $board->description }}</p>
                    <a href="{{route('boards.show',$board->id)}}" class="text-indigo-600 font-medium hover:underline">Ouvrir le board &rarr;</a>
                    <a href="{{route('boards.edit',$board->id)}}" class="text-indigo-600 font-medium hover:underline">edit le board &rarr;</a>
                    <form action="{{ route('boards.destroy', $board->id) }}" method="POST" onsubmit="return confirm('Es-tu sûr de vouloir supprimer ce board ? Cette action est irréversible.');">
                @csrf
                <!-- Laravel a besoin de @method('DELETE') pour comprendre que c'est une suppression -->
                @method('DELETE')
                <button type="submit" class="text-red-600 font-medium hover:text-red-800 hover:underline transition">
                    Supprimer ce board définitivement
                </button>
            </form>
                </div>
                </div>
            @empty
                <!-- Message si l'utilisateur n'a pas encore de board -->
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500 text-lg">Vous n'avez pas encore de board. Créez-en un pour commencer !</p>
                </div>
            @endforelse
        </div>
    </main>

</body>
</html>