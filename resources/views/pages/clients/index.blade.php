@extends('layouts.app')
@section('title', 'Clients')

@section('content')
<div class="container py-5">

  {{-- Header --}}
  <div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="text-primary-blue fw-bold mb-0">Clients</h1>
    <a href="{{ route('clients.create') }}" class="btn bg-accent-orange text-white">Add Client</a>
  </div>

  {{-- Table --}}
  <div class="card shadow-sm">
    <div class="card-body p-0">
      <table class="table table-hover mb-0">
        <thead class="table-light">
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Projects</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @forelse($clients as $client)
            <tr>
              <td class="fw-semibold">
                <a href="{{ route('clients.show', $client->slug) }}" class="text-decoration-none">{{ $client->name }}</a>
              </td>
              <td class="text-muted">{{ $client->contact_email }}</td>
              <td class="text-muted">{{ $client->contact_phone }}</td>
              <td class="text-muted">{{ $client->projects()->count() }}</td>
              <td class="text-end">
                <a href="{{ route('clients.edit', $client->slug) }}" class="btn btn-sm btn-outline-primary me-2">Edit</a>
                <form action="{{ route('clients.destroy', $client->slug) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center text-muted py-4">No clients found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  {{-- Pagination --}}
  <div class="mt-3">
    {{ $clients->links() }}
  </div>
</div>
@endsection
