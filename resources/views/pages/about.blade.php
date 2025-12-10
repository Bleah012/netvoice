@extends('layouts.app')
@section('title', 'About Us')

@section('content')

{{-- Hero Section --}}
<section class="py-5" style="background: linear-gradient(to right, #002366, #00C853); color: #fff;">
  <div class="container text-center" data-aos="fade-down">
    <h1 class="mb-3 animate__animated animate__fadeInDown">About Netvoice Systems</h1>
    <p class="lead animate__animated animate__fadeInUp">
      Indigenous Kenyan expertise delivering top-class ICT and automation solutions since 2013.
    </p>
  </div>
</section>

{{-- Our Story --}}
<section class="py-5 bg-white">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6" data-aos="fade-right">
        <h2 class="text-primary mb-4">Our Story</h2>
        <p class="text-muted mb-3">
          Netvoice Systems Engineering Ltd was registered in August 2013 and launched into the telecommunication world by a team of indigenous Kenyan technicians poached from leading ICT firms across East Africa. Driven by a shared desire to offer quality and timely service, the directors—locally and internationally trained—understand the evolving needs of customers and the importance of building wealth through technology.
        </p>
        <p class="text-muted mb-4">
          Our commitment is to survey, design, implement, and support ICT and automation systems with integrity and high standards. We believe in continuous learning and strive to make a meaningful difference in every enterprise we serve.
        </p>
        <ul class="list-unstyled text-muted">
          @foreach([
            'Founded in August 2013',
            'Indigenous Kenyan leadership',
            'Locally and internationally trained technicians',
            'Committed to quality and timely service',
            'Serving 200+ enterprises across East Africa',
            'Specializing in ICT and office automation'
          ] as $point)
            <li class="d-flex align-items-center mb-2">
              <i data-lucide="check-circle-2" class="text-success me-2 w-4 h-4"></i> {{ $point }}
            </li>
          @endforeach
        </ul>
      </div>

      {{-- HQ Image onboarded into public/images/clients --}}
      <div class="col-lg-6" data-aos="fade-left">
        <img src="{{ asset('images/clients/netvoice_building.jpg') }}"
             alt="Netvoice HQ"
             class="img-fluid rounded shadow"
             style="height:500px;object-fit:cover;width:100%;"
             loading="lazy">
      </div>
    </div>
  </div>
</section>

{{-- Vision & Mission --}}
<section class="py-5 bg-light">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-6" data-aos="zoom-in">
        <div class="bg-white p-5 rounded shadow text-center h-100">
          <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width:60px;height:60px;">
            <i data-lucide="eye-off" class="w-5 h-5"></i>
          </div>
          <h4 class="text-primary mb-3">Our Vision</h4>
          <p class="text-muted">
            To be the leader in making reliable and affordable networks that meet the people's needs by helping customers run profitable businesses using present and future information and communication technology systems.
          </p>
        </div>
      </div>
      <div class="col-md-6" data-aos="zoom-in">
        <div class="bg-white p-5 rounded shadow text-center h-100">
          <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width:60px;height:60px;">
            <i data-lucide="target" class="w-5 h-5"></i>
          </div>
          <h4 class="text-success mb-3">Our Mission</h4>
          <p class="text-muted">
            Grow and let grow, never ignore to feed the needy just because they are old enough to die.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Team Section --}}
<section class="py-5 bg-light">
  <div class="container text-center">
    <h2 class="mb-4 text-primary" data-aos="fade-up">Meet Our Leadership Team</h2>
    <p class="text-muted mb-5" data-aos="fade-up" data-aos-delay="100">
      Our team of locally and internationally trained professionals brings deep expertise in ICT and automation. With decades of combined experience, we deliver future-ready infrastructure to enterprises across Kenya and East Africa.
    </p>
    <div class="row justify-content-center">
      <div class="col-md-4" data-aos="zoom-in">
        <div class="card border-0 shadow-sm text-center p-4">
          {{-- Team Image onboarded into public/images/team --}}
          <img src="{{ asset('images/clients/netvoice_team.jpg') }}"
               alt="Netvoice Leadership Team"
               class="img-fluid rounded shadow"
               style="width:500px;height:400px;object-fit:cover;"
               loading="lazy">
          <h5 class="text-primary mt-3">Leadership Team</h5>
          <p class="text-muted small">Visionary engineers and directors committed to quality, innovation, and customer success.</p>
        </div>
      </div>
    </div>
  </div>
</section>
{{-- Timeline Section --}}
<section class="py-5 bg-white">
  <div class="container">
    <h2 class="text-center mb-5 text-primary" data-aos="fade-up">Milestones & Growth</h2>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <ul class="timeline list-unstyled position-relative">
          @php
            $milestones = [
              ['year' => '2013', 'title' => 'Company Registered', 'desc' => 'Netvoice Systems Engineering Ltd officially registered in Nairobi.'],
              ['year' => '2014', 'title' => 'First Major Project', 'desc' => 'Structured cabling for a 10-story commercial complex.'],
              ['year' => '2016', 'title' => 'Solar Division Launched', 'desc' => 'Started offering off-grid and hybrid solar installations.'],
              ['year' => '2019', 'title' => 'NGO & Education Expansion', 'desc' => 'Deployed surveillance and network systems in 30+ schools and NGO offices.'],
              ['year' => '2023', 'title' => '200+ Enterprises Served', 'desc' => 'Crossed 200 active clients across banking, manufacturing, and commercial sectors.'],
            ];
          @endphp

          @foreach($milestones as $item)
            <li class="mb-5 d-flex align-items-start" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
              <div class="bg-primary text-white rounded-circle me-3 d-flex align-items-center justify-content-center" style="width:50px;height:50px;">
                <strong>{{ $item['year'] }}</strong>
              </div>
              <div>
                <h5 class="mb-1 text-primary">{{ $item['title'] }}</h5>
                <p class="text-muted small mb-2">{{ $item['desc'] }}</p>
                {{-- Milestone images onboarded into public/images/milestones --}}
                <img src="{{ asset('images/milestones/' . $item['year'] . '.jpg') }}"
                     alt="{{ $item['title'] }}"
                     class="img-fluid rounded shadow"
                     style="width:100%;max-height:450px;object-fit:cover;"
                     loading="lazy">
              </div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</section>

{{-- Timeline Styles --}}
<style>
  .timeline::before {
    content: '';
    position: absolute;
    left: 25px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #002366;
  }
</style>

{{-- CTA Section --}}
<section class="py-5 bg-primary-blue text-white text-center">
  <div class="container" data-aos="fade-up">
    <h2 class="mb-3 animate__animated animate__fadeInUp">Partner With Netvoice Systems</h2>
    <p class="lead mb-4 animate__animated animate__fadeInUp">
      Join us in building reliable, affordable, and future-ready ICT networks that empower businesses and communities.
    </p>
    <a href="{{ route('contact') }}" 
       class="btn bg-success text-white px-5 py-3 rounded shadow animate__animated animate__pulse" 
       aria-label="Contact Us Today">
      Contact Us Today
    </a>
  </div>
</section>

@endsection
