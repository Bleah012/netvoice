@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h1 class="mb-4 text-primary-blue fw-bold">Edit Ticket</h1>

  <form action="{{ route('tickets.update', $ticket->slug ?? $ticket->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label fw-bold">Subject</label>
      <input type="text" name="subject" class="form-control" value="{{ old('subject', $ticket->subject) }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label fw-bold">Description</label>
      <textarea name="description" rows="4" class="form-control">{{ old('description', $ticket->description) }}</textarea>
    </div>

    <div class="mb-3">
      <label class="form-label fw-bold">Status</label>
      <select name="status" class="form-select" required>
        @foreach(['open','in_progress','resolved','closed'] as $status)
          <option value="{{ $status }}" {{ $ticket->status === $status ? 'selected' : '' }}>
            {{ ucfirst(str_replace('_',' ',$status)) }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label fw-bold">Priority</label>
      <select name="priority" class="form-select" required>
        @foreach(['low','normal','high','urgent'] as $priority)
          <option value="{{ $priority }}" {{ $ticket->priority === $priority ? 'selected' : '' }}>
            {{ ucfirst($priority) }}
          </option>
        @endforeach
      </select>
    </div>

    <button type="submit" class="btn bg-accent-orange text-white">Update Ticket</button>
    <a href="{{ route('tickets.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
  </form>
</div>
@endsection
