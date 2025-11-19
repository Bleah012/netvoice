@extends('layouts.app')
@section('title', 'Contact Us')

@section('content')

  {{-- Hero Section --}}
  <section class="bg-primary-blue text-white py-5">
    <div class="container">
      <div class="col-lg-8">
        <h1 class="mb-3 animate__animated animate__fadeInDown">Get in Touch</h1>
        <p class="lead text-gray-200 animate__animated animate__fadeInUp">
          Reach out to NetVoice Systems Engineering Ltd for inquiries, support, or partnership opportunities.
        </p>
      </div>
    </div>
  </section>

  {{-- Contact Information --}}
  <section class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="mb-4">Contact Information</h2>
      <p class="text-muted mb-5">We are here to assist you with reliable ICT solutions and responsive support.</p>

      <div class="row g-4">
        {{-- Phone --}}
        <div class="col-md-3 animate__animated animate__fadeInLeft">
          <i class="bi bi-telephone fs-1 text-accent-orange mb-3"></i>
          <h5>Phone</h5>
          <p class="text-muted">0723 639338</p>
        </div>

        {{-- Email --}}
        <div class="col-md-3 animate__animated animate__fadeInUp">
          <i class="bi bi-envelope fs-1 text-accent-orange mb-3"></i>
          <h5>Email</h5>
          <p class="text-muted">netvoicesystems@gmail.com</p>
        </div>

        {{-- Address --}}
        <div class="col-md-3 animate__animated animate__fadeInUp">
          <i class="bi bi-geo-alt fs-1 text-accent-orange mb-3"></i>
          <h5>Address</h5>
          <p class="text-muted">P.O Box 7067-00300, Ronald Ngara, Nairobi</p>
        </div>

        {{-- Website --}}
        <div class="col-md-3 animate__animated animate__fadeInRight">
          <i class="bi bi-globe fs-1 text-accent-orange mb-3"></i>
          <h5>Website</h5>
          <p class="text-muted">www.netvoicesystems.com</p>
        </div>
      </div>
    </div>
  </section>

  {{-- Contact Form --}}
  <section class="py-5 bg-white">
    <div class="container">
      <h2 class="text-center mb-4">Send Us a Message</h2>
      <p class="text-muted text-center mb-5">
        Fill out the form below and our team will respond promptly to your inquiry.
      </p>
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
              <label for="phone" class="form-label">Phone Number</label>
              <input type="text" class="form-control" id="phone" placeholder="Enter your phone number">
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Message</label>
              <textarea class="form-control" id="message" rows="4" placeholder="Write your message"></textarea>
            </div>
            <button type="submit" class="btn bg-accent-orange text-white">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  {{-- CTA Section --}}
  <section class="py-5 bg-primary-blue text-white text-center">
    <div class="container">
      <h2 class="mb-3 animate__animated animate__fadeInUp">Connect With NetVoice Systems</h2>
      <p class="lead text-gray-200 mb-4 animate__animated animate__fadeInUp">
        Whether you need ICT solutions, support, or partnership opportunities — we are ready to help.
      </p>
      <a href="mailto:netvoicesystems@gmail.com" class="btn bg-accent-orange text-white animate__animated animate__pulse">
        Email Us Directly
      </a>
    </div>
  </section>

@endsection
