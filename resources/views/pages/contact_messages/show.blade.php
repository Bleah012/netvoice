@extends('layouts.app')
@section('title', 'View Message')

@section('content')
<div class="container py-5">
  <h1 class="fw-bold text-primary-blue mb-4">Message Details</h1>

  {{-- Toast Notification --}}
  @if(session('success'))
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1055;">
      <div class="toast align-items-center text-white bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
          <div class="toast-body">
            {{ session('success') }}
          </div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>
    </div>
    <script>
      const toastEl = document.querySelector('.toast');
      if (toastEl) {
        const toast = new bootstrap.Toast(toastEl, { delay: 5000 });
        toast.show();
      }
    </script>
  @endif

  <a href="{{ route('contact-messages.index') }}" class="btn btn-outline-secondary mb-3">
    <i class="bi bi-arrow-left"></i> Back to Messages
  </a>

  {{-- Status Color Mapping --}}
  @php
    $statusColors = [
      'new' => 'secondary',
      'reviewed' => 'info',
      'responded' => 'success',
      'archived' => 'dark',
    ];
  @endphp

  <div class="card shadow-sm">
    <div class="card-body">
      <h5 class="card-title">{{ $contactMessage->subject }}</h5>
      <p class="text-muted mb-3">Received on {{ $contactMessage->created_at->format('Y-m-d H:i') }}</p>

      <dl class="row">
        <dt class="col-sm-3">From</dt>
        <dd class="col-sm-9">{{ $contactMessage->name }}</dd>

        <dt class="col-sm-3">Email</dt>
        <dd class="col-sm-9"><a href="mailto:{{ $contactMessage->email }}">{{ $contactMessage->email }}</a></dd>

        <dt class="col-sm-3">Phone</dt>
        <dd class="col-sm-9">{{ $contactMessage->phone ?? 'N/A' }}</dd>

        <dt class="col-sm-3">Status</dt>
        <dd class="col-sm-9">
          <span class="badge bg-{{ $statusColors[$contactMessage->status] ?? 'secondary' }}">
            {{ ucfirst($contactMessage->status) }}
          </span>
        </dd>
      </dl>

      <hr>
      <p>{{ $contactMessage->message }}</p>
    </div>

    <div class="card-footer d-flex justify-content-between">
      {{-- Status Update --}}
      <form action="{{ route('contact-messages.update', $contactMessage) }}" method="POST" class="d-flex gap-2">
        @csrf @method('PUT')
        <select name="status" class="form-select form-select-sm w-auto">
          @foreach(['new','reviewed','responded','archived'] as $status)
            <option value="{{ $status }}" @selected($contactMessage->status === $status)>
              {{ ucfirst($status) }}
            </option>
          @endforeach
        </select>
        <button type="submit" class="btn btn-sm btn-outline-secondary">
          <i class="bi bi-check2-circle"></i> Update Status
        </button>
      </form>

      {{-- Delete Message --}}
      <form action="{{ route('contact-messages.destroy', $contactMessage) }}" method="POST">
        @csrf @method('DELETE')
        <button type="submit" class="btn btn-sm btn-outline-danger"
                onclick="return confirm('Are you sure you want to delete this message?')">
          <i class="bi bi-trash"></i> Delete
        </button>
      </form>
    </div>
  </div>
</div>
@endsection
