<?php

namespace App\Http\Controllers;

use App\Models\Libros;
use App\Models\User;
use App\Models\Prestamos;
use Illuminate\Database\QueryException;
//use App\Http\Requests\StorePrestamosRequest;
//use App\Http\Requests\UpdatePrestamosRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrestamosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestamos = Prestamos::all();
        return view('prestamo.index')->with('prestamos', $prestamos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prestamo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Prestamos::create([
                'id_user' => Auth::user()->id,
                'id_libro' => $request->id,
                'fecha_prestamo' => date('Y/m/d H:i:s'),
                'fecha_vencimiento' => date('Y/m/d H:i:s', strtotime("+2 weeks")),
                'fecha_devolucion' => null,
            ]);

            return redirect()->route('prestamo.index');
        } catch (QueryException $exception) {
            return redirect()->route('libro.index')->with('status', "No se ha podido crear el préstamo: " . $exception->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Obtener el préstamo correspondiente al id
        $prestamo = Prestamos::findOrFail($id);

        // Obtener el usuario que ha realizado el préstamo
        $usuario = User::findOrFail($prestamo->id_user);

        // Obtener el libro que se ha prestado
        $libro = Libros::findOrFail($prestamo->id_libro);

        // Devuelvo la vista de detalles del préstamo
        return view('prestamo.show', compact('prestamo', 'usuario', 'libro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Obtener el préstamo correspondiente al id
        $prestamo = Prestamos::findOrFail($id);

        // Obtener la lista de libros disponibles para prestar
        $librosDisponibles = Libros::whereDoesntHave('prestamos', function ($query) use ($prestamo) {
            $query->where('id', '<>', $prestamo->id)->whereNull('fecha_devolucion');
        })->get();

        // Devuelvo la vista de edición del préstamo
        return view('prestamo.edit', compact('prestamo', 'librosDisponibles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $prestamo = Prestamos::findOrFail($id);

            // Actualizar la fecha de devolución del préstamo
            $prestamo->fecha_devolucion = date('Y/m/d H:i:s');

            $prestamo->save();

            return redirect()->route('prestamo.index')->with('status', 'El préstamo ha sido actualizado con éxito');
        } catch (QueryException $exception) {
            return redirect()->route('prestamo.index')->with('status', 'Ha ocurrido un error al actualizar el préstamo');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Cargo los datos del libro por su id
        $myloan = Prestamos::findOrFail($id);
        $myloan->delete();
        return redirect()->route('prestamo.index')->with('status', 'Prestamo borrado correctamente');
    }
}
