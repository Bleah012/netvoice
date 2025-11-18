@extends('layouts.app')
@section('title', 'Solutions')

@section('content')

  {{-- Hero Section --}}
  <section class="bg-primary-blue text-white py-5">
    <div class="container">
      <div class="col-lg-8">
        <h1 class="mb-3">Our Solutions</h1>
        <p class="lead text-gray-200">
          Comprehensive technology solutions that drive digital transformation and business growth
        </p>
      </div>
    </div>
  </section>

  {{-- Solutions Overview --}}
  <section class="py-5 bg-white">
    <div class="container">
      <div class="text-center mb-5">
        <h2 class="mb-3">End-to-End ICT Solutions</h2>
        <p class="text-muted">From strategic planning to implementation and support, we provide complete solutions tailored to your business needs</p>
      </div>

      {{-- Example Solution Block --}}
      <div class="row align-items-center mb-5">
        <div class="col-lg-6">
          <div class="d-flex align-items-center mb-3">
            <div class="rounded bg-primary-blue text-white d-flex align-items-center justify-content-center me-3" style="width:70px;height:70px;">
              <i class="bi bi-search fs-2"></i>
            </div>
            <h4 class="mb-0">Network Consulting</h4>
          </div>
          <p class="text-muted">Expert guidance to optimize your network infrastructure and IT strategy</p>
          <ul class="list-unstyled small text-muted">
            <li><i class="bi bi-check-circle text-accent-orange me-2"></i> Network assessment and audit</li>
            <li><i class="bi bi-check-circle text-accent-orange me-2"></i> Technology roadmap planning</li>
            <li><i class="bi bi-check-circle text-accent-orange me-2"></i> Cost optimization strategies</li>
            <li><i class="bi bi-check-circle text-accent-orange me-2"></i> Security best practices</li>
            <li><i class="bi bi-check-circle text-accent-orange me-2"></i> Scalability planning</li>
          </ul>
          <a href="{{ route('contact') }}" class="btn bg-primary-blue text-white mt-3">
            Learn More <i class="bi bi-arrow-right"></i>
          </a>
        </div>

        <div class="col-lg-6">
          <div class="bg-light p-4 rounded border-start border-4 border-accent-orange">
            <div class="mb-3 d-flex justify-content-between align-items-center bg-white p-3 rounded shadow-sm">
              <span>Assessment</span>
              <div class="bg-accent-orange rounded-pill" style="width:100px;height:8px;"></div>
            </div>
            <div class="mb-3 d-flex justify-content-between align-items-center bg-white p-3 rounded shadow-sm">
              <span>Planning</span>
              <div class="bg-accent-orange rounded-pill" style="width:80px;height:8px;"></div>
            </div>
            <div class="mb-3 d-flex justify-content-between align-items-center bg-white p-3 rounded shadow-sm">
              <span>Implementation</span>
              <div class="bg-accent-orange rounded-pill" style="width:120px;height:8px;"></div>
            </div>
            <div class="d-flex justify-content-between align-items-center bg-white p-3 rounded shadow-sm">
              <span>Optimization</span>
              <div class="bg-accent-orange rounded-pill" style="width:60px;height:8px;"></div>
            </div>
          </div>
        </div>
      </div>

      {{-- Repeat similar blocks for Network Design, System Integration, Project Management, Broadband --}}
    </div>
  </section>

  {{-- Solution Methodology --}}
  <section class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="mb-4">Our Solution Methodology</h2>
      <p class="text-muted mb-5">A proven approach to delivering successful technology solutions</p>

      <div class="row g-4">
        <div class="col-md-3">
          <div class="rounded-circle bg-primary-blue text-white d-flex align-items-center justify-content-center mx-auto mb-3" style="width:70px;height:70px;">1</div>
          <h5>Discover</h5>
          <p class="text-muted">Understanding your business goals and technical requirements</p>
        </div>
        <div class="col-md-3">
          <div class="rounded-circle bg-primary-blue text-white d-flex align-items-center justify-content-center mx-auto mb-3" style="width:70px;height:70px;">2</div>
          <h5>Strategize</h5>
          <p class="text-muted">Developing a comprehensive solution strategy and roadmap</p>
        </div>
        <div class="col-md-3">
          <div class="rounded-circle bg-primary-blue text-white d-flex align-items-center justify-content-center mx-auto mb-3" style="width:70px;height:70px;">3</div>
          <h5>Execute</h5>
          <p class="text-muted">Implementing solutions with precision and expertise</p>
        </div>
        <div class="col-md-3">
          <div class="rounded-circle bg-primary-blue text-white d-flex align-items-center justify-content-center mx-auto mb-3" style="width:70px;height:70px;">4</div>
          <h5>Optimize</h5>
          <p class="text-muted">Continuous improvement and performance optimization</p>
        </div>
      </div>
    </div>
  </section>

  {{-- CTA Section --}}
  <section class="py-5 bg-primary-blue text-white text-center">
    <div class="container">
      <h2 class="mb-3">Ready to Transform Your Infrastructure?</h2>
      <p class="lead text-gray-200 mb-4">
        Let our experts design and implement the perfect solution for your business
      </p>
      <a href="{{ route('contact') }}" class="btn bg-accent-orange text-white">
        Schedule a Consultation <i class="bi bi-arrow-right"></i>
      </a>
    </div>
  </section>

@endsection
