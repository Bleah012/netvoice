<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    // Public catalog listing
    public function index()
    {
        $services = Service::active()->ordered()->paginate(10);
        return view('pages.services.index', compact('services'));
    }

    // Public single service view
    public function show(Service $service)
    {
        return view('pages.services.show', compact('service'));
    }

    // Admin-only create form
    public function create()
    {
        return view('pages.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:150','unique:services,name'],
            'slug' => ['required','string','max:160','unique:services,slug'],
            'summary' => ['nullable','string','max:255'],
            'body' => ['nullable','string'],
            'is_active' => ['boolean'],
            'sort_order' => ['integer','min:0'],
        ]);

        $service = Service::create($data);

        return redirect()->route('services.show', $service)->with('status', 'Service created.');
    }

    public function edit(Service $service)
    {
        return view('pages.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'name' => ['required','string','max:150', Rule::unique('services','name')->ignore($service->id)],
            'slug' => ['required','string','max:160', Rule::unique('services','slug')->ignore($service->id)],
            'summary' => ['nullable','string','max:255'],
            'body' => ['nullable','string'],
            'is_active' => ['boolean'],
            'sort_order' => ['integer','min:0'],
        ]);

        $service->update($data);

        return redirect()->route('services.show', $service)->with('status', 'Service updated.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')->with('status', 'Service deleted.');
    }
}
