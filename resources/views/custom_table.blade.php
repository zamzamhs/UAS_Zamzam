@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Custom Table List</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('custom_table.create') }}" class="btn btn-primary mb-3">Add Entry</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Field1</th>
                    <th>Field2</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entries as $entry)
                    <tr>
                        <td>{{ $entry->id }}</td>
                        <td>{{ $entry->field1 }}</td>
                        <td>{{ $entry->field2 }}</td>
                        <td>{{ $entry->description }}</td>
                        <td>
                            <a href="{{ route('custom_table.show', $entry) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('custom_table.edit', $entry) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('custom_table.destroy', $entry) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
