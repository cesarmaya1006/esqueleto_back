<?php

namespace App\Http\Controllers\Universidad;

use App\Http\Controllers\Controller;
use App\Models\Admin\Carrera;
use App\Models\Admin\Facultad;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carreras = Carrera::get();
        return view('intranet.parametros.carreras.index', compact('carreras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $facultades = Facultad::get();
        return view('intranet.parametros.carreras.crear', compact('facultades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        Carrera::create($request->all());
        return redirect('admin/carreras')->with('mensaje', 'Carrera creada con exito');
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
        $carrera = Carrera::findOrFail($id);
        $facultades = Facultad::get();
        return view('intranet.parametros.carreras.editar', compact('carrera', 'facultades'));
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
        Carrera::findOrFail($id)->update($request->all());
        return redirect('admin/carreras')->with('mensaje', 'Carrera actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cargar_carreras(Request $request)
    {
        if ($request->ajax()) {
            $id = $_GET['id'];
            return Carrera::where('facultad_id', $id)->get();
        }
    }
}
