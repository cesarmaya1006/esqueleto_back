<?php

namespace App\Http\Controllers\Universidad;

use App\Http\Controllers\Controller;
use App\Models\Admin\Inv_Entrada;
use App\Models\Admin\Inventario;
use App\Models\Admin\Producto;
use App\Models\Admin\Usuario;
use Illuminate\Http\Request;

class InvEntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear($id)
    {
        $usuario = Usuario::findOrFail(session('id_usuario'));
        $inventario = Inventario::findOrFail($id);
        return view('intranet.universidad.inventario.entradas',compact('usuario','inventario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $producto = Producto::FindOrFail($request['producto_id']);
        $productoAct['precio'] = $producto->precio+($request['costo']* $request['cantidad']);
        $productoAct['cantidad'] = $producto->cantidad+$request['cantidad'];
        $productoAct['stock'] = $producto->stock+$request['cantidad'];
        Producto::findOrFail($request['producto_id'])->update($productoAct);
        Inv_Entrada::create($request->all());
        return redirect('admin/inventarios')->with('mensaje', 'Se realizó la entrada con éxito');
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

}
