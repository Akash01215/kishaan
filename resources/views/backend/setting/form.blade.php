@extends('backend.layouts.master')
@section('content')
<form action='' method='POST' enctype="multipart/form-data">
    @csrf
  <div class="mb-3" >
    <label for="sitename" class="form-label">Site Name</label>
    <input type="text" class="form-control" id="sitename" value="{{ old('sitename', $settings['sitename'] ?? '') }}" name='sitename'>
 </div>

  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" class="form-control" id="address" name='address' value="{{ old('address', $settings['address'] ?? '') }}">
  </div>
  
  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" class="form-control" id="phone" name='phone' value="{{ old('phone', $settings['phone'] ?? '') }}">
  </div>

  
  <div class="mb-3">
    <label for="email" class="form-label">email</label>
    <input type="email" class="form-control" id="email" name='email' value="{{ old('email', $settings['email'] ?? '') }}">
  </div>

  
  <div class="mb-3">
    <label for="instagram" class="form-label">Instagram</label>
    <input type="text" class="form-control" id="instagram" name='instagram' value="{{ old('instagram', $settings['instagram'] ?? '') }}">
  </div>

  
  <div class="mb-3">
    <label for="facebook" class="form-label">Facebook</label>
    <input type="text" class="form-control" id="facebook" name='facebook' value="{{ old('facebook', $settings['facebook'] ?? '') }}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    


@endsection