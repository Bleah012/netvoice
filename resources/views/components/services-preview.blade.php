@props(['services'])

<section class="py-5 bg-white">
  <div class="container">
    {{-- Intro --}}
    <div class="text-center mb-4">
      <h2 class="text-primary-blue mb-3">Our Services</h2>
      <p class="text-muted mx-auto" style="max-width: 720px;">
        Comprehensive ICT and solar solutions tailored to meet the unique needs of Kenyan enterprises.
      </p>
    </div>

    {{-- Grid --}}
    <div class="row g-4">
      @foreach($services as $service)
        @php
          // Map icons + colors based on service name
          $name = strtolower($service->name);
          $icon = 'settings'; // default Lucide icon
          $color = '#002366'; // default brand blue

          if (str_contains($name, 'structured')) { $icon = 'cable'; $color = '#002366'; }
          elseif (str_contains($name, 'network')) { $icon = 'network'; $color = '#00C853'; }
          elseif (str_contains($name, 'solar')) { $icon = 'sun'; $color = '#FF6D00'; }
          elseif (str_contains($name, 'surveillance') || str_contains($name, 'video')) { $icon = 'camera'; $color = '#002366'; }
          elseif (str_contains($name, 'voice') || str_contains($name, 'telephone')) { $icon = 'phone'; $color = '#00C853'; }
          elseif (str_contains($name, 'hardware') || str_contains($name, 'software')) { $icon = 'wrench'; $color = '#FF6D00'; }

          $bgSoft = $color . '26'; // soft overlay background
        @endphp

        <div class="col-12 col-md-6 col-lg-3">
          <div class="card h-100 shadow-sm">
            <div class="card-body p-4">
              {{-- Icon --}}
              <div class="rounded d-flex align-items-center justify-content-center mb-3"
                   style="width:64px; height:64px; background-color: {{ $bgSoft }};">
                <i data-lucide="{{ $icon }}" class="w-8 h-8" style="color: {{ $color }};"></i>
              </div>

              {{-- Title + Summary --}}
              <h5 class="text-primary-blue mb-2">{{ $service->name }}</h5>
              <p class="text-muted mb-3">{{ $service->summary }}</p>

              {{-- Learn More --}}
              <a href="{{ route('services.show', $service->slug) }}"
                 class="text-success fw-semibold text-decoration-none">
                Learn More <i data-lucide="arrow-right" class="ms-1 w-4 h-4"></i>
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    {{-- View All CTA --}}
    <div class="text-center mt-4">
      <a href="{{ route('services.index') }}" class="btn btn-outline-primary">
        View All Services <i data-lucide="arrow-right" class="ms-1 w-5 h-5"></i>
      </a>
    </div>
  </div>
</section>
