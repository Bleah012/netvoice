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

    {{-- Overview Cards --}}
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="row my-4">
        <div class="col-md-3">
          <div class="card shadow-sm h-100 text-center">
            <div class="card-body">
              <i class="bi bi-check-circle fs-1 text-accent-orange mb-2"></i>
              <h5 class="card-title">Active Services</h5>
              <p class="text-muted">{{ $activeServicesCount }}</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card shadow-sm h-100 text-center">
            <div class="card-body">
              <i class="bi bi-envelope-open fs-1 text-accent-orange mb-2"></i>
              <h5 class="card-title">Open Tickets</h5>
              <p class="text-muted">{{ $openTicketsCount }}</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card shadow-sm h-100 text-center">
            <div class="card-body">
              <i class="bi bi-credit-card fs-1 text-accent-orange mb-2"></i>
              <h5 class="card-title">Invoices</h5>
              <p class="text-muted">{{ $invoicesCount }}</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card shadow-sm h-100 text-center">
            <div class="card-body">
              <i class="bi bi-bell fs-1 text-accent-orange mb-2"></i>
              <h5 class="card-title">Notifications</h5>
              <p class="text-muted">{{ $notificationsCount }}</p>
            </div>
          </div>
        </div>
      </div>

      {{-- Admin: Plans quick actions --}}
      @if(auth()->user()?->isAdmin())
      <div class="row mb-4">
        <div class="col-12">
          <div class="card shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
              <div>
                <h5 class="card-title mb-1">Plans Management</h5>
                <p class="text-muted mb-0">Create, edit, and organize pricing plans.</p>
              </div>
              <div class="d-flex gap-2">
                <a href="{{ route('plans.create') }}" class="btn bg-accent-orange text-white">
                  <i class="bi bi-plus-circle me-1"></i> Add Plan
                </a>
                <a href="{{ route('plans.index') }}" class="btn btn-outline-secondary">
                  <i class="bi bi-pencil-square me-1"></i> Edit Plans
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif

      {{-- Tabs for Activity --}}
      <section class="py-5 bg-light">
        <div class="container">
          <ul class="nav nav-pills justify-content-center mb-4" id="dashboardTabs" role="tablist">
            <li class="nav-item">
              <button class="nav-link active" id="activity-tab" data-bs-toggle="tab" data-bs-target="#activity" type="button" role="tab">
                Recent Activity
              </button>
            </li>
            <li class="nav-item">
              <button class="nav-link" id="notifications-tab" data-bs-toggle="tab" data-bs-target="#notifications" type="button" role="tab">
                Notifications ({{ $notificationsCount }})
              </button>
            </li>
          </ul>

          <div class="tab-content" id="dashboardTabsContent">
            {{-- Activity tab --}}
            <div class="tab-pane fade show active" id="activity" role="tabpanel">
              <div class="table-responsive shadow-sm rounded">
                <table class="table table-striped align-middle">
                  <thead class="table-primary">
                    <tr>
                      <th>Date</th>
                      <th>Type</th>
                      <th>Item</th>
                      <th>Status</th>
                      <th class="text-end">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($activities as $item)
                      <tr>
                        <td>{{ $item['date']->format('Y-m-d H:i') }}</td>
                        <td>{{ $item['type'] }}</td>
                        <td>{{ $item['label'] }}</td>
                        <td>
                          @php
                            $status = strtolower($item['status'] ?? 'n/a');
                            $map = [
                              'planned'   => 'secondary',
                              'active'    => 'success',
                              'paused'    => 'warning',
                              'completed' => 'primary',
                              'open'      => 'warning',
                              'pending'   => 'warning',
                              'closed'    => 'secondary',
                            ];
                            $color = $map[$status] ?? 'info';
                          @endphp
                          <span class="badge text-bg-{{ $color }}">{{ ucfirst($status) }}</span>
                        </td>
                        <td class="text-end">
                          <a href="{{ $item['view'] }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i> View</a>
                          @if(auth()->user()?->isAdmin())
                            <a href="{{ $item['edit'] }}" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil-square"></i> Edit</a>
                          @endif
                        </td>
                      </tr>
                    @empty
                      <tr><td colspan="5" class="text-center text-muted">No recent activity.</td></tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
                        {{-- Notifications tab --}}
            <div class="tab-pane fade" id="notifications" role="tabpanel">
              <div class="table-responsive shadow-sm rounded">
                <table class="table table-striped align-middle">
                  <thead class="table-primary">
                    <tr>
                      <th>Date</th>
                      <th>From</th>
                      <th>Email</th>
                      <th>Subject</th>
                      <th>Status</th>
                      <th class="text-end">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($notifications as $msg)
                      <tr>
                        <td>{{ $msg->created_at->format('Y-m-d H:i') }}</td>
                        <td>{{ $msg->name }}</td>
                        <td><a href="mailto:{{ $msg->email }}">{{ $msg->email }}</a></td>
                        <td>{{ $msg->subject }}</td>
                        <td><span class="badge bg-secondary">{{ ucfirst($msg->status) }}</span></td>
                        <td class="text-end">
                          <!-- ✅ Pass model instance, Laravel uses slug automatically -->
                          <a href="{{ route('contact-messages.show', $msg) }}" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-eye"></i> View
                          </a>
                          <form action="{{ route('contact-messages.destroy', $msg) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Are you sure you want to delete this message?')">
                              <i class="bi bi-trash"></i> Delete
                            </button>
                          </form>
                        </td>
                      </tr>
                    @empty
                      <tr><td colspan="6" class="text-center text-muted">No notifications yet.</td></tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
              <div class="text-end mt-2">
                <a href="{{ route('contact-messages.index') }}" class="btn btn-outline-secondary">
                  <i class="bi bi-inbox"></i> View all messages
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>

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

      {{-- CTA --}}
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
