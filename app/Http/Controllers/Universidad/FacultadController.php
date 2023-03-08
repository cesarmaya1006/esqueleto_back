<?php

namespace App\Http\Controllers\Universidad;

use App\Http\Controllers\Controller;
use App\Models\Admin\Facultad;
use Illuminate\Http\Request;

class FacultadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facultades = Facultad::get();
        return view('intranet.parametros.facultades.index', compact('facultades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        return view('intranet.parametros.facultades.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        Facultad::create($request->all());
        return redirect('admin/facultades')->with('mensaje', 'Facultad creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $facultad = Facultad::findOrFail($id);
        return view('intranet.parametros.facultades.editar', compact('facultad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, $id)
    {
        Facultad::findOrFail($id)->update($request->all());
        return redirect('admin/facultades')->with('mensaje', 'Facultad actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        if (Facultad::destroy($id)) {
            return redirect('admin/facultades')->with('mensaje', 'Facultad eliminada con exito');
        } else {
            return redirect('admin/facultades')->with('errores', 'La facultad no puede ser eliminada, existen recursos usando este elemento');
        }
    }

    public function cargar_facultades(Request $request)
    {
        if ($request->ajax()) {
            return Facultad::get();
        }
    }
}
