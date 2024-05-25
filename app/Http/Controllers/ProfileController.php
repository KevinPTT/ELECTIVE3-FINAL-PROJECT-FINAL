<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        return view('profiles.index', compact('profiles'));
    }

    public function create()
    {
        return view('profiles.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:profiles',
            // Add more validation rules as needed
        ]);

        // Create a new profile
        Profile::create($validated);

        return redirect()->route('profiles.index')->with('success', 'Profile created successfully');
    }

    // Add other CRUD methods as needed (show, edit, update, destroy)
}
