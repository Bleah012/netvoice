@extends('layouts.app')
@section('title', 'Services')

@section('content')

  {{-- Hero Section --}}
  <section class="bg-primary-blue text-white py-5">
    <div class="container">
      <div class="col-lg-8">
        <h1 class="mb-3">Our Services</h1>
        <p class="lead text-gray-200">
          Comprehensive ICT solutions designed to meet the diverse needs of modern businesses
        </p>
      </div>
    </div>
  </section>

  {{-- Services Grid --}}
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row g-4">
        {{-- Example Service Card --}}
        <div class="col-md-6 col-lg-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <div class="rounded bg-primary-blue text-white d-flex align-items-center justify-content-center mb-3" style="width:60px;height:60px;">
                <i class="bi bi-hdd-network fs-3"></i>
              </div>
              <h5 class="card-title">Structured Cabling</h5>
              <p class="text-muted">Professional design and installation of UTP, FTP, SFTP and Fiber Optic cabling systems.</p>
              <ul class="list-unstyled small text-muted">
                <li><span class="text-accent-orange">•</span> Data center cabling (Cat5e, Cat6, Cat6a)</li>
                <li><span class="text-accent-orange">•</span> Fiber optic installation</li>
                <li><span class="text-accent-orange">•</span> Patch panels & administration points</li>
                <li><span class="text-accent-orange">•</span> Cable management & certification</li>
              </ul>
              <a href="{{ route('contact') }}" class="text-accent-orange text-decoration-none">
                Get Started <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        {{-- Repeat similar cards for Networking, Hardware, Software, PABX, CCTV, Solar, Maintenance --}}
        {{-- Each card uses Bootstrap grid col-md-6 col-lg-4 for responsiveness --}}
      </div>
    </div>
  </section>

  {{-- Service Process --}}
  <section class="py-5 bg-white">
    <div class="container text-center">
      <h2 class="mb-4">Our Service Process</h2>
      <p class="text-muted mb-5">A systematic approach to delivering excellence</p>

      <div class="row g-4">
        <div class="col-md-3">
          <div class="rounded-circle bg-accent-orange text-white d-flex align-items-center justify-content-center mx-auto mb-3" style="width:70px;height:70px;">
            1
          </div>
          <h5>Consultation</h5>
          <p class="text-muted">We assess your needs and understand your business requirements</p>
        </div>
        <div class="col-md-3">
          <div class="rounded-circle bg-accent-orange text-white d-flex align-items-center justify-content-center mx-auto mb-3" style="width:70px;height:70px;">
            2
          </div>
          <h5>Design</h5>
          <p class="text-muted">Custom solution design tailored to your specific needs</p>
        </div>
        <div class="col-md-3">
          <div class="rounded-circle bg-accent-orange text-white d-flex align-items-center justify-content-center mx-auto mb-3" style="width:70px;height:70px;">
            3
          </div>
          <h5>Implementation</h5>
          <p class="text-muted">Professional installation and configuration by our expert team</p>
        </div>
        <div class="col-md-3">
          <div class="rounded-circle bg-accent-orange text-white d-flex align-items-center justify-content-center mx-auto mb-3" style="width:70px;height:70px;">
            4
          </div>
          <h5>Support</h5>
          <p class="text-muted">Ongoing maintenance and 24/7 technical support</p>
        </div>
      </div>
    </div>
  </section>

  {{-- CTA Section --}}
  <section class="py-5 bg-primary-blue text-white text-center">
    <div class="container">
      <h2 class="mb-3">Need a Custom Solution?</h2>
      <p class="lead text-gray-200 mb-4">
        Our team is ready to design and implement the perfect ICT solution for your business
      </p>
      <a href="{{ route('contact') }}" class="btn bg-accent-orange text-white">
        Request a Quote <i class="bi bi-arrow-right"></i>
      </a>
    </div>
  </section>

@endsection
