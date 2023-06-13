<?php

namespace App\Http\Controllers;

use App\Models\Proyectos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proyectos = Proyectos::paginate(5);
        return view('proyecto.index')
                    ->with('proyectos',$proyectos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proyecto.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombreProyecto' => 'required|max:50',
            'fuenteFondos' => 'required',
            'montoPlanificado' => 'required',
            'montoPatrocinado' => 'required',
            'montoFondosPropios' => 'required'
        ]);
        $proyectos = Proyectos::create($request->only('nombreProyecto','fuenteFondos','montoPlanificado','montoPatrocinado','montoFondosPropios'));
        Session::flash('mensaje','Registro creado con éxito');
        return redirect()->route('proyectos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyectos $proyectos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyectos $proyectos)
    {
        return view('proyecto.update')
                    ->with('Proyectos',$proyectos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyectos $proyectos)
    {
        $request->validate([
            'nombreProyecto' => 'required|max:50',
            'fuenteFondos' => 'required',
            'montoPlanificado' => 'required',
            'montoPatrocinado' => 'required',
            'montoFondosPropios' => 'required'
        ]);
        $proyectos->nombreProyecto = $request['nombreProyecto'];
        $proyectos->fuenteFondos = $request['fuenteFondos'];
        $proyectos->montoPlanificado = $request['montoPlanificado'];
        $proyectos->montoPatrocinado = $request['montoPatrocinado'];
        $proyectos->montoFondosPropios = $request['montoFondosPropios'];
        $proyectos->save();
        Session::flash('mensaje','Registro editado con éxito');
        return redirect()->route('proyectos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyectos $proyectos)
    {
        $proyectos->delete();
        Session::flash('mensaje','Registro eliminado con éxito!');
        return redirect()->route('proyectos.index');
    }
}
