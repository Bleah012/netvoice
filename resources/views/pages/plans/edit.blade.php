@extends('layouts.app')
@section('title', 'Edit Plan')

@section('content')
<div class="container py-5">
  <h1 class="mb-4 text-primary-blue fw-bold">Edit Plan</h1>

  <form action="{{ route('plans.update', $plan->id) }}" method="POST" class="p-4 bg-light rounded shadow-sm">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label fw-bold">Name</label>
      <input type="text" name="name" class="form-control" value="{{ old('name', $plan->name) }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label fw-bold">Slug</label>
      <input type="text" name="slug" class="form-control" value="{{ old('slug', $plan->slug) }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label fw-bold">Description</label>
      <textarea name="description" rows="4" class="form-control">{{ old('description', $plan->description) }}</textarea>
    </div>

    <div class="mb-3">
      <label class="form-label fw-bold">Price (USD)</label>
      <input type="number" step="0.01" name="price_cents" class="form-control"
             value="{{ old('price_cents', $plan->price_cents / 100) }}" required>
      <small class="text-muted">Enter price in dollars; stored internally as cents.</small>
    </div>

    <div class="mb-3">
      <label class="form-label fw-bold">Billing Period</label>
      <select name="billing_period" class="form-select" required>
        <option value="monthly" {{ old('billing_period', $plan->billing_period) === 'monthly' ? 'selected' : '' }}>Monthly</option>
        <option value="yearly" {{ old('billing_period', $plan->billing_period) === 'yearly' ? 'selected' : '' }}>Yearly</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label fw-bold">Active</label>
      <input type="checkbox" name="is_active" value="1" {{ old('is_active', $plan->is_active) ? 'checked' : '' }}>
    </div>

    <div class="mb-3">
      <label class="form-label fw-bold">Sort Order</label>
      <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $plan->sort_order) }}">
    </div>

    <button type="submit" class="btn bg-accent-orange text-white">Update Plan</button>
    <a href="{{ route('plans.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
  </form>
</div>
@endsection
