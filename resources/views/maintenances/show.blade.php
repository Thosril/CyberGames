@extends('layouts.app')

@section('content')
    <h1>Maintenance Details</h1>

    <div class="card">
        <div class="card-header">
            <h3>{{ $maintenance->name }}</h3>
        </div>

        <div class="card-body">
            <p><strong>Description:</strong> {{ $maintenance->description }}</p>
            <p><strong>Start Date:</strong> {{ $maintenance->start_date->format('d M Y, H:i') }}</p>
            <p><strong>End Date:</strong> {{ $maintenance->end_date->format('d M Y, H:i') }}</p>
            <p><strong>Status:</strong> 
                @if ($maintenance->status == 'pending')
                    <span class="badge badge-warning">Pending</span>
                @elseif ($maintenance->status == 'completed')
                    <span class="badge badge-success">Completed</span>
                @else
                    <span class="badge badge-info">In Progress</span>
                @endif
            </p>
        </div>

        <div class="card-footer">
            <a href="{{ route('maintenances.edit', $maintenance) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('maintenances.destroy', $maintenance) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>

    <a href="{{ route('maintenances.index') }}" class="btn btn-secondary mt-3">Back to All Maintenances</a>
@endsection
