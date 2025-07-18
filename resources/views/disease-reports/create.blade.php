@extends('backend.layouts.master')
@section('content')
<div class="container">
    <h3>Report Plant Disease</h3>
    <form method="POST" action="{{ route('disease-reports.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="crop_name" placeholder="Crop Name" class="form-control mb-2" required>
        <input type="file" name="image_path" class="form-control mb-2">
        <button class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
