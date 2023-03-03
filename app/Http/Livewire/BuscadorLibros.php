<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Libros;

class BuscadorLibros extends Component
{
    public $buscar = ''; // representa el texto de búsqueda introducido por el usuario
    public $libros; // contendrá la lista de libros encontrados
    public function mount()
    {
        if(!$this->buscar) {
            // Obtener la lista de libros desde la base de datos
            $this->libros = Libros::all();
        }
    }

    public function render()
    {
        // Filtrar los libros según el titulo de búsqueda
        $filtroLibros = Libros::where('titulo', 'like', '%'.$this->buscar.'%')->get();
        $this->libros = $filtroLibros;
        $url = 'storage/img/';
        return view('livewire.buscador-libros', ['filtroLibros' => $filtroLibros,'url' => $url]);
    }
}
