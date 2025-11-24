@extends('layouts.app')
@section('title', 'Edit Client')

@section('content')
<div class="container py-5">
  <h1 class="mb-4 text-primary-blue fw-bold">Edit Client</h1>

  <form action="{{ route('clients.update', $client->slug) }}" method="POST" class="p-4 bg-light rounded shadow-sm">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label fw-bold">Name</label>
      <input type="text" name="name" class="form-control" value="{{ old('name', $client->name) }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label fw-bold">Slug</label>
      <input type="text" name="slug" class="form-control" value="{{ old('slug', $client->slug) }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label fw-bold">Contact Email</label>
      <input type="email" name="contact_email" class="form-control" value="{{ old('contact_email', $client->contact_email) }}">
    </div>

    <div class="mb-3">
      <label class="form-label fw-bold">Contact Phone</label>
      <input type="text" name="contact_phone" class="form-control" value="{{ old('contact_phone', $client->contact_phone) }}">
    </div>

    <div class="mb-3">
      <label class="form-label fw-bold">Notes</label>
      <textarea name="notes" rows="4" class="form-control">{{ old('notes', $client->notes) }}</textarea>
    </div>

    <button type="submit" class="btn bg-accent-orange text-white">Update Client</button>
    <a href="{{ route('clients.show', $client->slug) }}" class="btn btn-outline-secondary ms-2">Cancel</a>
  </form>
</div>
@endsection
