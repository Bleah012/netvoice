<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    // List all media (admin dashboard)
    public function index()
    {
        $media = Media::orderBy('created_at','desc')->paginate(20);
        return view('pages.media.index', compact('media'));
    }

    // Show single media item
    public function show(Media $media)
    {
        return view('pages.media.show', compact('media'));
    }

    // Upload form
    public function create()
    {
        return view('pages.media.create');
    }

    // Store uploaded file
    public function store(Request $request)
    {
        $data = $request->validate([
            'file' => ['required','file','max:5120'], // 5MB limit
            'model_type' => ['required','string'],
            'model_id' => ['required','integer'],
            'alt_text' => ['nullable','string','max:255'],
            'sort_order' => ['nullable','integer','min:0'],
        ]);

        $path = $request->file('file')->store('uploads', 'public');

        $media = Media::create([
            'model_type' => $data['model_type'],
            'model_id' => $data['model_id'],
            'disk' => 'public',
            'path' => $path,
            'alt_text' => $data['alt_text'] ?? null,
            'sort_order' => $data['sort_order'] ?? 0,
        ]);

        return redirect()->route('media.show', $media)->with('status', 'Media uploaded.');
    }

    // Edit form
    public function edit(Media $media)
    {
        return view('pages.media.edit', compact('media'));
    }

    // Update metadata
    public function update(Request $request, Media $media)
    {
        $data = $request->validate([
            'alt_text' => ['nullable','string','max:255'],
            'sort_order' => ['nullable','integer','min:0'],
        ]);

        $media->update($data);

        return redirect()->route('media.show', $media)->with('status', 'Media updated.');
    }

    // Delete file + record
    public function destroy(Media $media)
    {
        Storage::disk($media->disk)->delete($media->path);
        $media->delete();

        return redirect()->route('media.index')->with('status', 'Media deleted.');
    }
}
