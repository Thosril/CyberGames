<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Package</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Ajouter un Package</h1>

        <form action="{{ route('packages.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nom du Package</label>
                <input type="text" id="name" name="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Prix</label>
                <input type="number" id="price" name="price" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="duration" class="block text-sm font-medium text-gray-700">Durée (en minutes)</label>
                <input type="number" id="duration" name="duration" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm"></textarea>
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Créer le Package</button>
            </div>
        </form>
    </div>
</body>
</html>
