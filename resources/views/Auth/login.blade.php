<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen font-sans antialiased">

    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-bold text-gray-900">Bon retour !</h1>
            <p class="text-gray-500 text-sm mt-1">Connectez-vous pour voir vos boards</p>
        </div>

        <!-- Affichage de l'erreur de connexion -->
        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded-lg text-sm mb-4 text-center">
                {{ session('error') }}
            </div>
        @endif

        <form action="/login" method="POST" class="space-y-5">
            @csrf
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" required value="{{ old('email') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-indigo-700 transition">
                Se connecter
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            Pas encore de compte ? <a href="/register" class="text-indigo-600 font-medium hover:underline">S'inscrire</a>
        </p>
    </div>

</body>
</html>