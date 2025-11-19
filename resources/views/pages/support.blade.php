@extends('layouts.app')
@section('title', 'Support')

@section('content')

  {{-- Hero Section --}}
  <section class="bg-primary-blue text-white py-5">
    <div class="container">
      <div class="col-lg-8">
        <h1 class="mb-3 animate__animated animate__fadeInDown">Customer Support</h1>
        <p class="lead text-gray-200 animate__animated animate__fadeInUp">
          Reliable, responsive, and round-the-clock support to keep your business running smoothly.
        </p>
      </div>
    </div>
  </section>

  {{-- Support Options Overview --}}
  <section class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="mb-4">Our Support Services</h2>
      <p class="text-muted mb-5">Comprehensive support options designed to meet your business needs.</p>

      <div class="row g-4">
        {{-- Technical Support --}}
        <div class="col-md-4 animate__animated animate__fadeInLeft">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <div class="rounded bg-accent-orange text-white d-flex align-items-center justify-content-center mb-3" style="width:60px;height:60px;">
                <i class="bi bi-headset fs-3"></i>
              </div>
              <h5 class="card-title text-primary-blue">Technical Support</h5>
              <p class="text-muted">24/7 assistance for troubleshooting, system upgrades, and preventive maintenance.</p>
            </div>
          </div>
        </div>

        {{-- Monitoring --}}
        <div class="col-md-4 animate__animated animate__fadeInUp">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <div class="rounded bg-accent-orange text-white d-flex align-items-center justify-content-center mb-3" style="width:60px;height:60px;">
                <i class="bi bi-activity fs-3"></i>
              </div>
              <h5 class="card-title text-primary-blue">System Monitoring</h5>
              <p class="text-muted">Real-time monitoring to ensure uptime, performance, and proactive issue resolution.</p>
            </div>
          </div>
        </div>

        {{-- Consultation --}}
        <div class="col-md-4 animate__animated animate__fadeInRight">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <div class="rounded bg-accent-orange text-white d-flex align-items-center justify-content-center mb-3" style="width:60px;height:60px;">
                <i class="bi bi-person-lines-fill fs-3"></i>
              </div>
              <h5 class="card-title text-primary-blue">Consultation</h5>
              <p class="text-muted">Expert guidance to optimize ICT infrastructure and align with your business goals.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

    {{-- Support Form --}}
  <section class="py-5 bg-white">
    <div class="container">
      <h2 class="text-center mb-4">Request Support</h2>
      <p class="text-muted text-center mb-5">Fill out the form below and our team will get back to you promptly.</p>
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <form class="p-4 bg-light rounded shadow-sm">
            <div class="mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="name" placeholder="Enter your name">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="email" placeholder="Enter your email">
            </div>
            <div class="mb-3">
              <label for="issue" class="form-label">Issue Description</label>
              <textarea class="form-control" id="issue" rows="4" placeholder="Describe your issue"></textarea>
            </div>
            <button type="submit" class="btn bg-accent-orange text-white">Submit Request</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  {{-- Features Section --}}
  <section class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="mb-4">Why Choose Our Support?</h2>
      <div class="row g-4">
        <div class="col-md-4 animate__animated animate__fadeInLeft">
          <i class="bi bi-clock-history fs-1 text-accent-orange mb-3"></i>
          <h5>24/7 Availability</h5>
          <p class="text-muted">Round-the-clock support to ensure your systems are always operational.</p>
        </div>
        <div class="col-md-4 animate__animated animate__fadeInUp">
          <i class="bi bi-lightning-charge fs-1 text-accent-orange mb-3"></i>
          <h5>Fast Response</h5>
          <p class="text-muted">Quick turnaround times to minimize downtime and keep your business running.</p>
        </div>
        <div class="col-md-4 animate__animated animate__fadeInRight">
          <i class="bi bi-shield-check fs-1 text-accent-orange mb-3"></i>
          <h5>Trusted Expertise</h5>
          <p class="text-muted">Experienced professionals delivering reliable solutions for complex ICT challenges.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- Plans Overview --}}
  <section class="py-5 bg-white">
    <div class="container text-center">
      <h2 class="mb-4">Support Plans</h2>
      <p class="text-muted mb-5">Choose a plan that fits your business needs.</p>
      <div class="row g-4">
        <div class="col-md-4 animate__animated animate__fadeInLeft">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title text-primary-blue">Basic Plan</h5>
              <p class="text-muted">Email support, scheduled maintenance, and system health checks.</p>
              <a href="{{ route('contact') }}" class="btn bg-accent-orange text-white mt-3">Select Plan</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 animate__animated animate__fadeInUp">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title text-primary-blue">Standard Plan</h5>
              <p class="text-muted">Phone support, proactive monitoring, and priority issue resolution.</p>
              <a href="{{ route('contact') }}" class="btn bg-accent-orange text-white mt-3">Select Plan</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 animate__animated animate__fadeInRight">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title text-primary-blue">Premium Plan</h5>
              <p class="text-muted">Dedicated account manager, on-site support, and advanced system optimization.</p>
              <a href="{{ route('contact') }}" class="btn bg-accent-orange text-white mt-3">Select Plan</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- CTA Section --}}
  <section class="py-5 bg-primary-blue text-white text-center">
    <div class="container">
      <h2 class="mb-3 animate__animated animate__fadeInUp">Need Immediate Assistance?</h2>
      <p class="lead text-gray-200 mb-4 animate__animated animate__fadeInUp">
        Contact our support team today and experience reliable, responsive service tailored to your needs.
      </p>
      <a href="{{ route('contact') }}" class="btn bg-accent-orange text-white animate__animated animate__pulse">
        Get Support Now
      </a>
    </div>
  </section>

@endsection
