<?php

namespace App\Http\Controllers\Universidad;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionDependencias;
use App\Models\Admin\Dependencia;
use App\Models\Admin\Usuario;
use Illuminate\Http\Request;

class DependenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dependencias = Dependencia::get();
        return view(
            'intranet.universidad.dependencias.index',
            compact('dependencias')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $usuarios = Usuario::whereHas('roles', function ($p) {
            $p->where('rol_id','>', 2)->where('rol_id','<>', 5);
        })->get();
        return view(
            'intranet.universidad.dependencias.crear',
            compact('usuarios')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionDependencias $request)
    {
        Dependencia::create($request->all());
        return redirect('admin/inventarios/dependencias')->with(
            'mensaje',
            'Dependencia creada con exito'
        );
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
        $dependencia = Dependencia::findOrFail($id);
        $usuarios = Usuario::whereHas('roles', function ($p) {
            $p->where('rol_id','>', 2)->where('rol_id','<>', 5);
        })->get();
        return view(
            'intranet.universidad.dependencias.editar',
            compact('dependencia','usuarios')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionDependencias $request, $id)
    {
        Dependencia::findOrFail($id)->update($request->all());
        return redirect('admin/inventarios/dependencias')->with(
            'mensaje',
            'Dpendencia actualizada con exito'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        if (Dependencia::destroy($id)) {
            return redirect('admin/inventarios/dependencias')->with(
                'mensaje',
                'Dependencia eliminada con exito'
            );
        } else {
            return redirect('admin/inventarios/dependencias')->with(
                'errores',
                'La dependencia no puede ser eliminada, existen recursos usando este elemento'
            );
        }
    }
}
