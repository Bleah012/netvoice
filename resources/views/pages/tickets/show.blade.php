@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h1 class="mb-4 text-primary-blue fw-bold">{{ $ticket->subject }}</h1>

  <p class="text-muted">Status: <span class="badge bg-info">{{ ucfirst($ticket->status) }}</span></p>
  <p class="text-muted">Priority: <span class="badge bg-warning">{{ ucfirst($ticket->priority) }}</span></p>

  <div class="mt-3">
    {!! nl2br(e($ticket->description)) !!}
  </div>

  <div class="mt-4">
    <a href="{{ route('tickets.index') }}" class="btn btn-outline-secondary">← Back to tickets</a>
  </div>
</div>
@endsection
