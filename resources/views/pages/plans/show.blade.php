@extends('layouts.app')
@section('title', $plan->name)

@section('content')
<div class="container py-5">
  {{-- Plan Header --}}
  <h1 class="mb-4 text-primary-blue fw-bold">{{ $plan->name }}</h1>

  {{-- Plan Meta --}}
  <div class="mb-3">
    <span class="badge bg-info me-2">Status: {{ $plan->is_active ? 'Active' : 'Inactive' }}</span>
    <span class="badge bg-warning">Sort Order: {{ $plan->sort_order }}</span>
    <span class="badge bg-secondary">Billing: {{ ucfirst($plan->billing_period) }}</span>
  </div>

  {{-- Plan Description --}}
  <div class="card shadow-sm mb-4">
    <div class="card-body">
      @if(!empty($plan->description))
        <p class="text-muted">{!! nl2br(e($plan->description)) !!}</p>
      @else
        <p class="text-muted">No description provided for this plan.</p>
      @endif
    </div>
  </div>

  {{-- Plan Pricing --}}
  <div class="card shadow-sm mb-4">
    <div class="card-body">
      <h5 class="text-primary-blue fw-bold">Pricing</h5>
      <p class="fs-4 fw-semibold text-accent-orange">
        {{ $plan->price_cents ? 'USD ' . number_format($plan->price_cents / 100, 2) : 'Contact us for pricing' }}
      </p>
    </div>
  </div>

  {{-- Call to Action --}}
  <div class="mt-4">
    <a href="{{ route('contact') }}" class="btn bg-accent-orange text-white me-2">Select This Plan</a>
    <a href="{{ route('plans.index') }}" class="btn btn-outline-secondary">← Back to Plans</a>
  </div>
</div>
@endsection
