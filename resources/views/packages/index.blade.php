<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Packages</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Packages</h1>
        <a href="{{ route('packages.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded shadow mb-4 inline-block">Ajouter un Package</a>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($packages as $package)
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold">{{ $package->name }}</h2>
                    <p><strong>Prix:</strong> {{ $package->price }} €</p>
                    <p><strong>Durée:</strong> {{ $package->duration }} min</p>
                    <p><strong>Description:</strong> {{ $package->description }}</p>
                    <div class="flex justify-between items-center mt-4">
                        <a href="{{ route('packages.show', $package->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-1 px-3 rounded">Voir Détails</a>
                        <a href="{{ route('packages.edit', $package->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-1 px-3 rounded">Modifier</a>
                        <form action="{{ route('packages.destroy', $package->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-medium py-1 px-3 rounded">Supprimer</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
