@extends('layouts.app')
@section('title', 'Industries')

@section('content')

  {{-- Hero Section --}}
  <section class="bg-primary-blue text-white py-5">
    <div class="container">
      <div class="col-lg-8">
        <h1 class="mb-3">Industries We Serve</h1>
        <p class="lead text-gray-200">
          Tailored ICT solutions across diverse sectors to meet unique industry challenges
        </p>
      </div>
    </div>
  </section>

  {{-- Industries Overview --}}
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row g-4">
        {{-- Example Industry Card --}}
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <div class="rounded bg-accent-orange text-white d-flex align-items-center justify-content-center mb-3" style="width:50px;height:50px;">
                <i class="bi bi-bank fs-4"></i>
              </div>
              <h5 class="card-title">Financial Services</h5>
              <p class="text-muted">Secure, compliant, and scalable ICT solutions for banks and financial institutions.</p>
            </div>
          </div>
        </div>

        {{-- Repeat similar cards for Telecom, Manufacturing, Retail, Government, etc. --}}
      </div>
    </div>
  </section>

  {{-- Industry-Specific Solutions --}}
  <section class="py-5 bg-white">
    <div class="container">
      <div class="row g-4">
        {{-- Healthcare --}}
        <div class="col-md-6">
          <div class="bg-white p-4 rounded shadow-sm h-100">
            <div class="rounded bg-accent-orange d-flex align-items-center justify-content-center mb-3" style="width:50px;height:50px;">
              <i class="bi bi-heart-pulse text-white fs-4"></i>
            </div>
            <h5 class="mb-3">Healthcare</h5>
            <ul class="list-unstyled small text-muted">
              <li><span class="text-accent-orange">•</span> HIPAA-compliant networks</li>
              <li><span class="text-accent-orange">•</span> Medical imaging infrastructure</li>
              <li><span class="text-accent-orange">•</span> Telemedicine solutions</li>
              <li><span class="text-accent-orange">•</span> Electronic health records systems</li>
            </ul>
          </div>
        </div>

        {{-- Education --}}
        <div class="col-md-6">
          <div class="bg-white p-4 rounded shadow-sm h-100">
            <div class="rounded bg-accent-orange d-flex align-items-center justify-content-center mb-3" style="width:50px;height:50px;">
              <i class="bi bi-mortarboard text-white fs-4"></i>
            </div>
            <h5 class="mb-3">Education</h5>
            <ul class="list-unstyled small text-muted">
              <li><span class="text-accent-orange">•</span> Campus-wide WiFi coverage</li>
              <li><span class="text-accent-orange">•</span> Smart classroom technology</li>
              <li><span class="text-accent-orange">•</span> Learning management systems</li>
              <li><span class="text-accent-orange">•</span> Student information systems</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Success Stories --}}
  <section class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="mb-3">Our Track Record</h2>
      <p class="text-muted mb-5">Proven success across multiple sectors</p>
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
        Even if your sector isn't mentioned, our versatile team can create customized solutions for any industry.
      </p>
      <a href="{{ route('contact') }}" class="btn bg-accent-orange text-white">
        Contact Our Team
      </a>
    </div>
  </section>

@endsection
