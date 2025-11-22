<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->orderBy('name')->paginate(20);
        return view('pages.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::orderBy('name')->get();
        return view('pages.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:100'],
            'email' => ['required','email','max:150','unique:users,email'],
            'password' => ['required','string','min:8'],
            'is_admin' => ['nullable','boolean'],
            'roles' => ['nullable','array'],
            'roles.*' => ['integer','exists:roles,id'],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_admin' => (bool)($data['is_admin'] ?? false),
        ]);

        $user->roles()->sync($data['roles'] ?? []);

        return redirect()->route('users.show', $user)->with('status', 'User created.');
    }

    public function show(User $user)
    {
        $user->load('roles');
        return view('pages.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::orderBy('name')->get();
        $user->load('roles');
        return view('pages.users.edit', compact('user','roles'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required','string','max:100'],
            'email' => ['required','email','max:150', Rule::unique('users','email')->ignore($user->id)],
            'password' => ['nullable','string','min:8'],
            'is_admin' => ['nullable','boolean'],
            'roles' => ['nullable','array'],
            'roles.*' => ['integer','exists:roles,id'],
        ]);

        $user->name = $data['name'];
        $user->email = $data['email'];
        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }
        $user->is_admin = (bool)($data['is_admin'] ?? $user->is_admin);
        $user->save();

        $user->roles()->sync($data['roles'] ?? []);

        return redirect()->route('users.show', $user)->with('status', 'User updated.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('status', 'User deleted.');
    }
}
