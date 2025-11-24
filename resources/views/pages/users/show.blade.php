@extends('layouts.app')
@section('title', $user->name)

@section('content')
<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold text-primary-blue">{{ $user->name }}</h1>
    <div>
      <a href="{{ route('users.edit', $user->id) }}" class="btn btn-outline-primary me-2">Edit</a>
      <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">← Back</a>
    </div>
  </div>

  <div class="card shadow-sm mb-4">
    <div class="card-body">
      <p><strong>Email:</strong> {{ $user->email }}</p>
      <p><strong>Roles:</strong>
        @foreach($user->roles as $role)
          <span class="badge bg-secondary">{{ $role->name }}</span>
        @endforeach
      </p>
    </div>
  </div>
</div>
@endsection
