@extends('layouts.app')

@section('content')
    <h1>Maintenances</h1>
    <a href="{{ route('maintenances.create') }}" class="btn btn-primary">Add Maintenance</a>
    <table class="table">
        <thead>
            <tr>
                <th>Machine</th>
                <th>Date Maintenance</th>
                <th>Description</th>
                <th>Prochaine Maintenance</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($maintenances as $maintenance)
                <tr>
                    <td>{{ $maintenance->machine->processeur }}</td>
                    <td>{{ $maintenance->date_maintenance }}</td>
                    <td>{{ $maintenance->description }}</td>
                    <td>{{ $maintenance->prochaine_maintenance }}</td>
                    <td>
                        <a href="{{ route('maintenances.edit', $maintenance) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('maintenances.destroy', $maintenance) }}" method="POST" style="display:inline;">
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
