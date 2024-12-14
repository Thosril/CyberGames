@extends('layouts.app')

@section('content')
    <h1>@isset($maintenance) Edit @else Create @endisset Maintenance</h1>

    <form action="@isset($maintenance) {{ route('maintenances.update', $maintenance) }} @else {{ route('maintenances.store') }} @endisset" method="POST">
        @csrf
        @isset($maintenance) @method('PUT') @endisset

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $maintenance->name ?? '') }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description">{{ old('description', $maintenance->description ?? '') }}</textarea>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="datetime-local" class="form-control" name="start_date" value="{{ old('start_date', $maintenance->start_date ?? '') }}">
        </div>

        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="datetime-local" class="form-control" name="end_date" value="{{ old('end_date', $maintenance->end_date ?? '') }}">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control">
                <option value="pending" @selected(old('status', $maintenance->status ?? '') == 'pending')>Pending</option>
                <option value="completed" @selected(old('status', $maintenance->status ?? '') == 'completed')>Completed</option>
                <option value="in_progress" @selected(old('status', $maintenance->status ?? '') == 'in_progress')>In Progress</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
