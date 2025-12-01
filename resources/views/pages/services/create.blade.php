@extends('layouts.app')
@section('title', 'Create Service')

@section('content')
<div class="container py-5">
  <h1 class="fw-bold text-primary-blue mb-4">Add New Service</h1>

  <form action="{{ route('services.store') }}" method="POST" class="p-4 bg-light rounded shadow-sm">
    @csrf

    {{-- Basic Info --}}
    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Service Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
      </div>
      <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Slug</label>
        <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug') }}" required>
        @error('slug') <div class="text-danger small">{{ $message }}</div> @enderror
      </div>
    </div>

    {{-- Content --}}
    <div class="mb-3">
      <label class="form-label fw-bold">Summary</label>
      <input type="text" name="summary" class="form-control" value="{{ old('summary') }}">
      @error('summary') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label fw-bold">Body</label>
      <textarea name="body" rows="4" class="form-control">{{ old('body') }}</textarea>
      @error('body') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    {{-- Hero Section --}}
    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Hero Heading</label>
        <input type="text" name="hero_heading" class="form-control" value="{{ old('hero_heading') }}">
        @error('hero_heading') <div class="text-danger small">{{ $message }}</div> @enderror
      </div>
      <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Hero Subheading</label>
        <input type="text" name="hero_subheading" class="form-control" value="{{ old('hero_subheading') }}">
        @error('hero_subheading') <div class="text-danger small">{{ $message }}</div> @enderror
      </div>
    </div>
        {{-- Features --}}
    <div class="mb-3" id="features-wrapper">
      <label class="form-label fw-bold d-flex justify-content-between">
        <span>Features</span>
        <button type="button" class="btn btn-sm btn-outline-primary" id="add-feature">Add Feature</button>
      </label>
      @php $oldFeatures = old('features', []); @endphp
      @forelse($oldFeatures as $feature)
        <div class="input-group mb-2">
          <input type="text" name="features[]" class="form-control" value="{{ $feature }}">
          <button type="button" class="btn btn-outline-danger remove-row">Remove</button>
        </div>
      @empty
        <div class="input-group mb-2">
          <input type="text" name="features[]" class="form-control" placeholder="e.g., HD & IP cameras">
          <button type="button" class="btn btn-outline-danger remove-row">Remove</button>
        </div>
      @endforelse
      @error('features.*') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    {{-- Process Steps --}}
    <div class="mb-3" id="steps-wrapper">
      <label class="form-label fw-bold d-flex justify-content-between">
        <span>Process Steps</span>
        <button type="button" class="btn btn-sm btn-outline-primary" id="add-step">Add Step</button>
      </label>
      @php $oldSteps = old('process_steps', []); @endphp
      @forelse($oldSteps as $step)
        <div class="input-group mb-2">
          <input type="text" name="process_steps[]" class="form-control" value="{{ $step }}">
          <button type="button" class="btn btn-outline-danger remove-row">Remove</button>
        </div>
      @empty
        <div class="input-group mb-2">
          <input type="text" name="process_steps[]" class="form-control" placeholder="e.g., Site Survey & Design">
          <button type="button" class="btn btn-outline-danger remove-row">Remove</button>
        </div>
      @endforelse
      @error('process_steps.*') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    {{-- Partners --}}
    <div class="mb-3" id="partners-wrapper">
      <label class="form-label fw-bold d-flex justify-content-between">
        <span>Partners & Vendors</span>
        <button type="button" class="btn btn-sm btn-outline-primary" id="add-partner">Add Partner</button>
      </label>
      @php $oldPartners = old('partners', []); @endphp
      @forelse($oldPartners as $partner)
        <div class="input-group mb-2">
          <input type="text" name="partners[]" class="form-control" value="{{ $partner }}">
          <button type="button" class="btn btn-outline-danger remove-row">Remove</button>
        </div>
      @empty
        <div class="input-group mb-2">
          <input type="text" name="partners[]" class="form-control" placeholder="e.g., Cisco">
          <button type="button" class="btn btn-outline-danger remove-row">Remove</button>
        </div>
      @endforelse
      @error('partners.*') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    {{-- Status & Order --}}
    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Active</label>
        <select name="is_active" class="form-select">
          <option value="1" @selected(old('is_active', 1) == 1)>Yes</option>
          <option value="0" @selected(old('is_active') === 0)>No</option>
        </select>
      </div>
      <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Sort Order</label>
        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}" min="0">
      </div>
    </div>

    {{-- Actions --}}
    <div class="d-flex justify-content-end gap-2">
      <button type="submit" class="btn bg-accent-orange text-white">Create Service</button>
      <a href="{{ route('services.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </div>
  </form>
</div>

{{-- Dynamic Row Management --}}
<script>
document.addEventListener('DOMContentLoaded', () => {
  const addRow = (wrapperId, name, placeholder) => {
    const el = document.createElement('div');
    el.className = 'input-group mb-2';
    el.innerHTML = `<input type="text" name="${name}[]" class="form-control" placeholder="${placeholder}">
                    <button type="button" class="btn btn-outline-danger remove-row">Remove</button>`;
    document.getElementById(wrapperId).appendChild(el);
  };

  document.getElementById('add-feature').addEventListener('click', () => addRow('features-wrapper', 'features', 'e.g., HD & IP cameras'));
  document.getElementById('add-step').addEventListener('click', () => addRow('steps-wrapper', 'process_steps', 'e.g., Site Survey & Design'));
  document.getElementById('add-partner').addEventListener('click', () => addRow('partners-wrapper', 'partners', 'e.g., Cisco'));

  document.body.addEventListener('click', (e) => {
    if (e.target.classList.contains('remove-row')) {
      e.target.parentElement.remove();
    }
  });

  // Slug auto-sync from name
  const nameInput = document.querySelector('input[name="name"]');
  const slugInput = document.getElementById('slug');
  if (nameInput && slugInput) {
    nameInput.addEventListener('input', () => {
      const slug = nameInput.value.toLowerCase().trim()
        .replace(/\s+/g, '-')
        .replace(/[^a-z0-9\-]/g, '')
        .replace(/\-+/g, '-');
      slugInput.value = slug;
    });
  }
});
</script>
@endsection
