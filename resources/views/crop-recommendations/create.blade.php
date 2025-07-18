@extends('backend.layouts.master')
@section('content')
<div class="container">
    <h3>Add Crop Recommendation</h3>
    <form method="POST" action="{{ route('crop-recommendations.store') }}">
        @csrf
        <input type="number" name="nitrogen" placeholder="Nitrogen" class="form-control mb-2">
        <input type="number" name="phosphorus" placeholder="Phosphorus" class="form-control mb-2">
        <input type="number" name="potassium" placeholder="Potassium" class="form-control mb-2">
        <input type="text" name="city" placeholder="City" class="form-control mb-2">
        <input type="text" name="state" placeholder="State" class="form-control mb-2">
        <button class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
