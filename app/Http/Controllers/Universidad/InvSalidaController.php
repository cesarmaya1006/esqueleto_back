<?php

namespace App\Http\Controllers\Universidad;

use App\Http\Controllers\Controller;
use App\Models\Admin\Inv_Salida;
use App\Models\Admin\Inventario;
use App\Models\Admin\Producto;
use App\Models\Admin\Usuario;
use Illuminate\Http\Request;

class InvSalidaController extends Controller
{
    public function crear($id)
    {
        $usuario = Usuario::findOrFail(session('id_usuario'));
        $inventario = Inventario::findOrFail($id);
        return view(
            'intranet.universidad.inventario.salida',
            compact('usuario', 'inventario')
        );
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
        $productoAct['precio'] = $producto->precio - ($request['costo'] * $request['cantidad']);
        $productoAct['cantidad'] = $producto->cantidad - $request['cantidad'];
        $productoAct['stock'] = $producto->stock - $request['cantidad'];
        Producto::findOrFail($request['producto_id'])->update($productoAct);
        Inv_Salida::create($request->all());
        return redirect('admin/inventarios')->with(
            'mensaje',
            'Se realizó la salida con éxito'
        );
    }

    public function cargar_max_prod(Request $request)
    {
        if ($request->ajax()) {
            $id = $_GET['id'];
            return Producto::findOrFail($id);
        }
    }
}
