@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h1 class="mb-4 text-primary-blue fw-bold">Support Tickets</h1>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Subject</th>
        <th>Status</th>
        <th>Priority</th>
        <th>Client</th>
        <th>Assigned</th>
        <th>Created</th>
      </tr>
    </thead>
    <tbody>
      @foreach($tickets as $ticket)
        <tr>
          <td>
            <a href="{{ route('tickets.show', $ticket->slug ?? $ticket->id) }}">
              {{ $ticket->subject }}
            </a>
          </td>
          <td><span class="badge bg-info">{{ ucfirst($ticket->status) }}</span></td>
          <td><span class="badge bg-warning">{{ ucfirst($ticket->priority) }}</span></td>
          <td>{{ $ticket->client->name ?? 'N/A' }}</td>
          <td>{{ $ticket->assignedUser->name ?? 'Unassigned' }}</td>
          <td>{{ $ticket->created_at->format('d M Y') }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {{ $tickets->links() }}
</div>
@endsection
