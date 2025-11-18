@extends('layouts.app')
@section('title', 'Home')

@section('content')

  {{-- Hero Section --}}
  <section class="bg-primary-blue text-white py-5">
    <div class="container text-center">
      <h1 class="mb-3">Reliable & Affordable ICT Solutions</h1>
      <p class="lead text-gray-200">
        Empowering businesses with cutting-edge technology and unmatched support
      </p>
      <a href="{{ route('contact') }}" class="btn bg-accent-orange text-white mt-3">
        Get Started
      </a>
    </div>
  </section>

  {{-- Services Overview --}}
  <section class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="mb-4">Our Core Services</h2>
      <p class="text-muted mb-5">Comprehensive ICT solutions tailored to your business needs</p>

      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title text-primary-blue">Networking</h5>
              <p class="card-text text-muted">Enterprise-grade LAN/WAN setup, routers, switches, and wireless infrastructure.</p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title text-primary-blue">Security</h5>
              <p class="card-text text-muted">CCTV, surveillance, and access control systems for complete protection.</p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title text-primary-blue">Support</h5>
              <p class="card-text text-muted">24/7 technical support, preventive maintenance, and system upgrades.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Success Metrics --}}
  <section class="py-5 bg-white">
    <div class="container text-center">
      <h2 class="mb-4">Our Track Record</h2>
      <p class="text-muted mb-5">Proven success across multiple industries</p>

      <div class="row g-4">
        <div class="col-md-3">
          <h3 class="text-accent-orange">50+</h3>
          <p class="text-muted">Banks & Financial Institutions</p>
        </div>
        <div class="col-md-3">
          <h3 class="text-accent-orange">30+</h3>
          <p class="text-muted">Healthcare Facilities</p>
        </div>
        <div class="col-md-3">
          <h3 class="text-accent-orange">40+</h3>
          <p class="text-muted">Educational Institutions</p>
        </div>
        <div class="col-md-3">
          <h3 class="text-accent-orange">100+</h3>
          <p class="text-muted">Corporate Organizations</p>
        </div>
      </div>
    </div>
  </section>

  {{-- CTA Section --}}
  <section class="py-5 bg-primary-blue text-white text-center">
    <div class="container">
      <h2 class="mb-3">Is Your Industry Listed?</h2>
      <p class="lead text-gray-200 mb-4">
        Even if your sector isn't mentioned, our versatile team can create customized solutions.
      </p>
      <a href="{{ route('contact') }}" class="btn bg-accent-orange text-white">
        Contact Our Team
      </a>
    </div>
  </section>

@endsection
