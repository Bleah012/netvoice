@extends('layouts.app')

@section('content')
<section class="py-5 bg-light">
  <div class="container">
    <h1 class="mb-4 text-primary-blue fw-bold">{{ $solution->name }}</h1>

    @if(!empty($solution->summary))
      <p class="text-muted fs-5">{{ $solution->summary }}</p>
    @endif

    @if(!empty($solution->body))
      <div class="mt-3">
        {!! nl2br(e($solution->body)) !!}
      </div>
    @endif

    <div class="mt-4">
      <a href="{{ route('solutions.index') }}" class="btn btn-outline-secondary">← Back to solutions</a>
    </div>
  </div>
</section>
@endsection
