<?php

namespace App\Http\Controllers;

use App\Models\Libros;
use App\Http\Requests\ApiLibrosRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiLibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libro = Libros::all();
        return response()->json([
            'status' => true,
            'libros' => $libro
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ApiLibrosRequest $request)
    {
        $libro = Libros::create($request->all()); // Va a crear el campo con todas las solicitudes
        return response()->json([
            'status' => true,
            'message' => 'Libro creado correctamente',
            'libro' => $libro
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ApiLibrosRequest $request, string $id)
    {
        $libro = Libros::findOrFail($id);
        $libro->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Libro editado correctamente',
            'libro' => $libro
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $libro = Libros::findOrFail($id);
        $libro->delete();
        return response()->json([
            'status' => true,
            'message' => 'Libro eliminado correctamente',
            'libro' => $libro
        ]);
    }
}
