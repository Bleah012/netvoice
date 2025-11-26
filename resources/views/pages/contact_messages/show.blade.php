@extends('layouts.app')
@section('title', 'View Message')

@section('content')
<div class="container py-5">
  <h1 class="fw-bold text-primary-blue mb-4">Message Details</h1>

  @if(session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
  @endif

  <a href="{{ route('contact-messages.index') }}" class="btn btn-outline-secondary mb-3">
    <i class="bi bi-arrow-left"></i> Back to Messages
  </a>

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
        <dd class="col-sm-9"><span class="badge bg-secondary">{{ ucfirst($contactMessage->status) }}</span></dd>
      </dl>

      <hr>
      <p>{{ $contactMessage->message }}</p>
    </div>
    <div class="card-footer d-flex justify-content-between">
      <!-- Pass model instance, Laravel uses slug automatically -->
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
