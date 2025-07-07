<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserSpecific;
use App\Models\UserLevel;


class UserSpecificController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function SingIn(Request $request){

        try{

            //Permite obtener datos específicos enviados por POST
            $data = $request->only(['username', 'emailAddress', 'password']);
            
            $user = new UserSpecific();
            $user->email = $data['emailAddress'];
            $user->user_name = $data['username'];
            $user->password = bcrypt($data['password']);
            $user->user_level_id = 1;
            $user->save();
    
            return response()->json(['mensaje' => 'Usuario creado exitosamente','usuario' => $user], 201); // Código de estado 201: Creado
    
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }

    public function Login(Request $request)
    
    {
        //Permite obtener datos específicos enviados por POST
        $data = $request->only(['emailAddress', 'password']);

        $user = UserSpecific::where('email', $data['emailAddress'])->first();

        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 401);
        }

        if (!\Hash::check($data['password'], $user->password)) {
            return response()->json(['error' => 'Contraseña incorrecta'], 401);
        }

        return response()->json(['mensaje' => 'Usuario logueado exitosamente','usuario' => $user], 200); // Código de estado 200: OK

    }

    public function dataUsers(){

        $users = UserSpecific::select(
            'users_specific.id',
            'users_specific.email',
            'users_specific.user_name',
            'users_specific.user_level_id'
        )->get();
        
        return $users;
    }

    public function index()
    {
        $users = UserSpecific::select(

            'users_specific.id',
            'users_specific.email',
            'users_specific.user_name',
            'users_levels.user_level_name as user_level'

        )->join('users_levels', 'users_specific.user_level_id', '=', 'users_levels.id')
        ->orderBy('users_specific.created_at', 'asc')
        ->paginate(10);

        $total = count(UserSpecific::all());

        return view('users.index', compact('users', 'total'));
    }
    
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required',
            'userLevel' => 'required'
        ]);
    
        $userData = [
            'email' => $validatedData['email'],
            'user_name' => $validatedData['username'],
            'password' => bcrypt($validatedData['password']),
            'user_level_id' => $validatedData['userLevel']
        ];
    
        $user = UserSpecific::create($userData);
    
        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    public function show(string $id){
        
        $user = UserSpecific::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit(String $id)
    {

        $user = UserSpecific::find($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {

        $user = UserSpecific::find($id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found.');
        }
        
        $validatedData = $request->validate([
            'email' => 'required|email',
            'username' => 'required',
            'userLevel' => 'required'
        ]);
    
        $userData = [
            'email' => $validatedData['email'],
            'user_name' => $validatedData['username'],
            'user_level_id' => $validatedData['userLevel']
        ];

        $user->update($userData);

        return redirect()->route('users.index', $user)->with('success', 'User updated successfully!');
    }

    public function destroy(string $id)
    {

        $user = UserSpecific::find($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }

}
