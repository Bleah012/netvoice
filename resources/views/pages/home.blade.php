@extends('layouts.app')
@section('title', 'Home')

@section('content')

  {{-- Hero Section --}}
  <section class="bg-primary-blue text-white py-5 position-relative overflow-hidden">
    <div class="container text-center">
      <h1 class="mb-3 animate__animated animate__fadeInDown">Reliable & Affordable ICT Solutions</h1>
      <p class="lead text-gray-200 animate__animated animate__fadeInUp">
        Empowering businesses with cutting-edge technology and unmatched support
      </p>
      <a href="{{ route('contact') }}" class="btn bg-accent-orange text-white mt-3 animate__animated animate__slideInLeft">
        Get Started
      </a>
    </div>
    {{-- Background cabling photo --}}
    <div class="hero-bg position-absolute top-0 start-0 w-100 h-100 opacity-25">
      <img src="{{ asset('images/cabling1.jpg') }}" class="w-100 h-100 object-fit-cover" alt="Cabling Infrastructure">
    </div>
  </section>

  {{-- About Us Section --}}
  <section class="py-5 bg-white text-center">
    <div class="container">
      <h2 class="mb-4">Meet the NetVoice Team</h2>
      <img src="{{ asset('images/team.jpg') }}" class="img-fluid rounded shadow animate__animated animate__zoomIn" alt="Company Team">
      <p class="mt-3 text-muted">Our dedicated professionals ensure seamless communication solutions for your business.</p>
    </div>
  </section>

  {{-- Services Overview --}}
  <section class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="mb-4">Our Core Services</h2>
      <p class="text-muted mb-5">Comprehensive ICT solutions tailored to your business needs</p>

      <div class="row g-4">
        <div class="col-md-4 animate__animated animate__fadeInLeft">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title text-primary-blue">Networking</h5>
              <p class="card-text text-muted">Enterprise-grade LAN/WAN setup, routers, switches, and wireless infrastructure.</p>
            </div>
          </div>
        </div>

        <div class="col-md-4 animate__animated animate__fadeInUp">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title text-primary-blue">Security</h5>
              <p class="card-text text-muted">CCTV, surveillance, and access control systems for complete protection.</p>
            </div>
          </div>
        </div>

        <div class="col-md-4 animate__animated animate__fadeInRight">
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

  {{-- Infrastructure Section --}}
  <section class="py-5 bg-white">
    <div class="container">
      <h2 class="text-center mb-5">Our Infrastructure</h2>
      <div class="row align-items-center">
        <div class="col-md-6 animate__animated animate__fadeInLeft">
          <img src="{{ asset('images/cabling2.jpg') }}" class="img-fluid rounded shadow" alt="Cabling Infrastructure">
        </div>
        <div class="col-md-6 animate__animated animate__fadeInRight">
          <p class="lead text-muted">We deploy robust cabling systems that ensure high-speed, reliable connectivity across your premises.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- Data Center Section --}}
  <section class="py-5 bg-dark text-white">
    <div class="container">
      <h2 class="text-center mb-5">Our Servers</h2>
      <div id="serverCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('images/server1.jpg') }}" class="d-block w-100" alt="Server 1">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images/server2.jpg') }}" class="d-block w-100" alt="Server 2">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images/server3.jpg') }}" class="d-block w-100" alt="Server 3">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#serverCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#serverCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
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
      <h2 class="mb-3 animate__animated animate__fadeInUp">Is Your Industry Listed?</h2>
      <p class="lead text-gray-200 mb-4 animate__animated animate__fadeInUp">
        Even if your sector isn't mentioned, our versatile team can create customized solutions.
      </p>
      <a href="{{ route('contact') }}" class="btn bg-accent-orange text-white animate__animated animate__pulse">
        Contact Our Team
      </a>
    </div>
  </section>

@endsection
