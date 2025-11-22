<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PlanController extends Controller
{
    // Public catalog listing
    public function index()
    {
        $plans = Plan::active()->ordered()->paginate(10);
        return view('pages.plans.index', compact('plans'));
    }

    // Public single plan view
    public function show(Plan $plan)
    {
        return view('pages.plans.show', compact('plan'));
    }

    // Admin-only create form
    public function create()
    {
        return view('pages.plans.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:150','unique:plans,name'],
            'slug' => ['required','string','max:160','unique:plans,slug'],
            'description' => ['nullable','string'],
            'price_cents' => ['required','integer','min:0'],
            'billing_period' => ['required','in:monthly,yearly'],
            'is_active' => ['boolean'],
            'sort_order' => ['integer','min:0'],
        ]);

        $plan = Plan::create($data);

        return redirect()->route('plans.show', $plan)->with('status', 'Plan created.');
    }

    public function edit(Plan $plan)
    {
        return view('pages.plans.edit', compact('plan'));
    }

    public function update(Request $request, Plan $plan)
    {
        $data = $request->validate([
            'name' => ['required','string','max:150', Rule::unique('plans','name')->ignore($plan->id)],
            'slug' => ['required','string','max:160', Rule::unique('plans','slug')->ignore($plan->id)],
            'description' => ['nullable','string'],
            'price_cents' => ['required','integer','min:0'],
            'billing_period' => ['required','in:monthly,yearly'],
            'is_active' => ['boolean'],
            'sort_order' => ['integer','min:0'],
        ]);

        $plan->update($data);

        return redirect()->route('plans.show', $plan)->with('status', 'Plan updated.');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect()->route('plans.index')->with('status', 'Plan deleted.');
    }
}
