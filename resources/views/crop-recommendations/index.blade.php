@extends('backend.layouts.master')
@section('content')
<div class="container">
    <h3>All Crop Recommendations</h3>
    <a href="{{ route('crop-recommendations.create') }}" class="btn btn-success mb-2">Add New</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>N</th><th>P</th><th>K</th><th>City</th><th>State</th><th>Recommended</th><th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->nitrogen }}</td>
                <td>{{ $item->phosphorus }}</td>
                <td>{{ $item->potassium }}</td>
                <td>{{ $item->city }}</td>
                <td>{{ $item->state }}</td>
                <td>{{ $item->recommended_crop }}</td>
                <td>
                    <a href="{{ route('crop-recommendations.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form method="POST" action="{{ route('crop-recommendations.destroy', $item->id) }}" style="display:inline;">
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
