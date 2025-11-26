<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Ticket;
use App\Models\Project;
use App\Models\Client;
use App\Models\ContactMessage; // <-- add this

class DashboardController extends Controller
{
    public function index()
    {
        $activeServicesCount = method_exists(Service::query()->getModel(), 'scopeActive')
            ? Service::active()->count()
            : Service::where('is_active', true)->count();

        $openTicketsCount = method_exists(Ticket::query()->getModel(), 'scopeOpen')
            ? Ticket::open()->count()
            : Ticket::where('status', 'open')->count();

        $invoicesCount = 5; // placeholder until Invoice model exists

        // Notifications from Contact Us
        $notificationsCount = ContactMessage::count();
        $notifications = ContactMessage::latest()->take(10)->get();

        $recentProjects = Project::with('client')
            ->latest()
            ->take(5)
            ->get()
            ->map(fn ($p) => [
                'date'   => $p->created_at,
                'type'   => 'Project',
                'label'  => $p->name,
                'status' => $p->status,
                'view'   => route('projects.show', $p),
                'edit'   => route('projects.edit', $p),
            ]);

        $recentTickets = Ticket::latest()
            ->take(5)
            ->get()
            ->map(fn ($t) => [
                'date'   => $t->created_at,
                'type'   => 'Ticket',
                'label'  => $t->subject ?? "Ticket #{$t->id}",
                'status' => $t->status,
                'view'   => route('tickets.show', $t),
                'edit'   => route('tickets.edit', $t),
            ]);

        $activities = collect()
            ->merge($recentProjects)
            ->merge($recentTickets)
            ->sortByDesc('date')
            ->take(10)
            ->values();

        return view('pages.dashboard', compact(
            'activeServicesCount',
            'openTicketsCount',
            'invoicesCount',
            'notificationsCount',
            'activities',
            'notifications' // <-- now passed to Blade
        ));
    }
}
