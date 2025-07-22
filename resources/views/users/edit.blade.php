@extends('backend.layouts.master')

@section('content')
<div class="container">
    <h2>Edit User</h2>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
       @method('PUT')
        @include('users.form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
