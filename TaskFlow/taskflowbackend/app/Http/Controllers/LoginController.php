<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\UserSpecific;
use App\Models\UserLevel;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(){

        return view('auth.login');
        
    }

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

        if($user['user_level_id'] == 2){

            return view('home');

        }else{

            return response()->json(['mensaje' => 'Usuario logueado exitosamente','usuario' => $user], 200); // Código de estado 200: OK

        }

    }

}
