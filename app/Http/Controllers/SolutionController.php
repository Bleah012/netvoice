<?php

namespace App\Http\Controllers;

use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SolutionController extends Controller
{
    // Public catalog listing
    public function index()
    {
        $solutions = Solution::active()->ordered()->paginate(10);
        return view('pages.solutions.index', compact('solutions'));
    }

    // Public single solution view
    public function show(Solution $solution)
    {
        return view('pages.solutions.show', compact('solution'));
    }

    // Admin-only create form
    public function create()
    {
        return view('pages.solutions.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:150','unique:solutions,name'],
            'slug' => ['required','string','max:160','unique:solutions,slug'],
            'summary' => ['nullable','string','max:255'],
            'body' => ['nullable','string'],
            'is_active' => ['boolean'],
            'sort_order' => ['integer','min:0'],
        ]);

        $solution = Solution::create($data);

        return redirect()->route('solutions.show', $solution)->with('status', 'Solution created.');
    }

    public function edit(Solution $solution)
    {
        return view('pages.solutions.edit', compact('solution'));
    }

    public function update(Request $request, Solution $solution)
    {
        $data = $request->validate([
            'name' => ['required','string','max:150', Rule::unique('solutions','name')->ignore($solution->id)],
            'slug' => ['required','string','max:160', Rule::unique('solutions','slug')->ignore($solution->id)],
            'summary' => ['nullable','string','max:255'],
            'body' => ['nullable','string'],
            'is_active' => ['boolean'],
            'sort_order' => ['integer','min:0'],
        ]);

        $solution->update($data);

        return redirect()->route('solutions.show', $solution)->with('status', 'Solution updated.');
    }

    public function destroy(Solution $solution)
    {
        $solution->delete();
        return redirect()->route('solutions.index')->with('status', 'Solution deleted.');
    }
}
