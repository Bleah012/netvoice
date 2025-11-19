@extends('layouts.app')
@section('title', 'About Us')

@section('content')

  {{-- Hero Section --}}
  <section class="bg-primary-blue text-white py-5">
    <div class="container">
      <div class="col-lg-8">
        <h1 class="mb-3 animate__animated animate__fadeInDown">About NetVoice Systems</h1>
        <p class="lead text-gray-200 animate__animated animate__fadeInUp">
          Established in 2013, NetVoice Systems Engineering Ltd is an indigenous Kenyan ICT company
          committed to delivering reliable, affordable, and future-ready networking and telecommunication solutions.
        </p>
      </div>
    </div>
  </section>

  {{-- Company Overview --}}
  <section class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="mb-4">Company Overview</h2>
      <p class="text-muted mb-5">
        NetVoice Systems Engineering Ltd was founded by locally and internationally trained directors
        with extensive experience in Kenya’s telecommunication industry. Our focus is on survey, design,
        implementation, and after-sales service — all delivered with integrity and high-quality standards.
      </p>

      <div class="row g-4">
        {{-- Introduction --}}
        <div class="col-md-6 animate__animated animate__fadeInLeft">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <div class="rounded bg-accent-orange text-white d-flex align-items-center justify-content-center mb-3"
                   style="width:60px;height:60px;">
                <i class="bi bi-journal-text fs-3"></i>
              </div>
              <h5 class="card-title text-primary-blue">Introduction</h5>
              <p class="text-muted">
                Founded in August 2013, NetVoice Systems Engineering Ltd emerged with a vision to provide
                top-class ICT and office automation solutions across Kenya and East Africa.
              </p>
            </div>
          </div>
        </div>

        {{-- Background --}}
        <div class="col-md-6 animate__animated animate__fadeInRight">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <div class="rounded bg-accent-orange text-white d-flex align-items-center justify-content-center mb-3"
                   style="width:60px;height:60px;">
                <i class="bi bi-building fs-3"></i>
              </div>
              <h5 class="card-title text-primary-blue">Background</h5>
              <p class="text-muted">
                Based in Trust Building, Moi Avenue, Nairobi, NetVoice Systems serves diverse industries —
                from banks and insurance companies to NGOs, learning institutions, and manufacturing firms.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Mission & Vision --}}
  <section class="py-5 bg-white">
    <div class="container text-center">
      <h2 class="mb-4">Our Mission & Vision</h2>
      <div class="row g-4">
        {{-- Mission --}}
        <div class="col-md-6 animate__animated animate__fadeInLeft">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <div class="rounded bg-accent-orange text-white d-flex align-items-center justify-content-center mb-3"
                   style="width:60px;height:60px;">
                <i class="bi bi-bullseye fs-3"></i>
              </div>
              <h5 class="card-title text-primary-blue">Our Mission</h5>
              <p class="text-muted">
                Grow and let grow, never ignore to feed the needy just because they are old to die!
              </p>
            </div>
          </div>
        </div>

        {{-- Vision --}}
        <div class="col-md-6 animate__animated animate__fadeInRight">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <div class="rounded bg-accent-orange text-white d-flex align-items-center justify-content-center mb-3"
                   style="width:60px;height:60px;">
                <i class="bi bi-eye fs-3"></i>
              </div>
              <h5 class="card-title text-primary-blue">Our Vision</h5>
              <p class="text-muted">
                To be the leader in making reliable and affordable networks that help customers run
                profitable businesses using present and future ICT systems.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- Core Values --}}
  <section class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="mb-4">Our Core Values</h2>
      <p class="text-muted mb-5">Guided by principles that shape our culture and service delivery.</p>
      <div class="row g-4">
        <div class="col-md-3 animate__animated animate__fadeInLeft">
          <i class="bi bi-person-check fs-1 text-accent-orange mb-3"></i>
          <h5>Self-Realization</h5>
          <p class="text-muted small">Optimizing personal development and innovative potential of all our people.</p>
        </div>
        <div class="col-md-3 animate__animated animate__fadeInUp">
          <i class="bi bi-people fs-1 text-accent-orange mb-3"></i>
          <h5>Interdependence</h5>
          <p class="text-muted small">Creating freedom of mind and action for collective benefit.</p>
        </div>
        <div class="col-md-3 animate__animated animate__fadeInUp">
          <i class="bi bi-award fs-1 text-accent-orange mb-3"></i>
          <h5>Leadership</h5>
          <p class="text-muted small">Developing capable leaders to achieve social and organizational goals.</p>
        </div>
        <div class="col-md-3 animate__animated animate__fadeInRight">
          <i class="bi bi-hand-thumbs-up fs-1 text-accent-orange mb-3"></i>
          <h5>Service</h5>
          <p class="text-muted small">Delivering solutions that meet the needs and satisfaction of society at large.</p>
        </div>
      </div>

      <div class="row g-4 mt-4">
        <div class="col-md-3 animate__animated animate__fadeInLeft">
          <i class="bi bi-emoji-smile fs-1 text-accent-orange mb-3"></i>
          <h5>Pleasure</h5>
          <p class="text-muted small">Enhancing enjoyment of life and creating happiness through our work.</p>
        </div>
        <div class="col-md-3 animate__animated animate__fadeInUp">
          <i class="bi bi-cash-stack fs-1 text-accent-orange mb-3"></i>
          <h5>Wealth</h5>
          <p class="text-muted small">Creating financial resources for our people and the wider community.</p>
        </div>
        <div class="col-md-3 animate__animated animate__fadeInUp">
          <i class="bi bi-heart fs-1 text-accent-orange mb-3"></i>
          <h5>Parenthood</h5>
          <p class="text-muted small">Supporting good parenthood to build a stronger society.</p>
        </div>
        <div class="col-md-3 animate__animated animate__fadeInRight">
          <i class="bi bi-globe fs-1 text-accent-orange mb-3"></i>
          <h5>Society</h5>
          <p class="text-muted small">Working with society to improve quality of life for all.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- Team & Background --}}
  <section class="py-5 bg-white">
    <div class="container text-center">
      <h2 class="mb-4">Our Background</h2>
      <p class="text-muted mb-5">
        Founded in August 2013, NetVoice Systems Engineering Ltd operates from Trust Building, Moi Avenue, Nairobi.
        Our directors are indigenous Kenyans with local and international training, committed to continuous learning
        and adapting to ICT industry changes.
      </p>
      <p class="text-muted">
        We proudly serve diverse industries including banks, insurance companies, NGOs, learning institutions,
        manufacturing, construction, and general businesses. Our partnerships span leading global vendors such as
        Cisco, Microsoft, IBM, Alcatel, Hikvision, and Panasonic.
      </p>
    </div>
  </section>

  {{-- CTA Section --}}
  <section class="py-5 bg-primary-blue text-white text-center">
    <div class="container">
      <h2 class="mb-3 animate__animated animate__fadeInUp">Partner With NetVoice Systems</h2>
      <p class="lead text-gray-200 mb-4 animate__animated animate__fadeInUp">
        Join us in building reliable, affordable, and future-ready ICT networks that empower businesses and communities.
      </p>
      <a href="{{ route('contact') }}" class="btn bg-accent-orange text-white animate__animated animate__pulse">
        Contact Us Today
      </a>
    </div>
  </section>

@endsection

