@extends('backend.layouts.master')

@section('content')
<div class="container">
    <h2>Create New User</h2>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        @include('users.form')
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
