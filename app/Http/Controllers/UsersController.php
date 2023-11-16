<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role;

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
        return view('backend2.pages.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roles = Role::pluck('name','name')->all();
        return view('backend2.pages.users.create',compact('roles'));

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

        $user->assignRole($request->input('roles'));

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

        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
    
        return view('backend2.pages.users.edit',compact('user','roles','userRole'));

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

        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
        
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