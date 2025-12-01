@extends('layouts.app')
@section('title', 'Plans')

@section('content')

  {{-- Hero Section --}}
  <section class="bg-primary-blue text-white py-5 text-center">
    <div class="container">
      <h1 class="mb-3 animate__animated animate__fadeInDown">Our Plans</h1>
      <p class="lead text-gray-200 animate__animated animate__fadeInUp">
        Choose the right plan for your business needs — scalable, reliable, and future-ready ICT solutions.
      </p>
    </div>
  </section>

  {{-- Dynamic Plans Listing --}}
  <section class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="mb-4">Flexible Pricing Options</h2>
      <div class="row g-4">
        @forelse($plans as $plan)
          <div class="col-md-4 animate__animated animate__fadeInUp">
            <div class="card shadow-sm h-100">
              <div class="card-header bg-accent-orange text-white">
                <h4 class="my-0 fw-normal">{{ $plan->name }}</h4>
              </div>
              <div class="card-body">
                <h1 class="card-title pricing-card-title">
                  KES {{ number_format($plan->price_cents / 100, 2) }}
                  <small class="text-muted">/{{ $plan->billing_period }}</small>
                </h1>
                <p class="text-muted">{{ $plan->description }}</p>

                {{-- Public view --}}
                <a href="{{ route('plans.show', $plan->id) }}" class="btn bg-primary-blue text-white w-100 mb-2">
                  View Details
                </a>

                {{-- Admin actions --}}
                @auth
                  <a href="{{ route('plans.edit', $plan->id) }}" class="btn btn-outline-secondary w-100 mb-2">
                    Edit Plan
                  </a>
                  <form action="{{ route('plans.destroy', $plan->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger w-100"
                            onclick="return confirm('Are you sure you want to delete this plan?')">
                      Delete Plan
                    </button>
                  </form>
                @endauth
              </div>
            </div>
          </div>
        @empty
          <p class="text-muted">No plans available yet.</p>
        @endforelse
      </div>
    </div>
  </section>

  {{-- Features Section --}}
  <section class="py-5 bg-white">
    <div class="container text-center">
      <h2 class="mb-4">All Plans Include</h2>
      <div class="row g-4">
        <div class="col-md-3">
          <i class="bi bi-shield-check fs-1 text-accent-orange mb-3"></i>
          <h5>Secure Solutions</h5>
          <p class="text-muted small">Industry-standard security across all services.</p>
        </div>
        <div class="col-md-3">
          <i class="bi bi-gear fs-1 text-accent-orange mb-3"></i>
          <h5>Scalable Infrastructure</h5>
          <p class="text-muted small">Future-ready ICT systems that grow with you.</p>
        </div>
        <div class="col-md-3">
          <i class="bi bi-people fs-1 text-accent-orange mb-3"></i>
          <h5>Customer Support</h5>
          <p class="text-muted small">Responsive support team available 24/7.</p>
        </div>
        <div class="col-md-3">
          <i class="bi bi-lightning fs-1 text-accent-orange mb-3"></i>
          <h5>Fast Deployment</h5>
          <p class="text-muted small">Quick installation and integration services.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- CTA Section --}}
  <section class="py-5 bg-primary-blue text-white text-center">
    <div class="container">
      <h2 class="mb-3 animate__animated animate__fadeInUp">Upgrade Your Business Today</h2>
      <p class="lead text-gray-200 mb-4 animate__animated animate__fadeInUp">
        Select a plan that fits your enterprise and let NetVoice Systems deliver value-driven ICT solutions.
      </p>
      <a href="{{ route('contact') }}" class="btn bg-accent-orange text-white animate__animated animate__pulse">
        Contact Sales Team
      </a>
    </div>
  </section>

@endsection
