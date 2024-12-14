<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Package</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Détails du Package</h1>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold">{{ $package->name }}</h2>
            <p><strong>Prix:</strong> {{ $package->price }} €</p>
            <p><strong>Durée:</strong> {{ $package->duration }} min</p>
            <p><strong>Description:</strong> {{ $package->description ?? 'Aucune description disponible.' }}</p>
            <div class="mt-6">
                <a href="{{ route('packages.edit', $package->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-2 px-4 rounded">Modifier</a>
                <a href="{{ route('packages.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">Retour à la liste</a>
            </div>
        </div>
    </div>
</body>
</html>
