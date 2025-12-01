@extends('layouts.app')
@section('title', $service->name)

@section('content')

{{-- Hero --}}
<section class="py-5 text-white" style="background: linear-gradient(to right, #002366, #00C853);">
  <div class="container">
    <h1 class="fw-bold mb-2">{{ $service->hero_heading ?? $service->name }}</h1>
    <p class="lead">{{ $service->hero_subheading ?? 'Comprehensive ICT solutions for your enterprise.' }}</p>
  </div>
</section>

{{-- Detail --}}
<section class="py-5 bg-white">
  <div class="container">
    @include('pages.services.partials.detail', ['service' => $service])

    <div class="mt-4 d-flex justify-content-between">
      <a href="{{ route('services.index') }}" class="btn btn-outline-secondary">← Back to services</a>
      <a href="{{ route('contact') }}" class="btn bg-accent-orange text-white">Start your project</a>
    </div>
  </div>
</section>

@endsection
