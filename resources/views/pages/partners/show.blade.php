@extends('layouts.app')

@section('content')
<section class="py-5 bg-light">
  <div class="container">
    {{-- Partner Name --}}
    <h1 class="mb-4 text-primary-blue fw-bold">{{ $partner->name }}</h1>

    {{-- Description --}}
    @if(!empty($partner->description))
      <p class="text-muted fs-5">{{ $partner->description }}</p>
    @endif

    {{-- Website CTA --}}
    @if(!empty($partner->website_url))
      <p>
        <a href="{{ $partner->website_url }}" target="_blank" rel="noopener" class="btn bg-accent-orange text-white">
          Visit Website
        </a>
      </p>
    @endif

    {{-- Media Gallery --}}
    @if($partner->media && $partner->media->count())
      <div class="row mt-4">
        @foreach($partner->media as $media)
          <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
              <img src="{{ asset('storage/'.$media->path) }}" class="card-img-top" alt="{{ $partner->name }}">
              @if(!empty($media->caption))
                <div class="card-body">
                  <p class="card-text text-muted small">{{ $media->caption }}</p>
                </div>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    @endif

    {{-- Back link --}}
    <div class="mt-4">
      <a href="{{ route('partners.index') }}" class="btn btn-outline-secondary">
        ← Back to Partners
      </a>
    </div>
  </div>
</section>
@endsection
