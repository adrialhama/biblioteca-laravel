<?php

namespace App\Http\Controllers;

use App\Models\Libros;
use App\Models\User;
//use App\Http\Requests\StoreLibrosRequest;
//use App\Http\Requests\UpdateLibrosRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libros::all();
        // Para cargar la imagen que tenemos en public storage
        $url = 'storage/img/';
        return view('libro.index', ['libros' => $libros, 'url' => $url]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("libro.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'editorial' => 'required',
            'autor' => 'required',
            'foto' => 'required|image',
            'descripcion' => 'required'
        ]);
        try {
            $mybook = new Libros();
            $mybook->titulo = $request->titulo;
            $mybook->editorial = $request->editorial;
            $mybook->autor = $request->autor;
            $mybook->foto = $request->foto;
            $nombrefoto = time() . "-" . $request->file('foto')->getClientOriginalName(); // Guarda en la variable la foto con la fecha y el nombre original
            $mybook->foto = $nombrefoto;
            $mybook->descripcion = $request->descripcion;
            $mybook->save();
            $request->file('foto')->storeAs('public/img', $nombrefoto); // Para guardar la imagen en la ruta de storage/public/img y con el nombre de la foto
            return redirect()->route('libro.index')->with('status', 'Libro creado correctamente'); // Una vez subido redirige al index y crea una variable de sesion status
        } catch (QueryException $exception) {
            return redirect()->route('libro.index')->with('status', 'No se ha podido crear el libro'); // Si da error mostramos el mensaje de que no se ha podido crear el libro
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Para recuperar el modelo del libro por su id
        $libro = Libros::findOrFail($id);
        // Para cargar la imagen que tenemos en public storage (El de arriba)
        $url = 'storage/img/';
        return view('libro.show')->with('libro', $libro)->with('url', $url);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Para recuperar el libro por su id
        $libro = Libros::findOrFail($id);
        // Para cargar la imagen que tenemos en public storage (El de arriba)
        $url = 'storage/img/';
        return view('libro.edit')->with('libro', $libro)->with('url', $url);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'editorial' => 'required',
            'autor' => 'required',
            'foto' => 'image',
            'descripcion' => 'required'
        ]);
        try {
            // Carga los datos del libro
            $mybook = Libros::findOrFail($id);
            $mybook->titulo = $request->titulo;
            $mybook->editorial = $request->editorial;
            $mybook->autor = $request->autor;
            // Si se ha subido foto se crea
            if (is_uploaded_file($request->foto)) {
                $nombrefoto = time() . "-" . $request->file('foto')->getClientOriginalName(); // Guarda en la variable la foto con la fecha y el nombre original
                $mybook->foto = $nombrefoto;
                $request->file('foto')->storeAs('public/img', $nombrefoto); // Para guardar la imagen en la ruta de storage/public/img y con el nombre de la foto
            }
            $mybook->descripcion = $request->descripcion;
            $mybook->save(); // Edita en la base de datos el libro
            return redirect()->route('libro.index')->with('status', 'Libro editado correctamente'); // Una vez subido redirige al index y crea una variable de sesion status
        } catch (QueryException $exception) {
            return redirect()->route('libro.index')->with('status', 'No se ha podido editar el libro'); // Si da error mostramos el mensaje de que no se ha podido crear el libro
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Cargo los datos del libro por su id
        $mybook = Libros::findOrFail($id);
        $mybook->delete();
        return redirect()->route('libro.index')->with('status', 'Libro borrado correctamente');
    }
}
