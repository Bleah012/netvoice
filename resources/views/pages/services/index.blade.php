@extends('layouts.app')
@section('title', 'Services')

@section('content')

  {{-- Hero Section --}}
  <section class="bg-primary-blue text-white py-5">
    <div class="container">
      <div class="col-lg-8">
        <h1 class="mb-3 animate__animated animate__fadeInDown">Our Services</h1>
        <p class="lead text-gray-200 animate__animated animate__fadeInUp">
          Comprehensive ICT solutions designed to empower your business with reliability, scalability, and innovation.
        </p>
      </div>
    </div>
  </section>

  {{-- Services Overview --}}
  <section class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="mb-4">What We Offer</h2>
      <p class="text-muted mb-5">Explore our wide range of ICT services tailored to meet diverse business needs.</p>

      <div class="row g-4">
        {{-- Networking --}}
        <div class="col-md-4 animate__animated animate__fadeInLeft">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <div class="rounded bg-accent-orange text-white d-flex align-items-center justify-content-center mb-3" style="width:50px;height:50px;">
                <i class="bi bi-diagram-3 fs-4"></i>
              </div>
              <h5 class="card-title text-primary-blue">Networking</h5>
              <p class="card-text text-muted">Enterprise-grade LAN/WAN setup, routers, switches, and wireless infrastructure for seamless connectivity.</p>
            </div>
          </div>
        </div>

        {{-- Security --}}
        <div class="col-md-4 animate__animated animate__fadeInUp">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <div class="rounded bg-accent-orange text-white d-flex align-items-center justify-content-center mb-3" style="width:50px;height:50px;">
                <i class="bi bi-shield-lock fs-4"></i>
              </div>
              <h5 class="card-title text-primary-blue">Security</h5>
              <p class="card-text text-muted">CCTV, surveillance, and access control systems to safeguard your assets and operations.</p>
            </div>
          </div>
        </div>

        {{-- Support --}}
        <div class="col-md-4 animate__animated animate__fadeInRight">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <div class="rounded bg-accent-orange text-white d-flex align-items-center justify-content-center mb-3" style="width:50px;height:50px;">
                <i class="bi bi-headset fs-4"></i>
              </div>
              <h5 class="card-title text-primary-blue">Support</h5>
              <p class="card-text text-muted">24/7 technical support, preventive maintenance, and system upgrades for peace of mind.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  {{-- Specialized Solutions --}}
  <section class="py-5 bg-white">
    <div class="container">
      <h2 class="text-center mb-4">Specialized Solutions</h2>
      <p class="text-muted text-center mb-5">Beyond core services, we deliver tailored solutions for complex ICT needs.</p>
      <div class="row g-4">
        {{-- Cloud Solutions --}}
        <div class="col-md-6 animate__animated animate__fadeInLeft">
          <div class="bg-light p-4 rounded shadow-sm h-100">
            <div class="rounded bg-accent-orange text-white d-flex align-items-center justify-content-center mb-3" style="width:50px;height:50px;">
              <i class="bi bi-cloud fs-4"></i>
            </div>
            <h5 class="mb-3">Cloud Solutions</h5>
            <ul class="list-unstyled small text-muted">
              <li><span class="text-accent-orange">•</span> Scalable hosting environments</li>
              <li><span class="text-accent-orange">•</span> Data backup & disaster recovery</li>
              <li><span class="text-accent-orange">•</span> Hybrid cloud integration</li>
              <li><span class="text-accent-orange">•</span> Secure cloud storage</li>
            </ul>
          </div>
        </div>

        {{-- Infrastructure Management --}}
        <div class="col-md-6 animate__animated animate__fadeInRight">
          <div class="bg-light p-4 rounded shadow-sm h-100">
            <div class="rounded bg-accent-orange text-white d-flex align-items-center justify-content-center mb-3" style="width:50px;height:50px;">
              <i class="bi bi-hdd-network fs-4"></i>
            </div>
            <h5 class="mb-3">Infrastructure Management</h5>
            <ul class="list-unstyled small text-muted">
              <li><span class="text-accent-orange">•</span> Server deployment & monitoring</li>
              <li><span class="text-accent-orange">•</span> Cabling & hardware installation</li>
              <li><span class="text-accent-orange">•</span> Preventive maintenance</li>
              <li><span class="text-accent-orange">•</span> Performance optimization</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Success Metrics --}}
  <section class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="mb-4 animate__animated animate__fadeInUp">Our Impact</h2>
      <p class="text-muted mb-5">Delivering measurable results across industries</p>
      <div class="row g-4">
        <div class="col-md-3">
          <h3 class="text-accent-orange">200+</h3>
          <p class="text-muted">Networks Deployed</p>
        </div>
        <div class="col-md-3">
          <h3 class="text-accent-orange">150+</h3>
          <p class="text-muted">Security Systems Installed</p>
        </div>
        <div class="col-md-3">
          <h3 class="text-accent-orange">300+</h3>
          <p class="text-muted">Clients Supported</p>
        </div>
        <div class="col-md-3">
          <h3 class="text-accent-orange">99.9%</h3>
          <p class="text-muted">Uptime Guarantee</p>
        </div>
      </div>
    </div>
  </section>

  {{-- CTA Section --}}
  <section class="py-5 bg-primary-blue text-white text-center">
    <div class="container">
      <h2 class="mb-3 animate__animated animate__fadeInUp">Ready to Transform Your Business?</h2>
      <p class="lead text-gray-200 mb-4 animate__animated animate__fadeInUp">
        Partner with NetVoice for reliable, secure, and scalable ICT solutions.
      </p>
      <a href="{{ route('contact') }}" class="btn bg-accent-orange text-white animate__animated animate__pulse">
        Get in Touch
      </a>
    </div>
  </section>

@endsection

