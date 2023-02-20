<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class LibrosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::all();
        return view('libros.index')->with('libros', $libros);
    }

    public function create()
    {
        return view('libros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo'=>'required',
        ]);
        try{

            $libro = new Libro();
            $libro->nombre= $request->nombre;
            $nombrefoto = time() . "-" . $request->file('imagen')->getClientOriginalName();
            $libro->imagen = $nombrefoto;
            $libro->save();
            $request->file('imagen')->storeAs('public/libros', $nombrefoto);
            return redirect()->route('libros.index')->with('status', "Familia Creada Correctamente");
            $libro->save();
            return redirect()->route('categorias.index')->with('status', "Libro Creada Correctamente");
        }
        catch(QueryException $exception){
            return redirect()->route('categorias.index')->with('status', "No se ha podido crear el coche");
        }


    }
}
