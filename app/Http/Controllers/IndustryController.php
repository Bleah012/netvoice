<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class IndustryController extends Controller
{
    // Public catalog listing
    public function index()
    {
        $industries = Industry::ordered()->paginate(10);
        return view('pages.industries.index', compact('industries'));
    }

    // Public single industry view
    public function show(Industry $industry)
    {
        return view('pages.industries.show', compact('industry'));
    }

    // Admin-only create form
    public function create()
    {
        return view('pages.industries.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:150','unique:industries,name'],
            'slug' => ['required','string','max:160','unique:industries,slug'],
            'description' => ['nullable','string'],
            'sort_order' => ['integer','min:0'],
        ]);

        $industry = Industry::create($data);

        return redirect()->route('industries.show', $industry)->with('status', 'Industry created.');
    }

    public function edit(Industry $industry)
    {
        return view('pages.industries.edit', compact('industry'));
    }

    public function update(Request $request, Industry $industry)
    {
        $data = $request->validate([
            'name' => ['required','string','max:150', Rule::unique('industries','name')->ignore($industry->id)],
            'slug' => ['required','string','max:160', Rule::unique('industries','slug')->ignore($industry->id)],
            'description' => ['nullable','string'],
            'sort_order' => ['integer','min:0'],
        ]);

        $industry->update($data);

        return redirect()->route('industries.show', $industry)->with('status', 'Industry updated.');
    }

    public function destroy(Industry $industry)
    {
        $industry->delete();
        return redirect()->route('industries.index')->with('status', 'Industry deleted.');
    }
}
