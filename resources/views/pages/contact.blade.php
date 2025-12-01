@extends('layouts.app')
@section('title', 'Contact Us')

@section('content')

{{-- Hero Section --}}
<section class="py-5" style="background: linear-gradient(to right, #002366, #00C853); color: #fff;">
  <div class="container text-center">
    <h1 class="mb-3 animate__animated animate__fadeInDown">Contact Us</h1>
    <p class="lead animate__animated animate__fadeInUp">
      Do you have a specific need or inquiry? Feel free to contact our Systems Infrastructure team.
    </p>
    <div class="mt-3">
      <span class="badge bg-accent-orange px-4 py-2 fs-6">
        Need urgent help? Call <strong>0723 639338</strong>
      </span>
    </div>
  </div>
</section>

{{-- Contact Form & Info --}}
<section class="py-5 bg-light">
  <div class="container">
    <div class="row g-5">
      {{-- Contact Form --}}
      <div class="col-lg-7" data-aos="fade-right">
        <h2 class="mb-4 text-primary">Send Us a Message</h2>

        {{-- Flash validation errors --}}
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST" class="bg-white p-4 rounded shadow-sm">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
            <input type="text" name="name" id="name" class="form-control"
                   value="{{ old('name') }}" placeholder="Your full name" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
            <input type="email" name="email" id="email" class="form-control"
                   value="{{ old('email') }}" placeholder="you@example.com" required>
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="tel" name="phone" id="phone" class="form-control"
                   value="{{ old('phone') }}" placeholder="0723 639338">
          </div>
          <div class="mb-3">
            <label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
            <input type="text" name="subject" id="subject" class="form-control"
                   value="{{ old('subject') }}" placeholder="Brief subject" required>
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
            <textarea name="message" id="message" rows="4" class="form-control"
                      placeholder="Tell us about your project or inquiry..." required>{{ old('message') }}</textarea>
          </div>
          <button type="submit" class="btn bg-accent-orange text-white">
            <i data-lucide="send" class="me-2 w-4 h-4"></i>Send Message
          </button>
        </form>
      </div>

      {{-- Contact Info --}}
      <div class="col-lg-5" data-aos="fade-left">
        <h2 class="mb-4 text-primary">Contact Information</h2>
        <div class="bg-white p-4 rounded shadow-sm mb-4">
          <p class="mb-2"><i data-lucide="phone" class="text-success me-2 w-5 h-5"></i> <strong>Phone:</strong> 0723 639338</p>
          <p class="mb-2"><i data-lucide="mail" class="text-success me-2 w-5 h-5"></i> <strong>Email:</strong> netvoicesystems@gmail.com</p>
          <p class="mb-2"><i data-lucide="map-pin" class="text-success me-2 w-5 h-5"></i> <strong>Address:</strong> P.O Box 7067-00300, Ronald Ngara, Nairobi</p>
          <p class="mb-0"><i data-lucide="clock" class="text-success me-2 w-5 h-5"></i> <strong>Working Hours:</strong> Mon - Fri: 9:00 AM - 6:00 PM</p>
        </div>

        {{-- Google Maps Embed --}}
        <h5 class="text-primary mb-3">Find Us</h5>
        <div class="ratio ratio-16x9 rounded shadow-sm">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15955.07345752484!2d36.8172448!3d-1.2843181!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f10d3c4c7b3a7%3A0x9e2f7f3c8a3e9c3e!2sRonald%20Ngala%20Street%2C%20Nairobi!5e0!3m2!1sen!2ske!4v1700000000000"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>
    </div>
  </div>
</section>
{{-- Quick Response Section --}}
<section class="py-5 bg-primary-blue text-white text-center">
  <div class="container" data-aos="fade-up">
    <h2 class="mb-3 animate__animated animate__fadeInUp">Quick Response Time</h2>
    <p class="lead mb-4 animate__animated animate__fadeInUp">
      We respond to all inquiries within <strong>2 business hours</strong>. For urgent support, call us anytime.
    </p>
    <a href="mailto:netvoicesystems@gmail.com" class="btn bg-white text-primary fw-bold px-4 py-2 animate__animated animate__pulse">
      Email Us Directly
    </a>
  </div>
</section>

{{-- Other Ways to Reach Us --}}
<section class="py-5 bg-light">
  <div class="container text-center">
    <h2 class="mb-4 text-primary" data-aos="fade-up">Other Ways to Reach Us</h2>
    <p class="text-muted mb-5" data-aos="fade-up" data-aos-delay="100">
      Whether you prefer calling, emailing, or chatting — we’re always ready to connect.
    </p>
    <div class="row g-4 justify-content-center">
      <div class="col-md-3" data-aos="zoom-in">
        <div class="bg-white rounded shadow-sm p-4 h-100">
          <i data-lucide="phone-call" class="w-8 h-8 text-success mb-3"></i>
          <h5 class="text-primary">Call Us</h5>
          <p class="text-muted">0723 639338</p>
        </div>
      </div>
      <div class="col-md-3" data-aos="zoom-in" data-aos-delay="100">
        <div class="bg-white rounded shadow-sm p-4 h-100">
          <i data-lucide="mail-check" class="w-8 h-8 text-success mb-3"></i>
          <h5 class="text-primary">Email Us</h5>
          <p class="text-muted">netvoicesystems@gmail.com</p>
        </div>
      </div>
      <div class="col-md-3" data-aos="zoom-in" data-aos-delay="200">
        <div class="bg-white rounded shadow-sm p-4 h-100">
          <i data-lucide="message-circle" class="w-8 h-8 text-success mb-3"></i>
          <h5 class="text-primary">WhatsApp</h5>
          <p class="text-muted">
            <a href="https://wa.me/254723639338" target="_blank" class="text-decoration-none text-muted">
              Chat with us
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Confirmation Toast --}}
@if(session('success'))
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1055;">
    <div class="toast align-items-center text-white bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body">
          {!! session('success') !!}
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </div>
  <script>
    const toastEl = document.querySelector('.toast');
    if (toastEl) {
      const toast = new bootstrap.Toast(toastEl, { delay: 5000 });
      toast.show();
    }
  </script>
@endif

@endsection
