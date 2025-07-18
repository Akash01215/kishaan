@extends('backend.layouts.master')
@section('content')
<div class="container">
    <h3>Fertilizer Suggestions</h3>
    <a href="{{ route('fertilizer-suggestions.create') }}" class="btn btn-success mb-2">Add New</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Crop</th><th>N</th><th>P</th><th>K</th><th>Deficiency</th><th>Suggestion</th><th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->crop_name }}</td>
                <td>{{ $item->nitrogen }}</td>
                <td>{{ $item->phosphorus }}</td>
                <td>{{ $item->potassium }}</td>
                <td>{{ $item->deficiency ?? '-' }}</td>
                <td>{{ $item->suggested_action ?? '-' }}</td>
                <td>
                    <a href="{{ route('fertilizer-suggestions.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form method="POST" action="{{ route('fertilizer-suggestions.destroy', $item->id) }}" style="display:inline;">
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
