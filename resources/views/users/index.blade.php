<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateurs</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Utilisateurs</h1>
        <a href="{{ route('users.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded shadow mb-4 inline-block">Ajouter un utilisateur</a>

        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($users as $user)
            <li class="bg-white rounded-lg shadow-md p-6">
                <div class="border-b-2 border-gray-200 pb-4 mb-4">
                    <h2 class="text-xl font-semibold">{{ $user->name }}</h2>
                    <p class="text-gray-600 text-sm">{{ $user->email }}</p>
                </div>
                <div class="space-y-2 mb-4">
                    <div>
                        <span class="text-sm text-gray-500">Rôle :</span>
                        <span class="text-gray-700">{{ $user->role }}</span>
                    </div>
                    <div>
                        <span class="text-sm text-gray-500">Créé le :</span>
                        <span class="text-gray-700">{{ $user->created_at->format('d/m/Y') }}</span>
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <a href="{{ route('users.show', $user->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-1 px-3 rounded">Voir détails</a>
                    <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-1 px-3 rounded">Modifier</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-medium py-1 px-3 rounded">Supprimer</button>
                    </form>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
