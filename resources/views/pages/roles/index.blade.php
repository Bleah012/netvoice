@extends('layouts.app')
@section('title', 'Roles')

@section('content')
<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="fw-bold text-primary-blue">Roles</h1>
    <a href="{{ route('roles.create') }}" class="btn bg-accent-orange text-white">Add Role</a>
  </div>

  <div class="card shadow-sm">
    <div class="card-body p-0">
      <table class="table table-hover mb-0">
        <thead class="table-light">
          <tr>
            <th>Name</th>
            <th>Users</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @forelse($roles as $role)
            <tr>
              <td><a href="{{ route('roles.show', $role->id) }}" class="fw-semibold">{{ $role->name }}</a></td>
              <td>{{ $role->users()->count() }}</td>
              <td class="text-end">
                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="3" class="text-center text-muted py-4">No roles found.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <div class="mt-3">{{ $roles->links() }}</div>
</div>
@endsection
