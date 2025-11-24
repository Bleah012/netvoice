@extends('layouts.app')
@section('title', 'Users')

@section('content')
<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold text-primary-blue">Users</h1>
    <a href="{{ route('users.create') }}" class="btn bg-accent-orange text-white">Add User</a>
  </div>

  <div class="card shadow-sm">
    <div class="card-body p-0">
      <table class="table table-hover mb-0">
        <thead class="table-light">
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @forelse($users as $user)
            <tr>
              <td><a href="{{ route('users.show', $user->id) }}" class="fw-semibold">{{ $user->name }}</a></td>
              <td>{{ $user->email }}</td>
              <td>
                @foreach($user->roles as $role)
                  <span class="badge bg-secondary">{{ $role->name }}</span>
                @endforeach
              </td>
              <td class="text-end">
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="4" class="text-center text-muted py-4">No users found.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <div class="mt-3">{{ $users->links() }}</div>
</div>
@endsection
