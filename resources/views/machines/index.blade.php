@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-4">Machines</h1>
        <a href="{{ route('machines.create') }}" class="inline-block px-6 py-3 text-white bg-blue-900 hover:bg-blue-800 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 mb-4">
            Add Machine
        </a>
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left border-b">Processeur</th>
                    <th class="px-4 py-2 text-left border-b">Mémoire</th>
                    <th class="px-4 py-2 text-left border-b">Système d'exploitation</th>
                    <th class="px-4 py-2 text-left border-b">Date d'achat</th>
                    <th class="px-4 py-2 text-left border-b">Status</th>
                    <th class="px-4 py-2 text-left border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($machines as $machine)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2 border-b">{{ $machine->processeur }}</td>
                        <td class="px-4 py-2 border-b">{{ $machine->memoire }} GB</td>
                        <td class="px-4 py-2 border-b">{{ $machine->systeme_exploitation }}</td>
                        <td class="px-4 py-2 border-b">{{ $machine->purchase_date }}</td>
                        <td class="px-4 py-2 border-b">{{ $machine->status }}</td>
                        <td class="px-4 py-2 border-b">
                            <a href="{{ route('machines.edit', $machine) }}" class="btn btn-warning text-yellow-500 hover:text-white border-yellow-500 border-2 rounded px-4 py-2">Edit</a>
                            <form action="{{ route('machines.destroy', $machine) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger text-red-500 hover:text-white border-red-500 border-2 rounded px-4 py-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
