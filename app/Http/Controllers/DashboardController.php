<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Ticket;
use App\Models\Project;
use App\Models\Client;
use App\Models\ContactMessage;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // KPI cards (top row)
        $totalProjects      = Project::count();
        $activeTicketsCount = Ticket::whereIn('status', ['open', 'in_progress'])->count();
        $newClientsCount    = Client::where('created_at', '>=', now()->startOfMonth())->count();
        $monthlyRevenue     = 0; // placeholder, invoices ignored

        // Summary cards
        $activeServicesCount = method_exists(Service::query()->getModel(), 'scopeActive')
            ? Service::active()->count()
            : Service::where('is_active', true)->count();

        $openTicketsCount = method_exists(Ticket::query()->getModel(), 'scopeOpen')
            ? Ticket::open()->count()
            : Ticket::where('status', 'open')->count();

        $notificationsCount = ContactMessage::count();
        $notifications = ContactMessage::latest()->take(10)->get();

        // Panels
        $projectsRecent = Project::with('client')
            ->latest()->take(4)
            ->get(['id', 'name', 'status', 'client_id']);

        $ticketsActive = Ticket::whereIn('status', ['open', 'in_progress'])
            ->latest()->take(5)
            ->get(['id', 'subject', 'priority', 'status', 'client_id', 'created_at']);

        $services = Service::query()
            ->when(method_exists(Service::query()->getModel(), 'scopeOrdered'), fn ($q) => $q->ordered())
            ->orderBy('sort_order')
            ->get(['id', 'name', 'summary', 'is_active', 'slug']);

        // ✅ Only select existing columns from users table
        $usersRecent = class_exists(User::class)
            ? User::latest()->take(3)->get(['id', 'name', 'email', 'created_at'])
            : collect();

        // Activity feed
        $recentProjects = Project::with('client')
            ->latest()->take(5)->get()
            ->map(fn ($p) => [
                'date'   => $p->created_at,
                'type'   => 'Project',
                'label'  => $p->name,
                'status' => $p->status,
                'view'   => route('projects.show', $p),
                'edit'   => route('projects.edit', $p),
            ]);

        $recentTickets = Ticket::latest()->take(5)->get()
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
            'totalProjects',
            'activeTicketsCount',
            'newClientsCount',
            'monthlyRevenue',
            'activeServicesCount',
            'openTicketsCount',
            'notificationsCount',
            'projectsRecent',
            'ticketsActive',
            'services',
            'usersRecent',
            'activities',
            'notifications'
        ));
    }
}
