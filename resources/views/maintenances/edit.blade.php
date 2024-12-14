@extends('layouts.app')

@section('content')
    <h1>Edit Maintenance</h1>

    <form action="{{ route('maintenances.update', $maintenance) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $maintenance->name) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" required>{{ old('description', $maintenance->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="datetime-local" class="form-control" name="start_date" value="{{ old('start_date', $maintenance->start_date->format('Y-m-d\TH:i')) }}" required>
        </div>

        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="datetime-local" class="form-control" name="end_date" value="{{ old('end_date', $maintenance->end_date->format('Y-m-d\TH:i')) }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="pending" @selected(old('status', $maintenance->status) == 'pending')>Pending</option>
                <option value="completed" @selected(old('status', $maintenance->status) == 'completed')>Completed</option>
                <option value="in_progress" @selected(old('status', $maintenance->status) == 'in_progress')>In Progress</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Maintenance</button>
    </form>
@endsection
