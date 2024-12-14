<!-- resources/views/users/show.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'utilisateur</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto py-8">
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h1 class="text-3xl font-semibold mb-4">Détails de l'utilisateur</h1>
            
            <div class="space-y-4">
                <!-- Nom de l'utilisateur -->
                <div>
                    <span class="text-lg font-medium text-gray-700">Nom :</span>
                    <p class="text-gray-600">{{ $user->name }}</p>
                </div>
                
                <!-- Email de l'utilisateur -->
                <div>
                    <span class="text-lg font-medium text-gray-700">Email :</span>
                    <p class="text-gray-600">{{ $user->email }}</p>
                </div>
                
                <!-- Rôle de l'utilisateur -->
                <div>
                    <span class="text-lg font-medium text-gray-700">Rôle :</span>
                    <p class="text-gray-600">{{ $user->role }}</p>
                </div>
                
                <!-- Date de création du compte -->
                <div>
                    <span class="text-lg font-medium text-gray-700">Compte créé le :</span>
                    <p class="text-gray-600">{{ $user->created_at->format('d/m/Y') }}</p>
                </div>

                <!-- Dernière mise à jour -->
                <div>
                    <span class="text-lg font-medium text-gray-700">Dernière mise à jour :</span>
                    <p class="text-gray-600">{{ $user->updated_at->format('d/m/Y') }}</p>
                </div>
            </div>

            <!-- Boutons pour modifier ou revenir à la liste -->
            <div class="flex justify-between mt-6">
                <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-2 px-4 rounded">Modifier l'utilisateur</a>
                <a href="{{ route('users.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded">Retour à la liste</a>
            </div>
        </div>
    </div>
</body>
</html>
