<?php

namespace App\Http\Controllers\Intranet\Carnet;

use App\Http\Controllers\Controller;
use App\Models\Admin\Rol;
use App\Models\Carnets\Carnet;
use Illuminate\Http\Request;

class CarnetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Rol::where('id', '>' ,'2')->get();
        $carnets = Carnet::with('rol')->get();
        //dd($carnets->toArray());
        return view('intranet.carnet.index',compact('carnets'));
    }

    public function configurar($id){
    $carnet = Carnet::findOrFail($id);
    return view('intranet.carnet.configurar',compact('carnet'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
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
        $request['marco1'] = "rgb(" . hexdec(substr($request['marco1'], 1, 2)).",".hexdec(substr($request['marco1'], 3, 2)).",".hexdec(substr($request['marco1'], 5, 2)) . ")";
        $request['marco2'] = "rgb(" . hexdec(substr($request['marco2'], 1, 2)).",".hexdec(substr($request['marco2'], 3, 2)).",".hexdec(substr($request['marco2'], 5, 2)) . ")";
        $request['marco3'] = "rgb(" . hexdec(substr($request['marco3'], 1, 2)).",".hexdec(substr($request['marco3'], 3, 2)).",".hexdec(substr($request['marco3'], 5, 2)) . ")";
        $request['marco4'] = "rgb(" . hexdec(substr($request['marco4'], 1, 2)).",".hexdec(substr($request['marco4'], 3, 2)).",".hexdec(substr($request['marco4'], 5, 2)) . ")";
        $request['marco5'] = "rgb(" . hexdec(substr($request['marco5'], 1, 2)).",".hexdec(substr($request['marco5'], 3, 2)).",".hexdec(substr($request['marco5'], 5, 2)) . ")";
        $request['label1'] = "rgb(" . hexdec(substr($request['label1'], 1, 2)).",".hexdec(substr($request['label1'], 3, 2)).",".hexdec(substr($request['label1'], 5, 2)) . ")";
        Carnet::findOrFail($id)->update($request->all());
        $carnets = Carnet::with('rol')->get();
        return redirect('admin/parametros/carnets-index')->with('mensaje', 'Carnet actualizado con exito')->with('carnets');
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
}
