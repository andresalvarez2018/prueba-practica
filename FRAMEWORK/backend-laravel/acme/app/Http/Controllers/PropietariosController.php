<?php

namespace App\Http\Controllers;

use App\propietarios;
use Illuminate\Http\Request;

class PropietariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propietarios = Propietarios::get();
        echo json_encode($propietarios);
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
        $propietarios = new Propietarios();
        $propietarios->cedula = $request->input('cedula');
        $propietarios->primer_nombre = $request->input('primer_nombre');
        $propietarios->segundo_nombre = $request->input('segundo_nombre');
        $propietarios->apellidos = $request->input('apellidos');
        $propietarios->direccion = $request->input('direccion');
        $propietarios->telefono = $request->input('telefono');
        $propietarios->ciudad = $request->input('ciudad');
        $propietarios->save();
        echo json_encode($propietarios);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\propietarios  $propietarios
     * @return \Illuminate\Http\Response
     */
    public function show(propietarios $propietarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\propietarios  $propietarios
     * @return \Illuminate\Http\Response
     */
    public function edit(propietarios $propietarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\propietarios  $propietarios_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $propietarios_id)
    {
        $propietarios = Propietarios::find($propietarios_id);
        $propietarios->cedula = $request->input('cedula');
        $propietarios->primer_nombre = $request->input('primer_nombre');
        $propietarios->segundo_nombre = $request->input('segundo_nombre');
        $propietarios->apellidos = $request->input('apellidos');
        $propietarios->direccion = $request->input('direccion');
        $propietarios->telefono = $request->input('telefono');
        $propietarios->ciudad = $request->input('ciudad');
        $propietarios->save();
        echo json_encode($propietarios);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\propietarios  $propietarios_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($propietarios_id)
    {
        $propietarios = Propietarios::find($propietarios_id);
        $propietarios->delete();
    }
}
