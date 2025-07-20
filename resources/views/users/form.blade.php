<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}" required>
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}" required>
</div>

{{-- Add password only when creating new user --}}
@if (!isset($user))
<div class="form-group">
    <label>Password</label>
    <input type="password" name="password" class="form-control" required>
</div>
@endif
