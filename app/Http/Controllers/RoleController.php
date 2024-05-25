<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|max:255',
            // Add more validation rules as needed
        ]);

        // Create a new role
        Role::create($validated);

        return redirect()->route('roles.index')->with('success', 'Role created successfully');
    }

    // Add other CRUD methods as needed (show, edit, update, destroy)
}
