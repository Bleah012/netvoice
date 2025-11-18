<footer class="bg-white border-top mt-5">
  <div class="container py-4">
    <div class="row g-4">
      <div class="col-md-6">
        <div class="d-flex align-items-center mb-2">
          <div class="rounded-3 d-flex align-items-center justify-content-center me-2" style="width:32px;height:32px;background-color:var(--primary-blue);">
            <span class="text-white fw-bold">N</span>
          </div>
          <div class="d-flex flex-column lh-1">
            <span class="fw-bold text-primary-blue">Netvoice Systems</span>
            <span class="text-accent-orange small">Engineering Ltd.</span>
          </div>
        </div>
        <p class="text-muted mb-0">Reliable ICT solutions across Africa. We design, build, and support networks, security, and enterprise systems.</p>
      </div>

      <div class="col-md-3">
        <h6 class="fw-bold">Company</h6>
        <ul class="list-unstyled">
          <li><a class="text-decoration-none text-muted" href="{{ route('about') }}">About Us</a></li>
          <li><a class="text-decoration-none text-muted" href="{{ route('partners') }}">Partners</a></li>
          <li><a class="text-decoration-none text-muted" href="{{ route('contact') }}">Contact</a></li>
        </ul>
      </div>

      <div class="col-md-3">
        <h6 class="fw-bold">Services</h6>
        <ul class="list-unstyled">
          <li><a class="text-decoration-none text-muted" href="{{ route('services') }}">ICT Services</a></li>
          <li><a class="text-decoration-none text-muted" href="{{ route('solutions') }}">Solutions</a></li>
          <li><a class="text-decoration-none text-muted" href="{{ route('support') }}">Support</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="bg-primary-blue text-white py-2">
    <div class="container d-flex justify-content-between">
      <small>&copy; {{ date('Y') }} Netvoice Systems Engineering Ltd.</small>
      <small>Built with Laravel & Bootstrap</small>
    </div>
  </div>
</footer>
