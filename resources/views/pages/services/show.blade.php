@extends('layouts.app')

@section('content')
<section class="py-5 bg-light">
  <div class="container">
    <h1 class="mb-4 text-primary-blue fw-bold">{{ $service->name }}</h1>

    @if(!empty($service->summary))
      <p class="text-muted fs-5">{{ $service->summary }}</p>
    @endif

    @if(!empty($service->body))
      <div class="mt-3">
        {!! nl2br(e($service->body)) !!}
      </div>
    @endif

    <div class="mt-4">
      <a href="{{ route('services.index') }}" class="btn btn-outline-secondary">← Back to services</a>
    </div>
  </div>
</section>
@endsection
