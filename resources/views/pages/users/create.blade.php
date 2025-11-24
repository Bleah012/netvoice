@extends('layouts.app')
@section('title', 'Create User')

@section('content')
<div class="container py-5">
  <h1 class="fw-bold text-primary-blue mb-4">Add New User</h1>

  <form action="{{ route('users.store') }}" method="POST" class="p-4 bg-light rounded shadow-sm">
    @csrf
    <div class="mb-3">
      <label class="form-label fw-bold">Name</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label fw-bold">Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label fw-bold">Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label fw-bold">Roles</label>
      <select name="roles[]" class="form-select" multiple>
        @foreach($roles as $role)
          <option value="{{ $role->id }}">{{ $role->name }}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn bg-accent-orange text-white">Create User</button>
    <a href="{{ route('users.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
  </form>
</div>
@endsection
