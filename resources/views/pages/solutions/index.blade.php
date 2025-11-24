@extends('layouts.app')
@section('title', 'Solutions')

@section('content')

  {{-- Hero Section --}}
  <section class="bg-primary-blue text-white py-5">
    <div class="container">
      <div class="col-lg-8">
        <h1 class="mb-3 animate__animated animate__fadeInDown">Our Solutions</h1>
        <p class="lead text-gray-200 animate__animated animate__fadeInUp">
          Innovative ICT solutions tailored to solve complex challenges and empower your business growth.
        </p>
      </div>
    </div>
  </section>

  {{-- Solutions Overview --}}
  <section class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="mb-4">Comprehensive ICT Solutions</h2>
      <p class="text-muted mb-5">Explore our wide range of solutions designed to meet diverse industry demands.</p>

      <div class="row g-4">
        {{-- Enterprise Solutions --}}
        <div class="col-md-6 col-lg-4 animate__animated animate__fadeInLeft">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <div class="rounded bg-accent-orange text-white d-flex align-items-center justify-content-center mb-3" style="width:60px;height:60px;">
                <i class="bi bi-building fs-3"></i>
              </div>
              <h5 class="card-title text-primary-blue">Enterprise Solutions</h5>
              <p class="text-muted">Scalable enterprise ICT systems including ERP, CRM, and secure communication platforms.</p>
            </div>
          </div>
        </div>

        {{-- Cloud Solutions --}}
        <div class="col-md-6 col-lg-4 animate__animated animate__fadeInUp">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <div class="rounded bg-accent-orange text-white d-flex align-items-center justify-content-center mb-3" style="width:60px;height:60px;">
                <i class="bi bi-cloud fs-3"></i>
              </div>
              <h5 class="card-title text-primary-blue">Cloud Solutions</h5>
              <p class="text-muted">Hybrid cloud integration, secure storage, and disaster recovery solutions for modern businesses.</p>
            </div>
          </div>
        </div>

        {{-- Cybersecurity Solutions --}}
        <div class="col-md-6 col-lg-4 animate__animated animate__fadeInRight">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <div class="rounded bg-accent-orange text-white d-flex align-items-center justify-content-center mb-3" style="width:60px;height:60px;">
                <i class="bi bi-shield-lock fs-3"></i>
              </div>
              <h5 class="card-title text-primary-blue">Cybersecurity Solutions</h5>
              <p class="text-muted">Advanced threat protection, firewalls, and compliance-ready systems to safeguard your digital assets.</p>
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
      <p class="text-muted text-center mb-5">Beyond core offerings, we provide tailored solutions for complex ICT challenges.</p>
      <div class="row g-4">
        {{-- Data Center Solutions --}}
        <div class="col-md-6 animate__animated animate__fadeInLeft">
          <div class="bg-light p-4 rounded shadow-sm h-100">
            <div class="rounded bg-accent-orange text-white d-flex align-items-center justify-content-center mb-3" style="width:60px;height:60px;">
              <i class="bi bi-server fs-3"></i>
            </div>
            <h5 class="mb-3">Data Center Solutions</h5>
            <ul class="list-unstyled small text-muted">
              <li><span class="text-accent-orange">•</span> Server deployment & virtualization</li>
              <li><span class="text-accent-orange">•</span> High-availability infrastructure</li>
              <li><span class="text-accent-orange">•</span> Monitoring & performance optimization</li>
              <li><span class="text-accent-orange">•</span> Disaster recovery planning</li>
            </ul>
          </div>
        </div>

        {{-- Digital Transformation --}}
        <div class="col-md-6 animate__animated animate__fadeInRight">
          <div class="bg-light p-4 rounded shadow-sm h-100">
            <div class="rounded bg-accent-orange text-white d-flex align-items-center justify-content-center mb-3" style="width:60px;height:60px;">
              <i class="bi bi-laptop fs-3"></i>
            </div>
            <h5 class="mb-3">Digital Transformation</h5>
            <ul class="list-unstyled small text-muted">
              <li><span class="text-accent-orange">•</span> Cloud migration strategies</li>
              <li><span class="text-accent-orange">•</span> Business process automation</li>
              <li><span class="text-accent-orange">•</span> Collaboration & productivity tools</li>
              <li><span class="text-accent-orange">•</span> Data analytics & insights</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Success Metrics --}}
  <section class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="mb-4 animate__animated animate__fadeInUp">Our Proven Results</h2>
      <p class="text-muted mb-5">Delivering measurable impact through innovative solutions</p>
      <div class="row g-4">
        <div class="col-md-3">
          <h3 class="text-accent-orange">250+</h3>
          <p class="text-muted">Cloud Deployments</p>
        </div>
        <div class="col-md-3">
          <h3 class="text-accent-orange">180+</h3>
          <p class="text-muted">Data Center Projects</p>
        </div>
        <div class="col-md-3">
          <h3 class="text-accent-orange">300+</h3>
          <p class="text-muted">Cybersecurity Solutions</p>
        </div>
        <div class="col-md-3">
          <h3 class="text-accent-orange">95%</h3>
          <p class="text-muted">Client Satisfaction Rate</p>
        </div>
      </div>
    </div>
  </section>

  {{-- CTA Section --}}
  <section class="py-5 bg-primary-blue text-white text-center">
    <div class="container">
      <h2 class="mb-3 animate__animated animate__fadeInUp">Ready to Implement Smart Solutions?</h2>
      <p class="lead text-gray-200 mb-4 animate__animated animate__fadeInUp">
        Partner with NetVoice to transform your business with reliable, secure, and scalable ICT solutions.
      </p>
      <a href="{{ route('contact') }}" class="btn bg-accent-orange text-white animate__animated animate__pulse">
        Contact Us Today
      </a>
    </div>
  </section>

@endsection
