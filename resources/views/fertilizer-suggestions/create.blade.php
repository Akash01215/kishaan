@extends('backend.layouts.master')
@section('content')
<div class="container">
    <h3>Add Fertilizer Suggestion</h3>
    <form method="POST" action="{{ route('fertilizer-suggestions.store') }}">
        @csrf
        <input type="text" name="crop_name" placeholder="Crop Name" class="form-control mb-2">
        <input type="number" step="0.01" name="nitrogen" placeholder="Nitrogen" class="form-control mb-2">
        <input type="number" step="0.01" name="phosphorus" placeholder="Phosphorus" class="form-control mb-2">
        <input type="number" step="0.01" name="potassium" placeholder="Potassium" class="form-control mb-2">
        <button class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
