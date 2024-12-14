<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Package</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Modifier le Package</h1>

        <form action="{{ route('packages.update', $package->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nom du Package</label>
                <input type="text" id="name" name="name" value="{{ old('name', $package->name) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Prix</label>
                <input type="number" id="price" name="price" value="{{ old('price', $package->price) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="duration" class="block text-sm font-medium text-gray-700">Durée (en minutes)</label>
                <input type="number" id="duration" name="duration" value="{{ old('duration', $package->duration) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">{{ old('description', $package->description) }}</textarea>
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Mettre à jour le Package</button>
            </div>
        </form>

        <a href="{{ route('packages.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">Retour à la liste</a>
    </div>
</body>
</html>
