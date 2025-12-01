@extends('layouts.app')
@section('title', 'Support')

@section('content')

{{-- Hero Section --}}
<section class="py-5 text-white" style="background: linear-gradient(to right, #002366, #00C853);">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-8" data-aos="fade-down">
        <h1 class="mb-3 animate__animated animate__fadeInDown">Support & Maintenance</h1>
        <p class="lead animate__animated animate__fadeInUp">
          Keep your IT infrastructure running smoothly with our comprehensive support and maintenance services.
        </p>
        <a href="{{ route('contact') }}" class="btn bg-accent-orange text-white fw-bold mt-3 animate__animated animate__pulse">
          We respond within 2 business hours
        </a>
      </div>
    </div>
  </div>
</section>

{{-- Support Services --}}
<section class="py-5 bg-white">
  <div class="container text-center">
    <h2 class="mb-4" data-aos="fade-up">Support Services</h2>
    <p class="text-muted mb-5" data-aos="fade-up" data-aos-delay="100">
      Our comprehensive support ensures your business stays connected and productive.
    </p>
    <div class="row g-4">
      @php
        $services = [
          ['icon' => 'headphones', 'title' => '24/7 Help Desk', 'desc' => 'Get support anytime with our around-the-clock help desk services.'],
          ['icon' => 'monitor', 'title' => 'Remote Monitoring', 'desc' => 'Ensure your systems are always up and running with proactive monitoring.'],
          ['icon' => 'shield-check', 'title' => 'Annual Network Audits', 'desc' => 'Identify potential issues and optimize performance with yearly audits.'],
          ['icon' => 'wrench', 'title' => 'Preventive Maintenance', 'desc' => 'Avoid downtime with regular maintenance and updates.'],
        ];
      @endphp

      @foreach($services as $index => $service)
        <div class="col-md-3" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
          <div class="card h-100 shadow-sm border-0">
            <div class="card-body text-center">
              <i data-lucide="{{ $service['icon'] }}" class="text-accent-orange mb-3" style="width:32px;height:32px;"></i>
              <h5 class="card-title text-primary-blue">{{ $service['title'] }}</h5>
              <p class="text-muted small">{{ $service['desc'] }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- Contact Options --}}
<section class="py-5 bg-white">
  <div class="container">
    <div class="row align-items-center">
      {{-- Emergency Contact --}}
      <div class="col-md-6" data-aos="fade-right">
        <div class="bg-accent-orange text-white p-4 rounded shadow-sm h-100">
          <h4 class="fw-bold">Need Urgent IT Help?</h4>
          <p class="mb-3">Our emergency support team is ready to assist you 24/7.</p>
          <div class="d-flex align-items-center gap-3">
            <i class="bi bi-telephone-fill fs-4"></i>
            <a href="tel:0723639338" class="text-white fw-bold text-decoration-none">Call 0723 639338 Now</a>
          </div>
          <a href="{{ route('contact') }}" class="btn btn-light text-accent-orange mt-3 fw-bold">
            Request Support
          </a>
        </div>
      </div>

      {{-- WhatsApp Support --}}
      <div class="col-md-6 mt-4 mt-md-0" data-aos="fade-left">
        <div class="p-4 bg-light rounded shadow-sm h-100 text-center text-md-start">
          <h4 class="fw-bold text-primary-blue">Have Questions?</h4>
          <p class="text-muted">Connect with our support team via WhatsApp for quick answers to your technical questions.</p>
          <a href="https://wa.me/254723639338" target="_blank" class="btn btn-success fw-bold">
            <i class="bi bi-whatsapp me-2"></i> Chat on WhatsApp
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- CTA Section --}}
<section class="py-5 text-white" style="background: linear-gradient(to right, #002366, #00C853);">
  <div class="container text-center" data-aos="fade-up">
    <h2 class="mb-3">Ready to Secure Your IT Infrastructure?</h2>
    <p class="lead mb-4">Let Netvoice Systems handle your support and maintenance with precision and care.</p>
    <a href="{{ route('contact') }}" class="btn bg-white text-primary-blue fw-bold px-4 py-2">
      Request a Free Consultation
    </a>
  </div>
</section>

@endsection
