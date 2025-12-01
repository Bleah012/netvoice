@extends('layouts.app')
@section('title', 'Our Services')

@section('content')

{{-- Hero Section --}}
<section class="py-5 text-white" style="background: linear-gradient(to right, #002366, #00C853);">
  <div class="container text-center">
    <h1 class="fw-bold mb-3">Our Services</h1>
    <p class="lead">Comprehensive ICT and solar solutions tailored to Kenyan enterprises — delivering reliability, scalability, and innovation.</p>
  </div>
</section>

{{-- Services Accordion Layout --}}
<section class="py-5 bg-white">
  <div class="container">
    <div class="row g-4">
      {{-- Sticky Sidebar --}}
      <div class="col-md-4">
        <div class="position-sticky" style="top: 100px;">
          <div class="list-group">
            @foreach($services as $s)
              <a href="#{{ $s->slug }}"
                 class="list-group-item list-group-item-action d-flex align-items-center {{ $activeSlug === $s->slug ? 'active' : '' }}">
                <i data-lucide="layers" class="me-2" style="width:18px;height:18px;"></i>
                {{ $s->name }}
              </a>
            @endforeach
          </div>
        </div>
      </div>

      {{-- Accordion Content --}}
      <div class="col-md-8">
        <div class="accordion" id="servicesAccordion">
          @foreach($services as $s)
            <div class="accordion-item mb-3" id="{{ $s->slug }}">
              <h2 class="accordion-header">
                <button class="accordion-button {{ $activeSlug === $s->slug ? '' : 'collapsed' }}"
                        type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse-{{ $s->slug }}"
                        aria-expanded="{{ $activeSlug === $s->slug ? 'true' : 'false' }}"
                        aria-controls="collapse-{{ $s->slug }}">
                  <i data-lucide="check-circle" class="me-2 text-success" style="width:18px;height:18px;"></i>
                  {{ $s->name }}
                </button>
              </h2>
              <div id="collapse-{{ $s->slug }}"
                   class="accordion-collapse collapse {{ $activeSlug === $s->slug ? 'show' : '' }}"
                   data-bs-parent="#servicesAccordion">
                <div class="accordion-body">
                  @include('pages.services.partials.detail', ['service' => $s])
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

{{-- CTA Section --}}
<section class="py-5 bg-primary-blue text-white text-center">
  <div class="container">
    <h2 class="mb-3">Ready to Transform Your Business?</h2>
    <p class="lead text-gray-200 mb-4">Partner with Netvoice Systems for reliable, secure, and scalable ICT solutions.</p>
    <a href="{{ route('contact') }}" class="btn bg-accent-orange text-white">Get in Touch</a>
  </div>
</section>

@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', () => {
    lucide.createIcons();
  });
</script>
@endpush
