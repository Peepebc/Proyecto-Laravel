<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiLibroRequest;
use App\Models\Libro;
use Illuminate\Http\Request;

class APILibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::all();
        return response()->json([
            'status'=>true,
            'cars'=>$libros
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApiLibroRequest $request)
    {
        $libro = Libro::create($request->all());
        return response()->json([
            'status'=>true,
            'message'=>'Libro creado correctamente',
            'libro'=>$libro
        ]);
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
        return response()->json([
            'status'=>true,
            'libros'=>$libro
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApiLibroRequest $request, $id)
    {
        $libro = Libro::findOrFail($id);
        $libro->update($request->all());
        return response()->json([
            'status'=>true,
            'message'=>'Libro actualizado correctamente',
            'libro'=>$libro
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();
        return response()->json([
            'status'=>true,
            'message'=>'Libro borrado correctamente',
            'libro'=>$libro
        ]);
    }
}
