<!-- resources/views/users/create.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un utilisateur</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Créer un utilisateur</h1>
        <form action="{{ route('users.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Nom</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="border border-gray-300 rounded px-3 py-2 w-full" required>
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="border border-gray-300 rounded px-3 py-2 w-full" required>
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium mb-2">Mot de passe</label>
                <input type="password" id="password" name="password" class="border border-gray-300 rounded px-3 py-2 w-full" required>
                @error('password')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Confirmer le mot de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="border border-gray-300 rounded px-3 py-2 w-full" required>
            </div>

            <div class="mb-4">
                <label for="role" class="block text-gray-700 font-medium mb-2">Rôle</label>
                <select id="role" name="role" class="border border-gray-300 rounded px-3 py-2 w-full">
                    <option value="joueur" {{ old('role') == 'joueur' ? 'selected' : '' }}>Joueur</option>
                    <option value="employé" {{ old('role') == 'employé' ? 'selected' : '' }}>Employé</option>
                </select>
                @error('role')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded">Créer</button>
            </div>
        </form>
    </div>
</body>
</html>
