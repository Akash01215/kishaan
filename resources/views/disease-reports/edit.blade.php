@extends('backend.layouts.master')
@section('content')
<div class="container">
    <h3>Edit Disease Report</h3>
    <form method="POST" action="{{ route('disease-reports.update', $diseaseReport->id) }}">
        @csrf @method('PUT')
        <input type="text" name="crop_name" value="{{ $diseaseReport->crop_name }}" class="form-control mb-2">
        <input type="text" name="disease_detected" value="{{ $diseaseReport->disease_detected }}" class="form-control mb-2">
        <textarea name="cure_suggestion" class="form-control mb-2">{{ $diseaseReport->cure_suggestion }}</textarea>
        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
