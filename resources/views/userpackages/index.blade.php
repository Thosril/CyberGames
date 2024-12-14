<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Packages de l'utilisateur</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Packages de l'utilisateur {{ $user->name }}</h1>
        <a href="{{ route('userpackages.create', $user) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded shadow mb-4 inline-block">Ajouter un package</a>

        <ul class="space-y-4">
            @foreach ($userPackages as $userPackage)
            <li class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold">{{ $userPackage->name }} - {{ $userPackage->pivot->status }}</h2>
                <p>Date de réservation : {{ $userPackage->pivot->reservation_date }}</p>
                <p>Durée : {{ $userPackage->pivot->duration }} minutes</p>
                <a href="{{ route('userpackages.show', [$user, $userPackage->pivot->package_id]) }}" class="text-blue-500">Voir détails</a>
                <a href="{{ route('userpackages.edit', [$user, $userPackage->pivot->package_id]) }}" class="text-yellow-500">Modifier</a>
                <form action="{{ route('userpackages.destroy', [$user, $userPackage->pivot->package_id]) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Supprimer</button>
                </form>
            </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
