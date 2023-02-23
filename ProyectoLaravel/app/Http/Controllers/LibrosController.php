<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
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
        $url = 'storage/libros/';
        return view('libros.index')->with('libros', $libros)->with('url',$url);

    }

    public function get10()
    {
        $libros = Libro::all()->sortByDesc('id')->take(10);
        $url = 'storage/libros/';
        return view('dashboard')->with('libros', $libros)->with('url',$url);
    }

    public function create()
    {
        return view('libros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo'=>'required',
            'autor'=>'required',
            'anio'=>'required',
            'descripcion'=>'required',
            'imagen'=>'required|image'
        ]);
        try{

            $libro = new Libro();
            $libro->titulo= $request->titulo;
            $libro->autor= $request->autor;
            $libro->anio= $request->anio;
            $libro->descripcion= $request->descripcion;
            $nombrefoto = time() . "-" . $request->file('imagen')->getClientOriginalName();
            $libro->imagen = $nombrefoto;
            $libro->save();
            $request->file('imagen')->storeAs('public/libros', $nombrefoto);
            return redirect()->route('libros.index')->with('status', "Libro Creado Correctamente");
        }
        catch(QueryException $exception){
            return redirect()->route('inicio')->with('status', $exception);
        }
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $libro = Libro::findOrFail($id);
        $url = 'storage/libros/';
        return view('libros.edit')->with('libro',$libro)->with('url',$url);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request,$id)
    {
        $request->validate([
            'titulo'=>'required',
            'autor'=>'required',
            'anio'=>'required',
            'descripcion'=>'required',
            'imagen'=>'required|image'
        ]);
        try{

            $libro = Libro::findOrFail($id);
            $libro->titulo= $request->titulo;
            $libro->autor= $request->autor;
            $libro->anio= $request->anio;
            if(is_uploaded_file($request->imagen)){
                $nombrefoto = time() . "-" . $request->file('imagen')->getClientOriginalName();
                $libro->imagen = $nombrefoto;
                $request->file('imagen')->storeAs('public/libros', $nombrefoto);
            }
            $libro->save();
            $request->file('imagen')->storeAs('public/libros', $nombrefoto);
            return redirect()->route('libros.index')->with('status', "Libro editado Correctamente");
        }
        catch(QueryException $exception){
            return redirect()->route('inicio')->with('status', $exception);
        }
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libro = Libro::findOrFail($id);
        $comentarios = Comentario::select('users.nombre','comentarios.comentario')->where('idLibro',$id)->join('users', 'comentarios.idUsuario', '=', 'users.id')->get();
        $url = 'storage/libros/';
        return view('libros.show')->with('libro',$libro)->with('comentarios',$comentarios)->with('url',$url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();
        return redirect()->route('libros.index')->with('status', "Libro borrado correctamente");
    }
}
