<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Database\Seeders\RoleUserSeeder;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')->get();
        return (view('users.index', compact('users')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::orderBy('name')->get();
        return (view('users.create', compact('roles')));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users|max:100',
            'email' => 'required|unique:users|max:100',
            'password' => 'required|unique:users|max:100',
        ]);

        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = $request->password;
        $newUser->save();

        $newUser->roles()->sync($request->roles);

        return redirect(route('users.index'))->with('status','New Admin User Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::orderBy('name')->get();
        return (view('users.edit', compact(['user','roles'])));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|max:100',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        // UPDATING ROLES
        $roles = $request->input('roles', []); // Get the roles from the request, default to an empty array if not provided
        $user->roles()->sync($roles); // Sync the roles in the pivot table

        // redirect to the list of admin users
        return redirect(route('users.index'))->with('status','Admin User Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        // redirect to the list of admin users
        return redirect(route('users.index'))->with('status','Admin User Deleted');
    }
}
