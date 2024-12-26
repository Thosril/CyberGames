@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Modifier la machine</h1>
        <form action="{{ route('machines.update', $machine->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="processeur" class="block text-sm font-medium text-gray-700">Processeur</label>
                <input type="text" name="processeur" id="processeur" value="{{ $machine->processeur }}" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="memoire" class="block text-sm font-medium text-gray-700">Mémoire (Go)</label>
                <input type="number" name="memoire" id="memoire" value="{{ $machine->memoire }}" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="systeme_exploitation" class="block text-sm font-medium text-gray-700">Système d'exploitation</label>
                <input type="text" name="systeme_exploitation" id="systeme_exploitation" value="{{ $machine->systeme_exploitation }}" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="purchase_date" class="block text-sm font-medium text-gray-700">Date d'achat</label>
                <input type="date" name="purchase_date" id="purchase_date" value="{{ \Carbon\Carbon::parse($machine->purchase_date)->format('Y-m-d') }}" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Statut</label>
                <select name="status" id="status" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="disponible" {{ $machine->status == 'disponible' ? 'selected' : '' }}>Disponible</option>
                    <option value="en maintenance" {{ $machine->status == 'en maintenance' ? 'selected' : '' }}>En maintenance</option>
                    <option value="reservé" {{ $machine->status == 'reservé' ? 'selected' : '' }}>Réservé</option>
                </select>
            </div>

            <button type="submit" class="w-full px-6 py-3 text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50">
                Sauvegarder
            </button>
        </form>
    </div>
@endsection
