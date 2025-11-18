@extends('layouts.app')
@section('title', 'Partners')

@section('content')

  {{-- Hero Section --}}
  <section class="bg-primary-blue text-white py-5">
    <div class="container">
      <div class="col-lg-8">
        <h1 class="mb-3">Our Partners</h1>
        <p class="lead text-gray-200">
          Strategic partnerships with world-leading technology brands to deliver exceptional solutions to our clients
        </p>
      </div>
    </div>
  </section>

  {{-- Scrolling Partners Banner --}}
  <section class="py-5 bg-white border-bottom">
    <div class="container overflow-hidden">
      <div class="d-flex gap-4 animate-scroll">
        {{-- Example partner card --}}
        <div class="border rounded p-3 text-center shrink-0" style="min-width:200px;">
          <div class="fw-bold text-primary-blue">Cisco</div>
          <div class="text-muted small">Networking</div>
        </div>
        <div class="border rounded p-3 text-center shrink-0" style="min-width:200px;">
          <div class="fw-bold text-primary-blue">Microsoft</div>
          <div class="text-muted small">Software & Cloud</div>
        </div>
        {{-- Repeat for other partners --}}
      </div>
    </div>
  </section>

  {{-- Partner Overview --}}
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="mb-3">Trusted Technology Partners</h2>
        <p class="text-muted">We collaborate with industry leaders to bring you cutting-edge technology solutions backed by global standards</p>
      </div>

      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 shadow-sm text-center">
            <div class="card-body">
              <div class="rounded-circle bg-primary-blue text-white d-flex align-items-center justify-content-center mx-auto mb-3" style="width:80px;height:80px;">
                <i class="bi bi-award fs-2"></i>
              </div>
              <h5 class="card-title">Cisco</h5>
              <p class="text-muted">Networking</p>
              <div class="border-top pt-3">
                <span class="badge bg-accent-orange text-white">Certified Partner</span>
              </div>
            </div>
          </div>
        </div>
        {{-- Repeat for other partners --}}
      </div>
    </div>
  </section>

  {{-- Partnership Benefits --}}
  <section class="py-5 bg-white">
    <div class="container">
      <div class="row g-5 align-items-center">
        <div class="col-lg-6">
          <h2 class="mb-3">Partnership Benefits for Our Clients</h2>
          <p class="text-muted mb-4">
            Our strategic partnerships translate into significant advantages for our clients:
          </p>
          <ul class="list-unstyled">
            <li class="mb-2"><i class="bi bi-check-circle text-accent-orange me-2"></i> Access to latest technology and innovations</li>
            <li class="mb-2"><i class="bi bi-check-circle text-accent-orange me-2"></i> Certified technical expertise and training</li>
            <li class="mb-2"><i class="bi bi-check-circle text-accent-orange me-2"></i> Priority support and rapid response</li>
            <li class="mb-2"><i class="bi bi-check-circle text-accent-orange me-2"></i> Competitive pricing and special offers</li>
            <li class="mb-2"><i class="bi bi-check-circle text-accent-orange me-2"></i> Extended warranties and service agreements</li>
            <li class="mb-2"><i class="bi bi-check-circle text-accent-orange me-2"></i> Early access to new product releases</li>
          </ul>
        </div>

        <div class="col-lg-6">
          <div class="bg-light p-4 rounded">
            <h5 class="mb-3">Certification Highlights</h5>
            <div class="border-start border-4 border-accent-orange ps-3 mb-3">
              <h6>Cisco Certified Partner</h6>
              <p class="text-muted small">Authorized to design, implement, and support Cisco networking solutions</p>
            </div>
            <div class="border-start border-4 border-accent-orange ps-3 mb-3">
              <h6>Microsoft Gold Partner</h6>
              <p class="text-muted small">Expertise in Microsoft cloud, productivity, and enterprise solutions</p>
            </div>
            <div class="border-start border-4 border-accent-orange ps-3 mb-3">
              <h6>Dell Authorized Partner</h6>
              <p class="text-muted small">Official distributor and service provider for Dell hardware solutions</p>
            </div>
            <div class="border-start border-4 border-accent-orange ps-3">
              <h6>APC by Schneider Electric</h6>
              <p class="text-muted small">Certified for power protection and UPS solutions</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Partner Categories --}}
  <section class="py-5 bg-light">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="mb-3">Partner Categories</h2>
      </div>
      <div class="row g-4">
        <div class="col-md-3">
          <div class="card h-100 shadow-sm text-center">
            <div class="rounded bg-primary-blue text-white mx-auto mb-3 d-flex align-items-center justify-content-center" style="width:60px;height:60px;">🌐</div>
            <h6>Networking</h6>
            <p class="text-muted small">Cisco, Juniper</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card h-100 shadow-sm text-center">
            <div class="rounded bg-success text-white mx-auto mb-3 d-flex align-items-center justify-content-center" style="width:60px;height:60px;">💻</div>
            <h6>Hardware</h6>
            <p class="text-muted small">Dell, IBM, HP</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card h-100 shadow-sm text-center">
            <div class="rounded bg-purple text-white mx-auto mb-3 d-flex align-items-center justify-content-center" style="width:60px;height:60px;">📹</div>
            <h6>Security</h6>
            <p class="text-muted small">Hikvision, Pelco, Dahua</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card h-100 shadow-sm text-center">
            <div class="rounded bg-warning text-white mx-auto mb-3 d-flex align-items-center justify-content-center" style="width:60px;height:60px;">⚡</div>
            <h6>Power</h6>
            <p class="text-muted small">APC, Schneider Electric</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- CTA Section --}}
  <section class="py-5 bg-primary-blue text-white text-center">
    <div class="container">
      <h2 class="mb-3">Experience the Advantage</h2>
      <p class="lead text-gray-200 mb-4">
        Benefit from our partnerships with world-class technology providers
      </p>
      <a href="{{ route('contact') }}" class="btn bg-accent-orange text-white">
        Get Started Today
      </a>
    </div>
  </section>

  {{-- Custom CSS for scroll animation --}}
  <style>
    @keyframes scroll {
      0% { transform: translateX(0); }
      100% { transform: translateX(-50%); }
    }
    .animate-scroll {
      animation: scroll 30s linear infinite;
    }
    .animate-scroll:hover {
      animation-play-state: paused;
    }
  </style>

@endsection
