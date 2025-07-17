@extends('backend.layouts.master')
@section('content')
<div class="container">
    <h3>Edit Crop</h3>
    <form method="POST" action="{{ route('crop-recommendations.update', $cropRecommendation->id) }}">
        @csrf @method('PUT')
        <input type="number" name="nitrogen" value="{{ $cropRecommendation->nitrogen }}" class="form-control mb-2">
        <input type="number" name="phosphorus" value="{{ $cropRecommendation->phosphorus }}" class="form-control mb-2">
        <input type="number" name="potassium" value="{{ $cropRecommendation->potassium }}" class="form-control mb-2">
        <input type="text" name="city" value="{{ $cropRecommendation->city }}" class="form-control mb-2">
        <input type="text" name="state" value="{{ $cropRecommendation->state }}" class="form-control mb-2">
        <input type="text" name="recommended_crop" value="{{ $cropRecommendation->recommended_crop }}" class="form-control mb-2">
        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
