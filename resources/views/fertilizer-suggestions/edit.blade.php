@extends('backend.layouts.master')
@section('content')
<div class="container">
    <h3>Edit Fertilizer Suggestion</h3>
    <form method="POST" action="{{ route('fertilizer-suggestions.update', $fertilizerSuggestion->id) }}">
        @csrf @method('PUT')
        <input type="text" name="crop_name" value="{{ $fertilizerSuggestion->crop_name }}" class="form-control mb-2">
        <input type="number" name="nitrogen" value="{{ $fertilizerSuggestion->nitrogen }}" class="form-control mb-2">
        <input type="number" name="phosphorus" value="{{ $fertilizerSuggestion->phosphorus }}" class="form-control mb-2">
        <input type="number" name="potassium" value="{{ $fertilizerSuggestion->potassium }}" class="form-control mb-2">
        <textarea name="deficiency" class="form-control mb-2">{{ $fertilizerSuggestion->deficiency }}</textarea>
        <textarea name="suggested_action" class="form-control mb-2">{{ $fertilizerSuggestion->suggested_action }}</textarea>
        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
