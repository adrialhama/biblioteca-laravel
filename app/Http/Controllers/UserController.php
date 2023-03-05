<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'dni' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'age' => 'required',
            'email' => 'required',
            'rol' => 'required'
        ]);
        try {
            // Crea un nuevo usuario
            $user = new User;
            $user->name = $request->input('name');
            $user->surname = $request->input('surname');
            $user->dni = $request->input('dni');
            $user->address = $request->input('address');
            $user->phone = $request->input('phone');
            $user->age = $request->input('age');
            $user->email = $request->input('email');
            $user->rol = $request->input('rol');
            $user->save(); // Edita en la base de datos el usuario
            return redirect()->route('user.index')->with('status', 'Usuario editado correctamente'); // Una vez subido redirige al index y crea una variable de sesion status
        } catch (QueryException $exception) {
            return redirect()->route('user.index')->with('status', 'No se ha podido editar el usuario'); // Si da error mostramos el mensaje de que no se ha podido editar usuario
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Para recuperar el modelo del user por su id
        $user = User::findOrFail($id);
        return view('user.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Para recuperar el user por su id
        $user = User::findOrFail($id);
        return view('user.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'dni' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'age' => 'required',
            'email' => 'required',
            'rol' => 'required'
        ]);
        try {
            // Carga los datos del usuario
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->dni = $request->dni;
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->age = $request->age;
            $user->email = $request->email;
            $user->rol = $request->rol;
            $user->save(); // Edita en la base de datos el usuario
            return redirect()->route('user.index')->with('status', 'Usuario editado correctamente'); // Una vez subido redirige al index y crea una variable de sesion status

        } catch (QueryException $exception) {
            return redirect()->route('user.index')->with('status', 'No se ha podido editar el usuario'); // Si da error mostramos el mensaje de que no se ha podido editar usuario
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        //Cargo los datos del usuario por su id
        $myuser = User::findOrFail($id);
        $myuser->delete();
        return redirect()->route('user.index')->with('status', 'Usuario borrado correctamente');
    }
}
