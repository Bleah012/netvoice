@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')

  {{-- Sidebar Navigation --}}
  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar shadow-sm">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active text-primary-blue" href="#">
                <i class="bi bi-speedometer2"></i> Overview
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-muted" href="#">
                <i class="bi bi-person"></i> Profile
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-muted" href="#">
                <i class="bi bi-cart"></i> Orders
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-muted" href="#">
                <i class="bi bi-life-preserver"></i> Support Tickets
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-muted" href="#">
                <i class="bi bi-gear"></i> Settings
              </a>
            </li>
          </ul>
        </div>
      </nav>

      {{-- Overview Cards --}}
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="row my-4">
          <div class="col-md-3 animate__animated animate__fadeInLeft">
            <div class="card shadow-sm h-100">
              <div class="card-body text-center">
                <i class="bi bi-check-circle fs-1 text-accent-orange mb-2"></i>
                <h5 class="card-title">Active Services</h5>
                <p class="text-muted">3</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 animate__animated animate__fadeInUp">
            <div class="card shadow-sm h-100">
              <div class="card-body text-center">
                <i class="bi bi-envelope-open fs-1 text-accent-orange mb-2"></i>
                <h5 class="card-title">Open Tickets</h5>
                <p class="text-muted">2</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 animate__animated animate__fadeInUp">
            <div class="card shadow-sm h-100">
              <div class="card-body text-center">
                <i class="bi bi-credit-card fs-1 text-accent-orange mb-2"></i>
                <h5 class="card-title">Invoices</h5>
                <p class="text-muted">5</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 animate__animated animate__fadeInRight">
            <div class="card shadow-sm h-100">
              <div class="card-body text-center">
                <i class="bi bi-bell fs-1 text-accent-orange mb-2"></i>
                <h5 class="card-title">Notifications</h5>
                <p class="text-muted">4</p>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  {{-- Activity Log / Recent Actions --}}
  <section class="py-5 bg-light">
    <div class="container">
      <h2 class="mb-4 text-center">Recent Activity</h2>
      <div class="table-responsive shadow-sm rounded">
        <table class="table table-striped align-middle">
          <thead class="table-primary">
            <tr>
              <th scope="col">Date</th>
              <th scope="col">Activity</th>
              <th scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>2025-11-15</td>
              <td>Service Upgrade Request</td>
              <td><span class="badge bg-success">Completed</span></td>
            </tr>
            <tr>
              <td>2025-11-16</td>
              <td>Support Ticket #1024</td>
              <td><span class="badge bg-warning text-dark">Pending</span></td>
            </tr>
            <tr>
              <td>2025-11-17</td>
              <td>Invoice Payment</td>
              <td><span class="badge bg-success">Confirmed</span></td>
            </tr>
            <tr>
              <td>2025-11-18</td>
              <td>Notification: System Maintenance</td>
              <td><span class="badge bg-info text-dark">Scheduled</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  {{-- Quick Actions --}}
  <section class="py-5 bg-white">
    <div class="container text-center">
      <h2 class="mb-4">Quick Actions</h2>
      <div class="row g-4">
        <div class="col-md-4 animate__animated animate__fadeInLeft">
          <a href="{{ route('support') }}" class="btn bg-accent-orange text-white w-100 shadow-sm">
            <i class="bi bi-life-preserver me-2"></i> Request Support
          </a>
        </div>
        <div class="col-md-4 animate__animated animate__fadeInUp">
          <a href="{{ route('services') }}" class="btn bg-accent-orange text-white w-100 shadow-sm">
            <i class="bi bi-cart-plus me-2"></i> Add Service
          </a>
        </div>
        <div class="col-md-4 animate__animated animate__fadeInRight">
          <a href="{{ route('plans') }}" class="btn bg-accent-orange text-white w-100 shadow-sm">
            <i class="bi bi-arrow-up-circle me-2"></i> Upgrade Plan
          </a>
        </div>
      </div>
    </div>
  </section>

  {{-- CTA Section --}}
  <section class="py-5 bg-primary-blue text-white text-center">
    <div class="container">
      <h2 class="mb-3 animate__animated animate__fadeInUp">Manage Your Account Efficiently</h2>
      <p class="lead text-gray-200 mb-4 animate__animated animate__fadeInUp">
        Use the Dashboard to stay on top of your services, support, and account activity.
      </p>
      <a href="{{ route('contact') }}" class="btn bg-accent-orange text-white animate__animated animate__pulse">
        Contact Support Team
      </a>
    </div>
  </section>

@endsection
