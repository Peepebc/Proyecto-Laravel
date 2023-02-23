<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritosController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favoritos = Favorito::where('idUsuario',Auth::user()->id)->pluck('idLibro')->toArray();;
        $libros = Libro::whereIn('id',$favoritos)->get();
        $url = 'storage/libros/';
        return view('favoritos.index')->with('libros', $libros)->with('url',$url);
    }
}
