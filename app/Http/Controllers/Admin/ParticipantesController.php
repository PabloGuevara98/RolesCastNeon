<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Participante;

class ParticipantesController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.participantes.index')->only('index');
        $this->middleware('can:admin.participantes.edit')->only('edit','update');
        $this->middleware('can:admin.participantes.create')->only('create',);
        $this->middleware('can:admin.participantes.destroy')->only('destroy',);


    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $participantes = Participante::all();
        return view('admin.participantes.index', compact('participantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.participantes.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request-> validate([
            'nombre' => 'required',
            'cedula' => 'required'
        ]);
        $participante = Participante::create($request->all());
        return redirect()->route('admin.participantes.edit', $participante)->with('info', 'El participante se creó con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Participante $participante)
    {
        return view('admin.participantes.show', compact('participante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Participante $participante)
    {
        //
        return view('admin.participantes.edit', compact('participante'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Participante $participante)
    {
        $request-> validate([
            'nombre' => 'required',
            'cedula' => 'required'
        ]);
        $participante = Participante::create($request->all());
        return redirect()->route('admin.participantes.edit', $participante)->with('info', 'El participante se actualizó con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Participante $participante)
    {
        //
        $participante->delete();

        return redirect()->route('admin.participantes.index')->with('info', 'La etiqueta se eliminó con éxito.');
    }
}
