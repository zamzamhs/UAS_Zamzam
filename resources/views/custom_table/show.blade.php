@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Custom Table Entry Details</h1>
        <div class="mb-3">
            <label class="form-label">Field 1:</label>
            <p>{{ $data->field1 }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label">Field 2:</label>
            <p>{{ $data->field2 }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label">Description:</label>
            <p>{{ $data->description }}</p>
        </div>
        <a href="{{ route('custom_table.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
