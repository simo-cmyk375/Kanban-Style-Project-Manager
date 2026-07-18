<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Kanban - Organisez vos projets</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 font-sans antialiased text-gray-900">

    <!-- Navbar -->
    <nav class="bg-white/80 backdrop-blur-md fixed w-full z-10 border-b border-gray-100">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="text-2xl font-extrabold text-indigo-600 tracking-tight">
                Kanban<span class="text-gray-800">Pro</span>
            </div>
            
            <div class="space-x-4">
                @auth
                    <!-- Si l'utilisateur est déjà connecté -->
                    <a href="{{ route('boards.index') }}" class="text-gray-600 font-medium hover:text-indigo-600 transition">Aller à mes Boards</a>
                @else
                    <!-- Si l'utilisateur est un visiteur (guest) -->
                    <a href="{{ route('login.page') }}" class="text-gray-600 font-medium hover:text-indigo-600 transition">Se connecter</a>
                    <a href="{{ route('register.page') }}" class="bg-indigo-600 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-indigo-700 transition shadow-md hover:shadow-lg">
                        Commencer gratuitement
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <main class="pt-32 pb-16 px-4">
        <div class="max-w-6xl mx-auto text-center">
            <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 leading-tight mb-6">
                Gérez vos projets avec <br class="hidden md:block">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">une clarté absolue.</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-500 mb-10 max-w-2xl mx-auto">
                La méthode Kanban simplifiée. Créez des boards, organisez vos listes, et faites glisser vos tâches de "À faire" jusqu'à "Terminé" en un clin d'œil.
            </p>
            
            <div class="flex justify-center space-x-4 mb-16">
                @guest
                    <a href="{{ route('register.page') }}" class="bg-indigo-600 text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-indigo-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        Créer mon premier Board
                    </a>
                @endguest
            </div>

            <!-- Image de présentation (Mockup) -->
            <div class="relative max-w-5xl mx-auto">
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-500 to-purple-500 transform skew-y-2 rounded-3xl -z-10 opacity-20 blur-xl"></div>
                <img src="https://images.unsplash.com/photo-1611224923853-80b023f02d71?q=80&w=2000&auto=format&fit=crop" 
                     alt="Interface Kanban" 
                     class="rounded-2xl shadow-2xl border border-gray-200">
            </div>
        </div>
    </main>

    <!-- Features Section -->
    <section class="bg-white py-20 border-t border-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-12 text-center">
                
                <!-- Feature 1 -->
                <div>
                    <div class="bg-indigo-100 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 text-indigo-600 text-2xl">
                        📋
                    </div>
                    <h3 class="text-xl font-bold mb-3">Espaces Séparés</h3>
                    <p class="text-gray-500">Créez un board distinct pour chaque projet. Ne mélangez plus jamais vos tâches.</p>
                </div>

                <!-- Feature 2 -->
                <div>
                    <div class="bg-purple-100 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 text-purple-600 text-2xl">
                        ⚡
                    </div>
                    <h3 class="text-xl font-bold mb-3">Mise à jour fluide</h3>
                    <p class="text-gray-500">Un système de listes intuitif pour suivre l'avancement de chaque étape de votre travail.</p>
                </div>

                <!-- Feature 3 -->
                <div>
                    <div class="bg-blue-100 w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6 text-blue-600 text-2xl">
                        🔒
                    </div>
                    <h3 class="text-xl font-bold mb-3">100% Sécurisé</h3>
                    <p class="text-gray-500">Vos projets sont privés. Notre système d'authentification garantit que vous seul y avez accès.</p>
                </div>

            </div>
        </div>
    </section>

</body>
</html>