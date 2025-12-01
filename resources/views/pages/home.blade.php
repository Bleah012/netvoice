@extends('layouts.app')
@section('title', 'Home')

@section('content')

{{-- Split Hero: Left overlay background, right workspace image --}}
<section class="position-relative overflow-hidden" style="min-height: 700px;">
  <div class="row g-0 h-100">
    {{-- LEFT: Overlay background image --}}
    <div class="col-md-6 position-relative"
         style="background: url('{{ asset('images/workspace.jpg') }}') center center / cover no-repeat;">
      <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0,35,102,0.7);"></div>
      <div class="position-relative h-100 d-flex flex-column justify-content-center align-items-center text-white text-center p-4" data-aos="fade-right">
        <h1 class="fw-bold display-4 mb-3 animate__animated animate__fadeInDown">
          Reliable ICT & Solar Solutions for Kenyan Enterprises
        </h1>
        <p class="lead animate__animated animate__fadeInUp mb-4">
          From network design to solar power—we build future-ready infrastructure.
        </p>
        <div class="d-flex flex-column flex-md-row gap-3">
          <a href="{{ route('services.index') }}" class="btn btn-lg bg-accent-orange text-white fw-bold animate__animated animate__fadeInLeft">
            Learn More
          </a>
          <a href="{{ route('contact') }}" class="btn btn-lg btn-outline-light fw-bold animate__animated animate__fadeInRight">
            Contact Us
          </a>
        </div>
      </div>
    </div>

    {{-- RIGHT: Workspace image --}}
    <div class="col-md-6 d-flex align-items-center justify-content-center bg-white" data-aos="fade-left">
      <img src="{{ asset('images/workspace.jpg') }}"
           alt="Netvoice workspace"
           class="img-fluid rounded shadow"
           style="max-height:600px;object-fit:cover;"
           loading="lazy">
    </div>
  </div>
</section>

{{-- Services Preview --}}
@php
  $services = $services ?? \App\Models\Service::query()
      ->where('is_active', true)
      ->orderBy('sort_order')
      ->limit(4)
      ->get();
@endphp
@include('components.services-preview', ['services' => $services])

{{-- Server Motion Gallery: Faster Curtain-Raiser Style --}}
<section class="py-5 bg-dark text-white">
  <div class="container">
    <h2 class="text-center mb-4 animate__animated animate__fadeInDown">Inside Our Data Backbone</h2>
    <p class="text-center text-muted mb-5 animate__animated animate__fadeInUp">
      Our server rooms are the heartbeat of enterprise connectivity—secure, scalable, and always online.
    </p>
    <div id="serverCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="2500">
      <div class="carousel-inner rounded shadow">
        @foreach(['server1.jpeg', 'server2.jpeg', 'server3.jpeg'] as $index => $image)
          <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
            <img src="{{ asset("images/$image") }}"
                 class="d-block w-100"
                 style="height:500px;object-fit:cover;"
                 alt="Netvoice Server Infrastructure"
                 loading="lazy">
          </div>
        @endforeach
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#serverCarousel" data-bs-slide="prev" aria-label="Previous">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#serverCarousel" data-bs-slide="next" aria-label="Next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </div>
</section>

{{-- Success Metrics --}}
<section class="py-5 bg-white">
  <div class="container text-center">
    <h2 class="mb-4" data-aos="fade-up">Our Track Record</h2>
    <p class="text-muted mb-5" data-aos="fade-up" data-aos-delay="100">Proven success across multiple industries</p>
    <div class="row g-4">
      @foreach([
        ['50+', 'Banks & Financial Institutions'],
        ['30+', 'NGOs & Nonprofits'],
        ['40+', 'Educational Institutions'],
        ['100+', 'Corporate Organizations']
      ] as [$stat, $label])
        <div class="col-md-3" data-aos="zoom-in">
          <h3 class="text-accent-orange">{{ $stat }}</h3>
          <p class="text-muted">{{ $label }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- CTA Section --}}
<section class="py-5 bg-white">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6" data-aos="fade-right">
        <img src="{{ asset('images/proffesional_consulting.jpg') }}"
             class="img-fluid rounded shadow"
             style="width:100%;height:450px;object-fit:cover;"
             alt="Professional consultation setting"
             loading="lazy">
      </div>
      <div class="col-md-6 text-md-start text-center" data-aos="fade-left">
        <h2 class="fw-bold text-primary-blue mb-3">
          Ready to Transform Your Infrastructure?
        </h2>
        <p class="lead text-muted mb-4">
          Let our experts design and deploy future-ready ICT and solar systems tailored to your enterprise.
        </p>
        <div class="d-flex flex-column flex-md-row gap-3 justify-content-md-start justify-content-center">
          <a href="{{ route('contact') }}"
             class="btn btn-lg bg-accent-orange text-white"
             aria-label="Get a Free Consultation"
             role="button">
            Get a Free Consultation
          </a>
          <a href="{{ route('services.index') }}"
             class="btn btn-lg btn-outline-primary-blue"
             aria-label="View Our Services"
             role="button">
            View Our Services
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
