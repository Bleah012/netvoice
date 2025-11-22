<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TicketController extends Controller
{
    // List tickets (support dashboard)
    public function index()
    {
        $tickets = Ticket::with(['user','client','assignedUser'])
            ->orderBy('created_at','desc')
            ->paginate(20);

        return view('pages.tickets.index', compact('tickets'));
    }

    // Show single ticket
    public function show(Ticket $ticket)
    {
        $ticket->load(['user','client','assignedUser']);
        return view('pages.tickets.show', compact('ticket'));
    }

    // Create form
    public function create()
    {
        $clients = Client::orderBy('name')->get();
        $users = User::orderBy('name')->get();
        return view('pages.tickets.create', compact('clients','users'));
    }

    // Store new ticket
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => ['nullable','integer','exists:users,id'],
            'client_id' => ['nullable','integer','exists:clients,id'],
            'subject' => ['required','string','max:255'],
            'description' => ['required','string'],
            'status' => ['required','in:open,in_progress,resolved,closed'],
            'priority' => ['required','in:low,normal,high,urgent'],
            'assigned_to' => ['nullable','integer','exists:users,id'],
        ]);

        $ticket = Ticket::create($data);

        return redirect()->route('tickets.show', $ticket)->with('status', 'Ticket created.');
    }

    // Edit form
    public function edit(Ticket $ticket)
    {
        $clients = Client::orderBy('name')->get();
        $users = User::orderBy('name')->get();
        return view('pages.tickets.edit', compact('ticket','clients','users'));
    }

    // Update ticket
    public function update(Request $request, Ticket $ticket)
    {
        $data = $request->validate([
            'user_id' => ['nullable','integer','exists:users,id'],
            'client_id' => ['nullable','integer','exists:clients,id'],
            'subject' => ['required','string','max:255'],
            'description' => ['required','string'],
            'status' => ['required','in:open,in_progress,resolved,closed'],
            'priority' => ['required','in:low,normal,high,urgent'],
            'assigned_to' => ['nullable','integer','exists:users,id'],
            'closed_at' => ['nullable','date'],
        ]);

        $ticket->update($data);

        return redirect()->route('tickets.show', $ticket)->with('status', 'Ticket updated.');
    }

    // Delete ticket
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')->with('status', 'Ticket deleted.');
    }
}
