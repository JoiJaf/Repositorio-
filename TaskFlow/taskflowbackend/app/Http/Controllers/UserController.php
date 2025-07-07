<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $users= User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => bcrypt($request->password)
        ]);

        return response()->json(['message' => 'Usuario creado', 'user' => $users], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $users = User::find($id);
        return view('users.edit', compact('users'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $users = User::find($id);

        $users->update([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('users.index')
            ->with('success', 'Usuario actualizado');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $users = User::find($id);
        $users->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado');
    }
}
