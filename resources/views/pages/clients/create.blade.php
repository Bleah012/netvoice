@extends('layouts.app')
@section('title', 'Create Client')

@section('content')
<div class="container py-5">
  <h1 class="mb-4 text-primary-blue fw-bold">Add New Client</h1>

  <form action="{{ route('clients.store') }}" method="POST" class="p-4 bg-light rounded shadow-sm">
    @csrf

    <div class="mb-3">
      <label for="name" class="form-label fw-bold">Name</label>
      <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <div class="mb-3">
      <label for="slug" class="form-label fw-bold">Slug</label>
      <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug') }}" readonly>
    </div>

    <div class="mb-3">
      <label for="contact_email" class="form-label fw-bold">Contact Email</label>
      <input type="email" id="contact_email" name="contact_email" class="form-control" value="{{ old('contact_email') }}">
    </div>

    <div class="mb-3">
      <label for="contact_phone" class="form-label fw-bold">Contact Phone</label>
      <input type="text" id="contact_phone" name="contact_phone" class="form-control" value="{{ old('contact_phone') }}">
    </div>

    <div class="mb-3">
      <label for="notes" class="form-label fw-bold">Notes</label>
      <textarea id="notes" name="notes" rows="4" class="form-control">{{ old('notes') }}</textarea>
    </div>

    <button type="submit" class="btn bg-accent-orange text-white">Create Client</button>
    <a href="{{ route('clients.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
  </form>
</div>

{{-- Live Slug Preview --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
  const nameInput = document.getElementById('name');
  const slugInput = document.getElementById('slug');

  nameInput.addEventListener('input', function () {
    const slug = nameInput.value
      .toLowerCase()
      .trim()
      .replace(/\s+/g, '-')        // Replace spaces with hyphens
      .replace(/[^a-z0-9\-]/g, '') // Remove non-alphanumeric
      .replace(/\-+/g, '-');       // Collapse multiple hyphens

    slugInput.value = slug;
  });
});
</script>
@endsection
