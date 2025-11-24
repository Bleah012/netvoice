@extends('layouts.app')
@section('title', 'Edit User')

@section('content')
<div class="container py-5">
  <h1 class="fw-bold text-primary-blue mb-4">Edit User</h1>

  <form action="{{ route('users.update', $user->id) }}" method="POST" class="p-4 bg-light rounded shadow-sm">
    @csrf @method('PUT')
    <div class="mb-3">
      <label class="form-label fw-bold">Name</label>
      <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
    </div>
    <div class="mb-3">
      <label class="form-label fw-bold">Email</label>
      <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
    </div>
    <div class="mb-3">
      <label class="form-label fw-bold">Roles</label>
      <select name="roles[]" class="form-select" multiple>
        @foreach($roles as $role)
          <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
            {{ $role->name }}
          </option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn bg-accent-orange text-white">Update User</button>
    <a href="{{ route('users.show', $user->id) }}" class="btn btn-outline-secondary ms-2">Cancel</a>
  </form>
</div>
@endsection
