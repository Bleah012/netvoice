@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
  <div class="row">
    {{-- Sidebar --}}
    <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar shadow-sm">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active text-primary-blue" href="{{ route('dashboard') }}">
              <i class="bi bi-speedometer2"></i> Overview
            </a>
          </li>
          <li class="nav-item"><a class="nav-link text-muted" href="{{ route('clients.index') }}"><i class="bi bi-people"></i> Clients</a></li>
          <li class="nav-item"><a class="nav-link text-muted" href="{{ route('projects.index') }}"><i class="bi bi-folder"></i> Projects</a></li>
          <li class="nav-item"><a class="nav-link text-muted" href="{{ route('tickets.index') }}"><i class="bi bi-life-preserver"></i> Support Tickets</a></li>
          <li class="nav-item"><a class="nav-link text-muted" href="{{ route('users.index') }}"><i class="bi bi-person"></i> Users</a></li>
          <li class="nav-item"><a class="nav-link text-muted" href="{{ route('roles.index') }}"><i class="bi bi-shield-lock"></i> Roles</a></li>
          @if(auth()->user()?->isAdmin())
            <li class="nav-item"><a class="nav-link text-muted" href="{{ route('plans.index') }}"><i class="bi bi-credit-card"></i> Plans</a></li>
          @endif
        </ul>
      </div>
    </nav>

    {{-- Main content --}}
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

      {{-- KPI Cards --}}
      <div class="row g-3 mb-4">
        <div class="col-md-3">
          <div class="card shadow-sm h-100 text-center">
            <div class="card-body">
              <h6 class="text-muted">Total Projects</h6>
              <div class="fs-3 fw-bold">{{ $totalProjects }}</div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card shadow-sm h-100 text-center">
            <div class="card-body">
              <h6 class="text-muted">Active Support Tickets</h6>
              <div class="fs-3 fw-bold">{{ $activeTicketsCount }}</div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card shadow-sm h-100 text-center">
            <div class="card-body">
              <h6 class="text-muted">New Clients</h6>
              <div class="fs-3 fw-bold">{{ $newClientsCount }}</div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card shadow-sm h-100 text-center">
            <div class="card-body">
              <h6 class="text-muted">Notifications</h6>
              <div class="fs-3 fw-bold">{{ $notificationsCount }}</div>
            </div>
          </div>
        </div>
      </div>

      {{-- Recent Projects & Active Tickets --}}
      <div class="row g-4 mb-5">
        <div class="col-lg-6">
          <div class="card shadow-sm">
            <div class="card-header bg-white">
              <h5 class="mb-0">Recent Projects</h5>
            </div>
            <div class="card-body">
              <ul class="list-group list-group-flush">
                @forelse($projectsRecent as $p)
                  @php
                    $map = ['completed' => 'success', 'in_progress' => 'warning', 'pending' => 'secondary'];
                    $color = $map[strtolower($p->status)] ?? 'info';
                  @endphp
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $p->name }}</span>
                    <span class="badge text-bg-{{ $color }}">{{ ucwords(str_replace('_',' ', $p->status)) }}</span>
                  </li>
                @empty
                  <li class="list-group-item text-muted">No recent projects.</li>
                @endforelse
              </ul>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card shadow-sm">
            <div class="card-header bg-white">
              <h5 class="mb-0">Active Support Tickets</h5>
            </div>
            <div class="card-body table-responsive">
              <table class="table align-middle">
                <thead>
                  <tr><th>Subject</th><th>Priority</th><th>Status</th><th>Created</th></tr>
                </thead>
                <tbody>
                  @forelse($ticketsActive as $t)
                    @php
                      $prio = ['high'=>'danger','medium'=>'primary','low'=>'success'][strtolower($t->priority)] ?? 'secondary';
                      $stat = ['open'=>'danger','in_progress'=>'warning','resolved'=>'success'][strtolower($t->status)] ?? 'secondary';
                    @endphp
                    <tr>
                      <td>{{ $t->subject }}</td>
                      <td><span class="badge text-bg-{{ $prio }}">{{ ucfirst($t->priority) }}</span></td>
                      <td><span class="badge text-bg-{{ $stat }}">{{ ucwords(str_replace('_',' ', $t->status)) }}</span></td>
                      <td>{{ $t->created_at->format('Y-m-d') }}</td>
                    </tr>
                  @empty
                    <tr><td colspan="4" class="text-muted">No active tickets.</td></tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      {{-- Services Management --}}
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Services Management</h5>
        @if(auth()->user()?->isAdmin())
          <a href="{{ route('services.index') }}" class="btn bg-accent-orange text-white">Add Service</a>
        @endif
      </div>

      <div class="row g-3 mb-5">
        @forelse($services as $s)
          <div class="col-md-4">
            <div class="card shadow-sm h-100">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <h6 class="mb-1">{{ $s->name }}</h6>
                    <p class="text-muted small mb-3">{{ $s->summary }}</p>
                  </div>
                  @if(auth()->user()?->isAdmin())
                    <a href="{{ route('services.show', $s->slug) }}" class="text-muted"><i class="bi bi-pencil-square"></i></a>
                  @endif
                </div>
                @if(auth()->user()?->isAdmin())
                  <form action="{{ route('services.update', $s->slug) }}" method="POST" class="d-flex align-items-center gap-2">
                    @csrf @method('PUT')
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" name="is_active" value="1" @checked($s->is_active)>
                    </div>
                    <button class="btn btn-sm btn-outline-secondary">Save</button>
                  </form>
                @else
                  <span class="badge {{ $s->is_active ? 'text-bg-success' : 'text-bg-secondary' }}">
                    {{ $s->is_active ? 'Active' : 'Inactive' }}
                  </span>
                @endif
              </div>
            </div>
          </div>
        @empty
          <div class="col-12 text-muted">No services configured.</div>
        @endforelse
      </div>
            {{-- Contact Submissions --}}
      <div class="card shadow-sm mb-5">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Contact Submissions</h5>
          <a href="{{ route('contact-messages.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-inbox"></i> View all
          </a>
        </div>
        <div class="card-body table-responsive">
          <table class="table align-middle">
            <thead>
              <tr><th>Date</th><th>Name</th><th>Email</th><th>Subject</th><th>Status</th><th class="text-end">Actions</th></tr>
            </thead>
            <tbody>
              @forelse($notifications as $msg)
                <tr>
                  <td>{{ $msg->created_at->format('Y-m-d H:i') }}</td>
                  <td>{{ $msg->name }}</td>
                  <td><a href="mailto:{{ $msg->email }}">{{ $msg->email }}</a></td>
                  <td>{{ $msg->subject }}</td>
                  <td><span class="badge text-bg-secondary">{{ ucfirst($msg->status) }}</span></td>
                  <td class="text-end">
                    <a href="{{ route('contact-messages.show', $msg) }}" class="btn btn-sm btn-outline-primary">
                      <i class="bi bi-eye"></i> View
                    </a>
                    @if(auth()->user()?->isAdmin())
                      <form action="{{ route('contact-messages.destroy', $msg) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('Delete this message?')">
                          <i class="bi bi-trash"></i> Delete
                        </button>
                      </form>
                    @endif
                  </td>
                </tr>
              @empty
                <tr><td colspan="6" class="text-muted text-center">No notifications yet.</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

      {{-- Users Management --}}
      <div class="card shadow-sm mb-5">
        <div class="card-header bg-white">
          <h5 class="mb-0">Users Management</h5>
        </div>
        <div class="card-body table-responsive">
          <table class="table align-middle">
            <thead><tr><th>Name</th><th>Email</th><th>Role</th><th>Status</th><th>Last Login</th></tr></thead>
            <tbody>
              @forelse($usersRecent as $u)
                @php
                  $roleColor = ['admin'=>'primary','manager'=>'warning','user'=>'secondary'][strtolower($u->role)] ?? 'info';
                @endphp
                <tr>
                  <td>{{ $u->name }}</td>
                  <td>{{ $u->email }}</td>
                  <td><span class="badge text-bg-{{ $roleColor }}">{{ ucfirst($u->role) }}</span></td>
                  <td><span class="badge text-bg-success">{{ ucfirst($u->status ?? 'active') }}</span></td>
                  <td>{{ optional($u->last_login_at)->format('Y-m-d H:i') ?? '—' }}</td>
                </tr>
              @empty
                <tr><td colspan="5" class="text-muted text-center">No users yet.</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

      {{-- Quick Actions --}}
      <section class="py-5 bg-white">
        <div class="container text-center">
          <h2 class="mb-4">Quick Actions</h2>
          <div class="row g-4">
            <div class="col-md-4">
              <a href="{{ route('support') }}" class="btn bg-accent-orange text-white w-100 shadow-sm">
                <i class="bi bi-life-preserver me-2"></i> Request Support
              </a>
            </div>
            <div class="col-md-4">
              <a href="{{ route('services.index') }}" class="btn bg-accent-orange text-white w-100 shadow-sm">
                <i class="bi bi-cart-plus me-2"></i> Add Service
              </a>
            </div>
            <div class="col-md-4">
              <a href="{{ route('plans.index') }}" class="btn bg-accent-orange text-white w-100 shadow-sm">
                <i class="bi bi-arrow-up-circle me-2"></i> Upgrade Plan
              </a>
            </div>
          </div>
        </div>
      </section>

      {{-- CTA Banner --}}
      <section class="py-5 bg-primary-blue text-white text-center">
        <div class="container">
          <h2 class="mb-3">Manage Your Account Efficiently</h2>
          <p class="lead text-gray-200 mb-4">
            Use the Dashboard to stay on top of your services, support, and account activity.
          </p>
          <a href="{{ route('contact') }}" class="btn bg-accent-orange text-white">
            Contact Support Team
          </a>
        </div>
      </section>

    </main>
  </div>
</div>
@endsection
