@extends('layouts.app')
@section('title', 'Contact Messages')

@section('content')
<div class="container py-5">
  <h1 class="fw-bold text-primary-blue mb-4">Contact Messages</h1>

  @if(session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
  @endif

  <div class="table-responsive shadow-sm rounded">
    <table class="table table-striped align-middle">
      <thead class="table-primary">
        <tr>
          <th>Date</th>
          <th>Name</th>
          <th>Email</th>
          <th>Subject</th>
          <th>Status</th>
          <th class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($messages as $msg)
          <tr>
            <td>{{ $msg->created_at->format('Y-m-d H:i') }}</td>
            <td>{{ $msg->name }}</td>
            <td><a href="mailto:{{ $msg->email }}">{{ $msg->email }}</a></td>
            <td>{{ $msg->subject }}</td>
            <td><span class="badge bg-secondary">{{ ucfirst($msg->status) }}</span></td>
            <td class="text-end">
              <!-- Pass model instance, Laravel uses slug -->
              <a href="{{ route('contact-messages.show', $msg) }}" class="btn btn-sm btn-outline-primary">
                <i class="bi bi-eye"></i> View
              </a>
              <form action="{{ route('contact-messages.destroy', $msg) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger"
                        onclick="return confirm('Are you sure you want to delete this message?')">
                  <i class="bi bi-trash"></i> Delete
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" class="text-center text-muted">No messages found.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mt-3">
    {{ $messages->links() }}
  </div>
</div>
@endsection
