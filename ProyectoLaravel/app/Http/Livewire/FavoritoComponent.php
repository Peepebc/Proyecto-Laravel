<?php

namespace App\Http\Livewire;

use App\Models\Favorito;
use Livewire\Component;

class FavoritoComponent extends Component
{
    public $libro;
    public $usuario;
    public $valor="none";
    public $isFavorito=false;
    public $idFavorito;
    protected $favoritoLibro;

    public function render()
    {
        $favoritoLibro = Favorito::where('idUsuario', $this->usuario)->where('idLibro',$this->libro)->first();
        if($favoritoLibro!=null) {
            $this->valor = "#2cb504";
            $this->isFavorito=true;
            $this->idFavorito=$favoritoLibro->id;
        }
        return view('livewire.favorito-component');
    }

    public function favorito(){
        if(!$this->isFavorito){
            $favorito= new Favorito();
            $favorito->idUsuario = $this->usuario;
            $favorito->idLibro = $this->libro;
            $favorito->save();
        }
        else{
            $fav = Favorito::findOrFail($this->idFavorito);
            $fav->delete();
        }
        $this->isFavorito = $this->isFavorito? false :true;

        $this->valor = $this->valor =="#2cb504" ? "none" : "#2cb504";
    }
}
