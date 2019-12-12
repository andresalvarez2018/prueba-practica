<?php

namespace App\Http\Controllers;

use App\vehiculos;
use Illuminate\Http\Request;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Vehiculos::get();
        echo json_encode($vehiculos);
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
        $vehiculos = new Vehiculos();
        $vehiculos->placa = $request->input('placa');
        $vehiculos->color = $request->input('color');
        $vehiculos->marca = $request->input('marca');
        $vehiculos->tipo_vehiculo = $request->input('tipo_vehiculo');
        $vehiculos->conductor = $request->input('conductor');
        $vehiculos->propietario = $request->input('propietario');
        $vehiculos->save();
        echo json_encode($vehiculos);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function show(vehiculos $vehiculos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function edit(vehiculos $vehiculos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vehiculos  $vehiculos_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$vehiculos_id)
    {
        $vehiculos = Vehiculos::find($vehiculos_id);
        $vehiculos->placa = $request->input('placa');
        $vehiculos->color = $request->input('color');
        $vehiculos->marca = $request->input('marca');
        $vehiculos->tipo_vehiculo = $request->input('tipo_vehiculo');
        $vehiculos->conductor = $request->input('conductor');
        $vehiculos->propietario = $request->input('propietario');
        $vehiculos->save();
        echo json_encode($vehiculos);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vehiculos  $vehiculos_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($vehiculos_id)
    {
        $vehiculos = Vehiculos::find($vehiculos_id);
        $vehiculos->delete();
    }
}
