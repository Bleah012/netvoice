@extends('layouts.app')
@section('title', 'Partners')

@section('content')

  {{-- Hero Section --}}
  <section class="bg-primary-blue text-white py-5">
    <div class="container">
      <div class="col-lg-8">
        <h1 class="mb-3 animate__animated animate__fadeInDown">Our Partners</h1>
        <p class="lead text-gray-200 animate__animated animate__fadeInUp">
          Collaborating with trusted industry leaders to deliver innovative and reliable ICT solutions.
        </p>
      </div>
    </div>
  </section>

  {{-- Partners Overview --}}
  <section class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="mb-4">Trusted Partnerships</h2>
      <p class="text-muted mb-5">We work with global and local partners to ensure quality, scalability, and innovation.</p>

      <div class="row g-4">
        {{-- Example Partner Card --}}
        <div class="col-md-6 col-lg-4 animate__animated animate__fadeInLeft">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <div class="rounded bg-accent-orange text-white d-flex align-items-center justify-content-center mb-3" style="width:60px;height:60px;">
                <i class="bi bi-globe fs-3"></i>
              </div>
              <h5 class="card-title text-primary-blue">Global Technology Providers</h5>
              <p class="text-muted">Partnering with international ICT vendors to deliver cutting-edge solutions worldwide.</p>
            </div>
          </div>
        </div>

        {{-- Example Partner Card --}}
        <div class="col-md-6 col-lg-4 animate__animated animate__fadeInUp">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <div class="rounded bg-accent-orange text-white d-flex align-items-center justify-content-center mb-3" style="width:60px;height:60px;">
                <i class="bi bi-people fs-3"></i>
              </div>
              <h5 class="card-title text-primary-blue">Local Industry Leaders</h5>
              <p class="text-muted">Collaborating with regional partners to ensure tailored solutions for diverse industries.</p>
            </div>
          </div>
        </div>

        {{-- Example Partner Card --}}
        <div class="col-md-6 col-lg-4 animate__animated animate__fadeInRight">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <div class="rounded bg-accent-orange text-white d-flex align-items-center justify-content-center mb-3" style="width:60px;height:60px;">
                <i class="bi bi-handshake fs-3"></i>
              </div>
              <h5 class="card-title text-primary-blue">Strategic Alliances</h5>
              <p class="text-muted">Building long-term partnerships that drive innovation, reliability, and customer success.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

    {{-- Success Metrics --}}
  <section class="py-5 bg-white">
    <div class="container text-center">
      <h2 class="mb-4 animate__animated animate__fadeInUp">Our Partnership Impact</h2>
      <p class="text-muted mb-5">Strong collaborations that drive innovation, reliability, and customer success.</p>
      <div class="row g-4">
        <div class="col-md-3">
          <h3 class="text-accent-orange">50+</h3>
          <p class="text-muted">Global Technology Partners</p>
        </div>
        <div class="col-md-3">
          <h3 class="text-accent-orange">30+</h3>
          <p class="text-muted">Regional Industry Leaders</p>
        </div>
        <div class="col-md-3">
          <h3 class="text-accent-orange">20+</h3>
          <p class="text-muted">Strategic Alliances</p>
        </div>
        <div class="col-md-3">
          <h3 class="text-accent-orange">100+</h3>
          <p class="text-muted">Successful Joint Projects</p>
        </div>
      </div>
    </div>
  </section>

  {{-- Testimonials Section --}}
  <section class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center mb-4">What Our Partners Say</h2>
      <div class="row g-4">
        <div class="col-md-6 animate__animated animate__fadeInLeft">
          <div class="p-4 bg-white rounded shadow-sm h-100">
            <p class="text-muted">“NetVoice has been a reliable partner in delivering secure and scalable ICT solutions. Their team is proactive and innovative.”</p>
            <h6 class="mt-3 text-primary-blue">— Global Tech Provider</h6>
          </div>
        </div>
        <div class="col-md-6 animate__animated animate__fadeInRight">
          <div class="p-4 bg-white rounded shadow-sm h-100">
            <p class="text-muted">“Working with NetVoice has allowed us to expand our services and reach new industries with confidence.”</p>
            <h6 class="mt-3 text-primary-blue">— Regional Industry Leader</h6>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- CTA Section --}}
  <section class="py-5 bg-primary-blue text-white text-center">
    <div class="container">
      <h2 class="mb-3 animate__animated animate__fadeInUp">Partner With Us</h2>
      <p class="lead text-gray-200 mb-4 animate__animated animate__fadeInUp">
        Join our growing network of trusted partners and create impactful solutions together.
      </p>
      <a href="{{ route('contact') }}" class="btn bg-accent-orange text-white animate__animated animate__pulse">
        Become a Partner
      </a>
    </div>
  </section>

@endsection
