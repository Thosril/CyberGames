<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Package de l'utilisateur</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Modifier le Package de l'utilisateur {{ $user->name }}</h1>

        <form action="{{ route('userpackages.update', [$user, $userPackage->pivot->package_id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="package_id" class="block text-sm font-medium text-gray-700">Package</label>
                <select name="package_id" id="package_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    @foreach($packages as $package)
                        <option value="{{ $package->id }}" {{ $package->id == $userPackage->pivot->package_id ? 'selected' : '' }}>
                            {{ $package->name }} - {{ $package->price }}€
                        </option>
                    @endforeach
                </select>
                @error('package_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="reservation_date" class="block text-sm font-medium text-gray-700">Date de Réservation</label>
                <input type="date" name="reservation_date" id="reservation_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $userPackage->pivot->reservation_date }}">
                @error('reservation_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="duration" class="block text-sm font-medium text-gray-700">Durée (en minutes)</label>
                <input type="number" name="duration" id="duration" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $userPackage->pivot->duration }}">
                @error('duration')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Statut</label>
                <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    <option value="confirmée" {{ $userPackage->pivot->status == 'confirmée' ? 'selected' : '' }}>Confirmée</option>
                    <option value="annulée" {{ $userPackage->pivot->status == 'annulée' ? 'selected' : '' }}>Annulée</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium py-2 px-4 rounded-md">Mettre à jour</button>
        </form>
    </div>
</body>
</html>
