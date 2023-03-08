<?php

namespace App\Http\Controllers\Universidad;

use App\Http\Controllers\Controller;
use App\Models\Admin\Facultad;
use App\Models\Admin\Inventario;
use App\Models\Admin\Prestamo;
use App\Models\Admin\Producto;
use App\Models\Admin\Rol;
use App\Models\Admin\Usuario;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $inventario = Inventario::findOrFail($id);
        $prestamos = Prestamo::get();
        return view('intranet.universidad.prestamos.index', compact('prestamos','inventario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear($id)
    {
        $usuario = Usuario::findOrFail(session('id_usuario'));
        $usuarios = Usuario::whereHas('roles', function ($p) {
            $p->where('rol_id', 6)->where('rol_id','<>', 5);
        })->get();
        $roles = Rol::where('id', '>' , 2)->get();
        $inventario = Inventario::findOrFail($id);
        $facultades = Facultad::get();
        return view('intranet.universidad.prestamos.crear', compact('inventario','usuario','usuarios','roles','facultades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        unset($request['tipousuario']);
        $producto = Producto::findOrFail($request['producto_id']);
        $producoUpdate['stock'] = $producto->stock - $request['cantidad'];
        Producto::findOrFail($request['producto_id'])->update($producoUpdate);
        Prestamo::create($request->all());
        return redirect('admin/inventarios/prestamos/'.$producto->inventario_id)->with('mensaje', 'Prestamo realizado con exito');
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
        $prestamo = Prestamo::findOrFail($id);
        return view('intranet.universidad.prestamos.editar', compact('prestamo'));
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
        Prestamo::findOrFail($id)->update($request->all());
        return redirect('admin/facultades')->with('mensaje', 'Entrega registrada con exito');
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
}
