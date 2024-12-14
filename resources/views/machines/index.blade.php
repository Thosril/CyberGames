@extends('layouts.app')

@section('content')
    <h1>Machines</h1>
    <a href="{{ route('machines.create') }}" class="btn btn-primary">Add Machine</a>
    <table class="table">
        <thead>
            <tr>
                <th>Processeur</th>
                <th>Mémoire</th>
                <th>Système d'exploitation</th>
                <th>Date d'achat</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($machines as $machine)
                <tr>
                    <td>{{ $machine->processeur }}</td>
                    <td>{{ $machine->memoire }} GB</td>
                    <td>{{ $machine->systeme_exploitation }}</td>
                    <td>{{ $machine->purchase_date }}</td>
                    <td>{{ $machine->status }}</td>
                    <td>
                        <a href="{{ route('machines.edit', $machine) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('machines.destroy', $machine) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
