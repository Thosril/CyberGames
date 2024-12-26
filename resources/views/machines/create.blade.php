@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Ajouter une nouvelle machine</h1>
        <form method="POST" action="{{ route('machines.store') }}" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="processeur" class="block text-sm font-medium text-gray-700">Processeur</label>
                <input id="processeur" type="text" name="processeur" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="memoire" class="block text-sm font-medium text-gray-700">Mémoire (Go)</label>
                <input id="memoire" type="number" name="memoire" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="systeme_exploitation" class="block text-sm font-medium text-gray-700">Système d'exploitation</label>
                <input id="systeme_exploitation" type="text" name="systeme_exploitation" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="purchase_date" class="block text-sm font-medium text-gray-700">Date d'achat</label>
                <input id="purchase_date" type="date" name="purchase_date" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="install_games" class="block text-sm font-medium text-gray-700">Jeux installés</label>
                <textarea id="install_games" name="install_games" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Statut</label>
                <select id="status" name="status" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="disponible">Disponible</option>
                    <option value="en maintenance">En maintenance</option>
                    <option value="reservé">Réservé</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="last_maintenance" class="block text-sm font-medium text-gray-700">Dernière maintenance</label>
                <input id="last_maintenance" type="date" name="last_maintenance" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <button type="submit" class="w-full px-6 py-3 text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50">
                Créer la machine
            </button>
        </form>
    </div>
@endsection
