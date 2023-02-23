<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class ComentariosController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comentario'=>'required',
        ]);
        try{
            $comentario = new Comentario();
            $comentario->comentario= $request->comentario;
            $comentario->idUsuario= Auth::user()->id;
            $comentario->idLibro= $request->idLibro;
            $comentario->save();
            return redirect()->route('libros.show',['libro' => $request->idLibro])->with('status', "Comentario Creado Correctamente");
        }
        catch(QueryException $exception){
            return redirect()->route('inicio')->with('status', $exception);
        }
    }
}
