@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h1 class="mb-4 text-primary-blue fw-bold">{{ $contactMessage->subject }}</h1>

  <p><strong>From:</strong> {{ $contactMessage->name }} ({{ $contactMessage->email }})</p>
  @if($contactMessage->phone)
    <p><strong>Phone:</strong> {{ $contactMessage->phone }}</p>
  @endif

  <p><strong>Status:</strong> <span class="badge bg-info">{{ ucfirst($contactMessage->status) }}</span></p>

  <div class="mt-3">
    {!! nl2br(e($contactMessage->message)) !!}
  </div>

  <form action="{{ route('contact-messages.update', $contactMessage->slug ?? $contactMessage->id) }}" method="POST" class="mt-4">
    @csrf
    @method('PUT')
    <label class="form-label fw-bold">Update Status</label>
    <select name="status" class="form-select">
      @foreach(['new','reviewed','responded','archived'] as $status)
        <option value="{{ $status }}" {{ $contactMessage->status === $status ? 'selected' : '' }}>
          {{ ucfirst($status) }}
        </option>
      @endforeach
    </select>
    <button type="submit" class="btn bg-accent-orange text-white mt-2">Update</button>
  </form>

  <form action="{{ route('contact-messages.destroy', $contactMessage->slug ?? $contactMessage->id) }}" method="POST" class="mt-3">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete Message</button>
  </form>

  <div class="mt-4">
    <a href="{{ route('contact-messages.index') }}" class="btn btn-outline-secondary">← Back to messages</a>
  </div>
</div>
@endsection
