<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Ticket;
// If you have these models, import them too:
// use App\Models\Invoice;
// use App\Models\Notification;

class DashboardController extends Controller
{
    public function index()
    {
        // Services: assumes scopeActive() or boolean column is_active
        $activeServicesCount = method_exists(Service::query()->getModel(), 'scopeActive')
            ? Service::active()->count()
            : Service::where('is_active', true)->count();

        // Tickets: assumes status column with 'open'/'closed' values or scopeOpen()
        $openTicketsCount = method_exists(Ticket::query()->getModel(), 'scopeOpen')
            ? Ticket::open()->count()
            : Ticket::where('status', 'open')->count();

        // For now, keep same values if models not ready
        $invoicesCount = 5;       // replace when you have an Invoice model
        $notificationsCount = 4;  // replace when you have a Notification model

        return view('pages.dashboard', compact(
            'activeServicesCount',
            'openTicketsCount',
            'invoicesCount',
            'notificationsCount'
        ));
    }
}
