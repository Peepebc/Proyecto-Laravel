<?php

namespace App\Http\Livewire;

use App\Models\Libro;
use Livewire\Component;
use Livewire\WithPagination;

class LibrosComponent extends Component
{
    use WithPagination;
    public $buscador;
    public function render()
    {
        $url = 'storage/libros/';
        $libros = Libro::where('titulo', 'like', '%' . $this->buscador . '%')->paginate(20);
        return view('livewire.libros-component')->with('libros',$libros)->with('url',$url);

    }

    public function updatingBuscador(){
        $this->resetPage();
    }
}
