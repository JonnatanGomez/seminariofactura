<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operacion;

class OperacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=0)
    {
        if(!empty($id)){
            $operacion = Operacion::join('cliente', 'idcliente', '=', 'cliente.id')->select('operacion.*','cliente.nombre','cliente.nit')->where('operacion.id', $id)->get()->toJson(JSON_PRETTY_PRINT);
        }else{
            $operacion = Operacion::join('cliente', 'idcliente', '=', 'cliente.id')->select('operacion.*','cliente.nombre','cliente.nit')->orderBy('operacion.id', 'desc')->get()->toJson(JSON_PRETTY_PRINT);
        }
        return response($operacion, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $operacion = new Operacion;
        $operacion->idcliente = $request->idcliente;
        $operacion->total = $request->total;
        $operacion->save();
        $idop = $operacion->id;
  
        return response()->json([
          "message" => "Operacion record created",
          "id" => $idop
        ], 201);
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
    public function update(Request $request, $id)
    {
        //
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
