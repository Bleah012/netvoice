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

  {{-- Pricing Tiers --}}
  <section class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="mb-4">Flexible Pricing Options</h2>
      <div class="row g-4">
        {{-- Basic Plan --}}
        <div class="col-md-4 animate__animated animate__fadeInLeft">
          <div class="card shadow-sm h-100">
            <div class="card-header bg-accent-orange text-white">
              <h4 class="my-0 fw-normal">Basic</h4>
            </div>
            <div class="card-body">
              <h1 class="card-title pricing-card-title">KES 5,000 <small class="text-muted">/mo</small></h1>
              <ul class="list-unstyled mt-3 mb-4 text-muted">
                <li>✔ Structured cabling setup</li>
                <li>✔ Basic support</li>
                <li>✔ Entry-level ICT solutions</li>
              </ul>
              <button class="btn bg-primary-blue text-white w-100">Choose Basic</button>
            </div>
          </div>
        </div>

        {{-- Standard Plan --}}
        <div class="col-md-4 animate__animated animate__fadeInUp">
          <div class="card shadow-sm h-100">
            <div class="card-header bg-accent-orange text-white">
              <h4 class="my-0 fw-normal">Standard</h4>
            </div>
            <div class="card-body">
              <h1 class="card-title pricing-card-title">KES 15,000 <small class="text-muted">/mo</small></h1>
              <ul class="list-unstyled mt-3 mb-4 text-muted">
                <li>✔ Networking products</li>
                <li>✔ CCTV & surveillance</li>
                <li>✔ Priority support</li>
              </ul>
              <button class="btn bg-primary-blue text-white w-100">Choose Standard</button>
            </div>
          </div>
        </div>

        {{-- Premium Plan --}}
        <div class="col-md-4 animate__animated animate__fadeInRight">
          <div class="card shadow-sm h-100">
            <div class="card-header bg-accent-orange text-white">
              <h4 class="my-0 fw-normal">Premium</h4>
            </div>
            <div class="card-body">
              <h1 class="card-title pricing-card-title">KES 30,000 <small class="text-muted">/mo</small></h1>
              <ul class="list-unstyled mt-3 mb-4 text-muted">
                <li>✔ Full ICT integration</li>
                <li>✔ Solar & electrical systems</li>
                <li>✔ Dedicated account manager</li>
              </ul>
              <button class="btn bg-primary-blue text-white w-100">Choose Premium</button>
            </div>
          </div>
        </div>
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
