@extends('layouts.app')
@section('title', $role->name)

@section('content')
<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold text-primary-blue">{{ $role->name }}</h1>
    <div>
      <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-outline-primary me-2">Edit</a>
      <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary">← Back</a>
    </div>
  </div>

  <div class="card shadow-sm mb-4">
    <div class="card-body">
      <p><strong>Users with this role:</strong></p>
      <ul>
        @foreach($role->users as $user)
          <li>{{ $user->name }} ({{ $user->email }})</li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
@endsection
