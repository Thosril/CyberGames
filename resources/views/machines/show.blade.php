@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Détails de la machine</h1>
        <ul class="bg-white p-6 rounded-lg shadow-md">
            <li class="py-2 border-b">Processeur : {{ $machine->processeur }}</li>
            <li class="py-2 border-b">Mémoire : {{ $machine->memoire }} Go</li>
            <li class="py-2 border-b">Système d'exploitation : {{ $machine->systeme_exploitation }}</li>
            <li class="py-2 border-b">Date d'achat : {{ $machine->purchase_date->format('d/m/Y') }}</li>
            <li class="py-2 border-b">Statut : {{ $machine->status }}</li>
        </ul>
        <a href="{{ route('machines.edit', $machine->id) }}" class="mt-4 inline-block text-blue-600 hover:text-blue-800">
            Modifier
        </a>
    </div>
@endsection
