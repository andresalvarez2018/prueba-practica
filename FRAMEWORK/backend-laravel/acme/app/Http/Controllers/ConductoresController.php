<?php

namespace App\Http\Controllers;

use App\conductores;
use Illuminate\Http\Request;

class ConductoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conductores = Conductores::get();
        echo json_encode($conductores);
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
        $conductores = new Conductores();
        $conductores->cedula = $request->input('cedula');
        $conductores->primer_nombre = $request->input('primer_nombre');
        $conductores->segundo_nombre = $request->input('segundo_nombre');
        $conductores->apellidos = $request->input('apellidos');
        $conductores->direccion = $request->input('direccion');
        $conductores->telefono = $request->input('telefono');
        $conductores->ciudad = $request->input('ciudad');
        $conductores->save();
        echo json_encode($conductores);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\conductores  $conductores
     * @return \Illuminate\Http\Response
     */
    public function show(conductores $conductores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\conductores  $conductores
     * @return \Illuminate\Http\Response
     */
    public function edit(conductores $conductores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\conductores  $conductores_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $conductores_id)
    {
        $conductores = Conductores::find($conductores_id);
        $conductores->cedula = $request->input('cedula');
        $conductores->primer_nombre = $request->input('primer_nombre');
        $conductores->segundo_nombre = $request->input('segundo_nombre');
        $conductores->apellidos = $request->input('apellidos');
        $conductores->direccion = $request->input('direccion');
        $conductores->telefono = $request->input('telefono');
        $conductores->ciudad = $request->input('ciudad');
        $conductores->save();
        echo json_encode($conductores);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\conductores  $conductores_id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $conductores_id)
    {
        $conductores = Conductores::find($conductores_id);
        $conductores->delete();
    }
}
