<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContactMessageController extends Controller
{
    /**
     * Store new contact message (from public form)
     */
    public function store(Request $request)
{
    $data = $request->validate([
        'name'    => ['required','string','max:150'],
        'email'   => ['required','email','max:150'],
        'phone'   => ['nullable','string','max:50'],
        'subject' => ['required','string','max:255'],
        'message' => ['required','string'],
    ]);

    // Default status for new messages
    $data['status'] = 'new';

    // Generate a unique slug based on subject + timestamp
    $data['slug'] = Str::slug($data['subject'] . '-' . now()->timestamp);

    // Create the message
    $contactMessage = ContactMessage::create($data);

    // Flash success message with clickable link
    return redirect()->route('contact')
                     ->with('success', 'Your message has been sent successfully. 
                        <a href="' . route('contact-messages.show', $contactMessage) . '" 
                           class="text-white text-decoration-underline">View message</a>');
}

    /**
     * Admin-only listing
     */
    public function index()
    {
        $messages = ContactMessage::latest()->paginate(20);
        return view('pages.contact_messages.index', compact('messages'));
    }

    /**
     * Admin-only show
     */
    public function show(ContactMessage $contactMessage)
    {
        return view('pages.contact_messages.show', compact('contactMessage'));
    }

    /**
     * Admin-only update status
     */
    public function update(Request $request, ContactMessage $contactMessage)
    {
        $data = $request->validate([
            'status' => ['required','in:new,reviewed,responded,archived'],
        ]);

        $contactMessage->update($data);

        return redirect()->route('contact-messages.show', $contactMessage)
                         ->with('success', 'Message status updated.');
    }

    /**
     * Admin-only delete
     */
    public function destroy(ContactMessage $contactMessage)
    {
        $contactMessage->delete();

        return redirect()->route('contact-messages.index')
                         ->with('success', 'Message deleted.');
    }
}
