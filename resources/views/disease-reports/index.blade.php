@extends('backend.layouts.master')
@section('content')
<div class="container">
    <h3>All Disease Reports</h3>
    <a href="{{ route('disease-reports.create') }}" class="btn btn-success mb-2">Add New</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Crop</th><th>Disease</th><th>Image</th><th>Suggestion</th><th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->crop_name }}</td>
                <td>{{ $item->disease_detected ?? '-' }}</td>
                <td>
                    @if($item->image_path)
                    <img src="{{ asset('storage/' . $item->image_path) }}" width="100">
                    @else
                    No Image
                    @endif
                </td>
                <td>{{ $item->cure_suggestion ?? '-' }}</td>
                <td>
                    <a href="{{ route('disease-reports.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form method="POST" action="{{ route('disease-reports.destroy', $item->id) }}" style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Sure?')" class="btn btn-danger btn-sm">Del</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
