<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    /**
     * Display a tabbed listing of active services.
     */
    public function index(Request $request)
    {
        // Canonical service order from Figma
        $orderedSlugs = [
            'structured-cabling',
            'network-integration',
            'voice-telephone-systems',
            'digital-video-surveillance',
            'solar-electrical',
            'hardware-software',
        ];

        // Icon mapping per service
        $iconMap = [
            'structured-cabling'         => 'server',
            'network-integration'        => 'network',
            'voice-telephone-systems'    => 'phone',
            'digital-video-surveillance' => 'camera',
            'solar-electrical'           => 'sun',
            'hardware-software'          => 'settings',
        ];

        // Fetch all active services and sort them explicitly
        $services = Service::active()->get()->sortBy(function ($service) use ($orderedSlugs) {
            return array_search($service->slug, $orderedSlugs);
        });

        // Determine active tab
        $activeSlug = $request->query('tab', $services->first()?->slug);
        $activeService = $services->firstWhere('slug', $activeSlug);

        return view('pages.services', compact('services', 'activeSlug', 'activeService', 'iconMap'));
    }

    /**
     * Display a single service by slug.
     */
    public function show(Service $service)
    {
        return view('pages.services.show', compact('service'));
    }

    /**
     * Show the form for creating a new service.
     */
    public function create()
    {
        return view('pages.services.create');
    }

    /**
     * Store a newly created service in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validateService($request);

        // Encode arrays as JSON
        $data['features'] = json_encode($data['features'] ?? []);
        $data['process_steps'] = json_encode($data['process_steps'] ?? []);
        $data['partners'] = json_encode($data['partners'] ?? []);

        $service = Service::create($data);

        return redirect()
            ->route('services.show', $service->slug)
            ->with('status', 'Service created successfully.');
    }

    /**
     * Show the form for editing the specified service.
     */
    public function edit(Service $service)
    {
        return view('pages.services.edit', compact('service'));
    }

    /**
     * Update the specified service in storage.
     */
    public function update(Request $request, Service $service)
    {
        $data = $this->validateService($request, $service->id);

        // Encode arrays as JSON
        $data['features'] = json_encode($data['features'] ?? []);
        $data['process_steps'] = json_encode($data['process_steps'] ?? []);
        $data['partners'] = json_encode($data['partners'] ?? []);

        $service->update($data);

        return redirect()
            ->route('services.show', $service->slug)
            ->with('status', 'Service updated successfully.');
    }

    /**
     * Remove the specified service from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()
            ->route('services.index')
            ->with('status', 'Service deleted successfully.');
    }

    /**
     * Validation rules for creating/updating a service.
     */
    private function validateService(Request $request, $ignoreId = null)
    {
        return $request->validate([
            'name'             => ['required', 'string', 'max:150', Rule::unique('services', 'name')->ignore($ignoreId)],
            'slug'             => ['required', 'string', 'max:160', Rule::unique('services', 'slug')->ignore($ignoreId)],
            'summary'          => ['nullable', 'string', 'max:255'],
            'body'             => ['nullable', 'string'],
            'hero_heading'     => ['nullable', 'string', 'max:255'],
            'hero_subheading'  => ['nullable', 'string', 'max:255'],
            'features'         => ['nullable', 'array'],
            'features.*'       => ['string', 'max:255'],
            'process_steps'    => ['nullable', 'array'],
            'process_steps.*'  => ['string', 'max:255'],
            'partners'         => ['nullable', 'array'],
            'partners.*'       => ['string', 'max:100'],
            'is_active'        => ['boolean'],
            'sort_order'       => ['integer', 'min:0'],
        ]);
    }
}
