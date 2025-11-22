<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('name')->paginate(20);
        return view('pages.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('pages.roles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:100','unique:roles,name'],
            'description' => ['nullable','string','max:255'],
        ]);

        $role = Role::create($data);

        return redirect()->route('roles.show', $role)->with('status', 'Role created.');
    }

    public function show(Role $role)
    {
        return view('pages.roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        return view('pages.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'name' => ['required','string','max:100', Rule::unique('roles','name')->ignore($role->id)],
            'description' => ['nullable','string','max:255'],
        ]);

        $role->update($data);

        return redirect()->route('roles.show', $role)->with('status', 'Role updated.');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('status', 'Role deleted.');
    }
}
