<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    // Store new contact message (from public form)
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:150'],
            'email' => ['required','email','max:150'],
            'phone' => ['nullable','string','max:50'],
            'subject' => ['required','string','max:255'],
            'message' => ['required','string'],
        ]);

        $data['status'] = 'new';

        $contactMessage = ContactMessage::create($data);

        return redirect()->route('contact')->with('status', 'Your message has been sent successfully.');
    }

    // Admin-only listing
    public function index()
    {
        $messages = ContactMessage::orderBy('created_at','desc')->paginate(20);
        return view('pages.contact_messages.index', compact('messages'));
    }

    // Admin-only show
    public function show(ContactMessage $contactMessage)
    {
        return view('pages.contact_messages.show', compact('contactMessage'));
    }

    // Admin-only update status
    public function update(Request $request, ContactMessage $contactMessage)
    {
        $data = $request->validate([
            'status' => ['required','in:new,reviewed,responded,archived'],
        ]);

        $contactMessage->update($data);

        return redirect()->route('contact-messages.show', $contactMessage)->with('status', 'Message status updated.');
    }

    // Admin-only delete
    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();
        return redirect()->route('contact-messages.index')->with('status', 'Message deleted.');
    }
}
