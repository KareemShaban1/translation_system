<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        return view('backend.pages.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.pages.users.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
    
        $user = User::create($validatedData);

        return redirect()->route('users.index');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        return view('backend.pages.users.edit',compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

      // Define validation rules
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id, // Exclude the current user's email
        ];

    // Check if the 'password' field is included in the request and is not null
    if ($request->filled('password')) {
            $rules['password'] = 'required|min:6';
        }

        // Validate the request data
        $validatedData = $request->validate($rules);
        
        $user->update($validatedData);
        
        return redirect()->route('users.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index');

        
        
    }
}