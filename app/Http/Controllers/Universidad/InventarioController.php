<?php

namespace App\Http\Controllers\Universidad;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionInventarios;
use App\Models\Admin\Dependencia;
use App\Models\Admin\Inventario;
use App\Models\Admin\Producto;
use App\Models\Admin\Usuario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Usuario::findOrFail(session('id_usuario'));
        $id = session('id_usuario');
        if (session('rol_id') < 3) {
            $dependencias = Dependencia::get();
        } else {
            $dependencias = Dependencia::whereHas('inventarios', function ($p) use($id) {
                $p->where('usuario_id', $id);
            })->get();
        }
        return view(
            'intranet.universidad.inventario.inventario',
            compact('usuario', 'dependencias')
        );
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
            $p->where('rol_id','>', 2)->where('rol_id','<>', 5);
        })->get();

        $dependencia = Dependencia:: findOrFail($id);
        return view('intranet.universidad.inventario.crear',compact('usuario','usuarios', 'dependencia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionInventarios $request)
    {
        Inventario::create($request->all());
        return redirect('admin/inventarios')->with('mensaje', 'Inventario creado con exito creada con éxito');
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
        $usuario = Usuario::findOrFail(session('id_usuario'));
        $usuarios = Usuario::whereHas('roles', function ($p) {
            $p->where('rol_id','>', 2)->where('rol_id','<>', 5);
        })->get();
        $inventario = Inventario::findOrFail($id);
        return view('intranet.universidad.inventario.editar', compact('inventario','usuario','usuarios'));
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
        Inventario::findOrFail($id)->update($request->all());
        return redirect('admin/inventarios')->with('mensaje', 'Inventario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function producto_crear($id){
        $inventario = Inventario::findOrFail($id);
        $usuario = Usuario::findOrFail(session('id_usuario'));
        return view('intranet.universidad.inventario.elemento', compact('inventario','usuario'));
    }
    public function producto_guardar(Request $request)
    {
        Producto::create($request->all());
        return redirect('admin/inventarios/entradas/'. $_POST['inventario_id'])->with('mensaje', 'Producto creado con éxito');

    }
}
