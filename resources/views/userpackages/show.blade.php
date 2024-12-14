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
        <h1 class="text-3xl font-bold mb-6">Détails du Package pour l'utilisateur {{ $user->name }}</h1>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">{{ $userPackage->name }}</h2>

            <p><strong>Date de réservation:</strong> {{ $userPackage->pivot->reservation_date }}</p>
            <p><strong>Durée:</strong> {{ $userPackage->pivot->duration }} minutes</p>
            <p><strong>Statut:</strong> {{ $userPackage->pivot->status }}</p>
        </div>

        <div class="mt-6">
            <a href="{{ route('userpackages.index', $user) }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-md">Retour à la liste</a>
        </div>
    </div>
</body>
</html>
