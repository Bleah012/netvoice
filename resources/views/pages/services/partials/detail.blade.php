@php
  $features = is_string($service->features) ? json_decode($service->features, true) : ($service->features ?? []);
  $steps    = is_string($service->process_steps) ? json_decode($service->process_steps, true) : ($service->process_steps ?? []);
  $partners = is_string($service->partners) ? json_decode($service->partners, true) : ($service->partners ?? []);

  // Prefer media library, fallback to public/images/services/{slug}.jpg
  $imageUrl = $service->primaryMedia()?->getUrl();
  if (!$imageUrl) {
      $imgPath = "images/services/{$service->slug}.jpg";
      if (file_exists(public_path($imgPath))) {
          $imageUrl = asset($imgPath);
      }
  }
@endphp

<div class="row g-4 align-items-start">
  {{-- Visual --}}
  <div class="col-md-5">
    @if($imageUrl)
      <img src="{{ $imageUrl }}" alt="{{ $service->name }}"
           class="img-fluid rounded shadow-sm"
           style="object-fit:cover;max-height:320px;">
    @else
      <div class="bg-light d-flex align-items-center justify-content-center rounded shadow-sm" style="height:320px;">
        <span class="text-muted">No image available</span>
      </div>
    @endif
  </div>

  {{-- Content --}}
  <div class="col-md-7">
    <h2 class="text-primary-blue fw-bold">{{ $service->name }}</h2>
    @if($service->summary)
      <p class="text-muted">{{ $service->summary }}</p>
    @endif

    {{-- Key Features --}}
    <h5 class="mt-4 fw-semibold">Key Features</h5>
    <ul class="list-unstyled text-muted">
      @forelse($features as $f)
        <li class="d-flex align-items-start mb-2">
          <i data-lucide="check-circle" class="text-success me-2" style="width:20px;height:20px;"></i>
          <span>{{ $f }}</span>
        </li>
      @empty
        <li class="text-muted">No features listed.</li>
      @endforelse
    </ul>

    {{-- Process Steps --}}
    <h5 class="mt-4 fw-semibold">Our Process</h5>
    <ol class="list-unstyled">
      @forelse($steps as $i => $step)
        <li class="d-flex align-items-start mb-2">
          <span class="badge bg-primary me-2">{{ $i + 1 }}</span>
          <span>{{ $step }}</span>
        </li>
      @empty
        <li class="text-muted">Process coming soon.</li>
      @endforelse
    </ol>

    {{-- Partners --}}
    <h5 class="mt-4 fw-semibold">Trusted Partners & Vendors</h5>
    <div class="d-flex flex-wrap gap-2">
      @forelse($partners as $p)
        <span class="badge bg-light text-dark border">{{ $p }}</span>
      @empty
        <span class="text-muted">No partners listed.</span>
      @endforelse
    </div>

    {{-- CTA --}}
    <div class="mt-4">
      <a href="{{ route('contact') }}" class="btn bg-accent-orange text-white fw-semibold">
        Request a Free Consultation
      </a>
    </div>
  </div>
</div>
