<nav class="navbar navbar-expand-md bg-white shadow-sm sticky-top">
  <div class="container">
    {{-- Logo --}}
    <a href="{{ route('home') }}" class="d-flex align-items-center text-decoration-none">
      <div class="d-flex align-items-center me-3">
        <div class="rounded-3 overflow-hidden d-flex align-items-center justify-content-center"
             style="width:40px;height:40px;background-color:var(--primary-blue);">
          <img src="{{ asset('images/logo.png') }}" alt="Netvoice Logo" style="width:100%; height:auto;">
        </div>
      </div>
      <div class="d-flex flex-column lh-1">
        <span class="fw-bold text-primary-blue">Netvoice</span>
        <span class="text-success small">Systems Engineering Ltd</span>
      </div>
    </a>

    {{-- Mobile toggle --}}
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#nvNavbar" aria-controls="nvNavbar" aria-expanded="false"
            aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    {{-- Navigation --}}
    <div class="collapse navbar-collapse" id="nvNavbar">
      <ul class="navbar-nav ms-auto align-items-md-center">
        {{-- Home --}}
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('home') ? 'text-warning fw-bold' : 'text-dark' }}"
             href="{{ route('home') }}">
            <i data-lucide="home" class="me-1"></i> Home
          </a>
        </li>

        {{-- About Us --}}
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('about') ? 'text-warning fw-bold' : 'text-dark' }}"
             href="{{ route('about') }}">
            <i data-lucide="info" class="me-1"></i> About Us
          </a>
        </li>

        {{-- Services --}}
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('services.index') ? 'text-success fw-bold' : 'text-dark' }}"
             href="{{ route('services.index') }}">
            <i data-lucide="cable" class="me-1"></i> Services
          </a>
        </li>

        {{-- Projects --}}
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('projects.index') ? 'text-warning fw-bold' : 'text-dark' }}"
             href="{{ route('projects.index') }}">
            <i data-lucide="layers" class="me-1"></i> Projects
          </a>
        </li>

        {{-- Support Dropdown --}}
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ request()->routeIs('support') ? 'text-warning fw-bold' : 'text-dark' }}"
             href="#" id="supportDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i data-lucide="life-buoy" class="me-1"></i> Support
          </a>
          <ul class="dropdown-menu" aria-labelledby="supportDropdown">
            <li><a class="dropdown-item" href="{{ route('support') }}">Support Overview</a></li>
            @auth
              @if(Auth::user()->isAdmin())
                <li><a class="dropdown-item" href="{{ route('tickets.index') }}">Tickets</a></li>
              @endif
            @endauth
          </ul>
        </li>

        {{-- Contact --}}
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('contact') ? 'text-warning fw-bold' : 'text-dark' }}"
             href="{{ route('contact') }}">
            <i data-lucide="mail" class="me-1"></i> Contact
          </a>
        </li>

        {{-- Admin-only Plans --}}
        @auth
          @if(Auth::user()->isAdmin())
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('plans.index') ? 'text-warning fw-bold' : 'text-dark' }}"
                 href="{{ route('plans.index') }}">
                <i data-lucide="file-text" class="me-1"></i> Plans
              </a>
            </li>
          @endif
        @endauth

        {{-- Authenticated User Dropdown --}}
        @auth
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button"
               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i data-lucide="user" class="me-1"></i> {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-end">
              @if(Auth::user()->isAdmin())
                <a class="dropdown-item" href="{{ route('dashboard') }}">
                  <i data-lucide="settings" class="me-1"></i> {{ __('Admin Dashboard') }}
                </a>
              @endif
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i data-lucide="log-out" class="me-1"></i> {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </li>
        @endauth

        {{-- Phone CTA --}}
        <li class="nav-item ms-md-4 mt-3 mt-md-0">
          <a href="tel:0723639338" class="d-flex align-items-center text-decoration-none text-dark">
            <i data-lucide="phone" class="me-2 text-success"></i>
            <span class="fw-bold">0723 639338</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
