@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h1 class="mb-4 text-primary-blue fw-bold">Create Ticket</h1>

  <form action="{{ route('tickets.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label class="form-label fw-bold">Subject</label>
      <input type="text" name="subject" class="form-control" value="{{ old('subject') }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label fw-bold">Description</label>
      <textarea name="description" rows="4" class="form-control">{{ old('description') }}</textarea>
    </div>

    <div class="mb-3">
      <label class="form-label fw-bold">Status</label>
      <select name="status" class="form-select" required>
        <option value="open">Open</option>
        <option value="in_progress">In Progress</option>
        <option value="resolved">Resolved</option>
        <option value="closed">Closed</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label fw-bold">Priority</label>
      <select name="priority" class="form-select" required>
        <option value="low">Low</option>
        <option value="normal">Normal</option>
        <option value="high">High</option>
        <option value="urgent">Urgent</option>
      </select>
    </div>

    <button type="submit" class="btn bg-accent-orange text-white">Create Ticket</button>
    <a href="{{ route('tickets.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
  </form>
</div>
@endsection
