<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('name')->paginate(20);
        return view('pages.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('pages.clients.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:150','unique:clients,name'],
            'slug' => ['required','string','max:160','unique:clients,slug'],
            'contact_email' => ['nullable','email','max:150'],
            'contact_phone' => ['nullable','string','max:50'],
            'notes' => ['nullable','string'],
        ]);

        $client = Client::create($data);

        return redirect()->route('clients.show', $client)->with('status', 'Client created.');
    }

    public function show(Client $client)
    {
        $client->load('projects','media');
        return view('pages.clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('pages.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            'name' => ['required','string','max:150', Rule::unique('clients','name')->ignore($client->id)],
            'slug' => ['required','string','max:160', Rule::unique('clients','slug')->ignore($client->id)],
            'contact_email' => ['nullable','email','max:150'],
            'contact_phone' => ['nullable','string','max:50'],
            'notes' => ['nullable','string'],
        ]);

        $client->update($data);

        return redirect()->route('clients.show', $client)->with('status', 'Client updated.');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('status', 'Client deleted.');
    }
}
