<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PartnerController extends Controller
{
    // Public catalog listing
    public function index()
    {
        $partners = Partner::ordered()->paginate(10);
        return view('pages.partners.index', compact('partners'));
    }

    // Public single partner view
    public function show(Partner $partner)
    {
        $partner->load('media');
        return view('pages.partners.show', compact('partner'));
    }

    // Admin-only create form
    public function create()
    {
        return view('pages.partners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:150','unique:partners,name'],
            'slug' => ['required','string','max:160','unique:partners,slug'],
            'website_url' => ['nullable','url','max:255'],
            'description' => ['nullable','string'],
            'sort_order' => ['integer','min:0'],
        ]);

        $partner = Partner::create($data);

        return redirect()->route('partners.show', $partner)->with('status', 'Partner created.');
    }

    public function edit(Partner $partner)
    {
        return view('pages.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $data = $request->validate([
            'name' => ['required','string','max:150', Rule::unique('partners','name')->ignore($partner->id)],
            'slug' => ['required','string','max:160', Rule::unique('partners','slug')->ignore($partner->id)],
            'website_url' => ['nullable','url','max:255'],
            'description' => ['nullable','string'],
            'sort_order' => ['integer','min:0'],
        ]);

        $partner->update($data);

        return redirect()->route('partners.show', $partner)->with('status', 'Partner updated.');
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect()->route('partners.index')->with('status', 'Partner deleted.');
    }
}
