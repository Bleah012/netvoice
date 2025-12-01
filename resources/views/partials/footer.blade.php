<footer class="bg-primary-blue text-white mt-5">
  <div class="container py-5">
    <div class="row g-4">
      {{-- Company Info --}}
      <div class="col-md-4">
        <div class="d-flex align-items-center mb-2">
          <div class="rounded-3 d-flex align-items-center justify-content-center me-2"
               style="width:32px;height:32px;background-color:#ffffff33;">
            <span class="text-white fw-bold">N</span>
          </div>
          <div class="d-flex flex-column lh-1">
            <span class="fw-bold text-white">Netvoice</span>
            <span class="text-success small">Systems Engineering Ltd</span>
          </div>
        </div>
        <p class="text-white-50 mb-3">
          Reliable ICT & Solar Solutions for Kenyan Enterprises since 2013.
        </p>
        <ul class="list-unstyled text-white-50 small mb-3">
          <li><i data-lucide="map-pin" class="me-2 text-success w-4 h-4"></i>Nairobi, Kenya</li>
          <li><i data-lucide="mailbox" class="me-2 text-success w-4 h-4"></i>P.O. Box 12545-00100</li>
          <li><i data-lucide="phone" class="me-2 text-success w-4 h-4"></i><a href="tel:0723639338" class="text-white-50 text-decoration-none">0723 639338</a></li>
          <li><i data-lucide="mail" class="me-2 text-success w-4 h-4"></i><a href="mailto:info@netvoicesystems.co.ke" class="text-white-50 text-decoration-none">info@netvoicesystems.co.ke</a></li>
        </ul>
        <div class="d-flex gap-3" role="navigation" aria-label="Social media links">
          <a href="https://facebook.com/netvoicesystems" class="text-white-50 social-link" aria-label="Facebook"><i data-lucide="facebook" class="w-5 h-5"></i></a>
          <a href="https://twitter.com/netvoicesystems" class="text-white-50 social-link" aria-label="Twitter"><i data-lucide="twitter" class="w-5 h-5"></i></a>
          <a href="https://instagram.com/netvoicesystems" class="text-white-50 social-link" aria-label="Instagram"><i data-lucide="instagram" class="w-5 h-5"></i></a>
          <a href="https://linkedin.com/company/netvoicesystems" class="text-white-50 social-link" aria-label="LinkedIn"><i data-lucide="linkedin" class="w-5 h-5"></i></a>
        </div>
      </div>

      {{-- Quick Links --}}
      <div class="col-md-2" role="navigation" aria-label="Quick links">
        <h6 class="fw-bold text-white">Quick Links</h6>
        <ul class="list-unstyled">
          <li><a class="text-decoration-none text-white-50 link-hover" href="{{ route('home') }}">Home</a></li>
          <li><a class="text-decoration-none text-white-50 link-hover" href="{{ route('about') }}">About Us</a></li>
          <li><a class="text-decoration-none text-white-50 link-hover" href="{{ route('services.index') }}">Services</a></li>
          <li><a class="text-decoration-none text-white-50 link-hover" href="{{ route('projects.index') }}">Projects</a></li>
          <li><a class="text-decoration-none text-white-50 link-hover" href="{{ route('contact') }}">Contact</a></li>
        </ul>
      </div>

      {{-- Our Services --}}
      <div class="col-md-3" role="navigation" aria-label="Our services">
        <h6 class="fw-bold text-white">Our Services</h6>
        <ul class="list-unstyled">
          <li><a class="text-decoration-none text-white-50 link-hover" href="{{ route('services.index') }}">Structured Cabling</a></li>
          <li><a class="text-decoration-none text-white-50 link-hover" href="{{ route('services.index') }}">Network Integration</a></li>
          <li><a class="text-decoration-none text-white-50 link-hover" href="{{ route('services.index') }}">Solar Installations</a></li>
          <li><a class="text-decoration-none text-white-50 link-hover" href="{{ route('services.index') }}">Surveillance Systems</a></li>
          <li><a class="text-decoration-none text-white-50 link-hover" href="{{ route('services.index') }}">Voice & Telephone Systems</a></li>
          <li><a class="text-decoration-none text-white-50 link-hover" href="{{ route('services.index') }}">IT Maintenance</a></li>
        </ul>
      </div>

      {{-- Account --}}
      <div class="col-md-3" role="navigation" aria-label="Account links">
        <h6 class="fw-bold text-white">Account</h6>
        <ul class="list-unstyled">
          @guest
            @if (Route::has('login'))
              <li><a class="text-decoration-none text-white-50 link-hover" href="{{ route('login') }}">Login</a></li>
            @endif
            @if (Route::has('register'))
              <li><a class="text-decoration-none text-white-50 link-hover" href="{{ route('register') }}">Register</a></li>
            @endif
          @else
            <li><a class="text-decoration-none text-white-50 link-hover" href="{{ route('dashboard') }}">Dashboard</a></li>
            <li>
              <a class="text-decoration-none text-white-50 link-hover" href="{{ route('logout') }}"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
          @endguest
        </ul>
      </div>
    </div>
  </div>

  {{-- Bottom Bar --}}
  <div class="border-top border-white text-white py-2">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
      <small>&copy; {{ date('Y') }} Netvoice Systems. All rights reserved.</small>
      <small>Certified Partner Cisco, Siemon, Hikvision</small>
    </div>
  </div>
</footer>

{{-- Hover Effects --}}
<style>
  .social-link i {
    transition: color 0.3s ease;
  }
  .social-link:hover i[data-lucide="facebook"] { color: #1877F2; }
  .social-link:hover i[data-lucide="twitter"] { color: #1DA1F2; }
  .social-link:hover i[data-lucide="instagram"] { color: #E4405F; }
  .social-link:hover i[data-lucide="linkedin"] { color: #0A66C2; }

  .link-hover {
    transition: color 0.3s ease, text-decoration 0.3s ease;
  }
  .link-hover:hover {
    color: #ffffff;
    text-decoration: underline;
  }
</style>
