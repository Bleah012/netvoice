<nav class="navbar navbar-expand-md bg-white shadow-sm sticky-top">
  <div class="container">
    {{-- Logo --}}
    <a href="{{ route('home') }}" class="d-flex align-items-center text-decoration-none">
      <div class="d-flex align-items-center me-3">
        <div class="rounded-3 d-flex align-items-center justify-content-center" style="width:40px;height:40px;background-color:var(--primary-blue);">
          <span class="text-white fw-bold fs-5">N</span>
        </div>
      </div>
      <div class="d-flex flex-column lh-1">
        <span class="fw-bold text-primary-blue">Netvoice Systems</span>
        <span class="text-accent-orange small">Engineering Ltd.</span>
      </div>
    </a>

    {{-- Mobile toggle --}}
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nvNavbar" aria-controls="nvNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    {{-- Links --}}
    <div class="collapse navbar-collapse" id="nvNavbar">
      <ul class="navbar-nav ms-auto align-items-md-center">
        <li class="nav-item">
          <a class="nav-link text-dark" href="{{ route('home') }}">Home</a>
        </li>

        {{-- Company dropdown --}}
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark" href="#" id="companyDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Company
          </a>
          <ul class="dropdown-menu" aria-labelledby="companyDropdown">
            <li><a class="dropdown-item" href="{{ route('about') }}">About Us</a></li>
            <li><a class="dropdown-item" href="{{ route('partners') }}">Partners</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link text-dark" href="{{ route('services') }}">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="{{ route('solutions') }}">Solutions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="{{ route('industries') }}">Industries</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="{{ route('support') }}">Support</a>
        </li>

        {{-- CTA --}}
        <li class="nav-item ms-md-3 mt-3 mt-md-0">
          <a class="btn bg-accent-orange text-white" href="{{ route('contact') }}">
            Contact Us
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
