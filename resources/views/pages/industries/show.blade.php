@extends('layouts.app')

@section('content')
<section class="py-5 bg-light">
  <div class="container">
    <h1 class="mb-4 text-primary-blue fw-bold">{{ $industry->name }}</h1>

    @if(!empty($industry->description))
      <div class="mt-3">
        {!! nl2br(e($industry->description)) !!}
      </div>
    @endif

    <div class="mt-4">
      <a href="{{ route('industries.index') }}" class="btn btn-outline-secondary">← Back to industries</a>
    </div>
  </div>
</section>
@endsection
