@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h1 class="mb-4 text-primary-blue fw-bold">Contact Messages</h1>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Status</th>
        <th>Received</th>
      </tr>
    </thead>
    <tbody>
      @foreach($messages as $message)
        <tr>
          <td>{{ $message->name }}</td>
          <td>{{ $message->email }}</td>
          <td>
            <a href="{{ route('contact-messages.show', $message->slug ?? $message->id) }}">
              {{ $message->subject }}
            </a>
          </td>
          <td><span class="badge bg-info">{{ ucfirst($message->status) }}</span></td>
          <td>{{ $message->created_at->format('d M Y H:i') }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {{ $messages->links() }}
</div>
@endsection
