@extends('layouts.app')
@section('title', 'Create Role')

@section('content')
<div class="container py-5">
  <h1 class="fw-bold text-primary-blue mb-4">Add New Role</h1>

  <form action="{{ route('roles.store') }}" method="POST" class="p-4 bg-light rounded shadow-sm">
    @csrf
    <div class="mb-3">
      <label class="form-label fw-bold">Name</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <button type="submit" class="btn bg-accent-orange text-white">Create Role</button>
    <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
  </form>
</div>
@endsection
