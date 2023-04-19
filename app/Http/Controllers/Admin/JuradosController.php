<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jurado;

class JuradosController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.jurados.index')->only('index');
        $this->middleware('can:admin.jurados.edit')->only('edit','update');
        $this->middleware('can:admin.jurados.create')->only('create',);
        $this->middleware('can:admin.jurados.destroy')->only('destroy',);


    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurados = Jurado::all();
        return view('admin.jurados.index', compact('jurados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jurados.create');

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
        $jurado = Jurado::create($request->all());
        return redirect()->route('admin.jurados.edit', $jurado)->with('info', 'El jurado se creó con éxito.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Jurado $jurado)
    {
        return view('admin.jurados.show', compact('jurado'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurado $jurado)
    {
        return view('admin.jurados.edit', compact('jurado'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jurado $jurado)
    {
        $request-> validate([
            'nombre' => 'required',
            'cedula' => 'required'
        ]);
        $jurado = Jurado::create($request->all());
        return redirect()->route('admin.jurados.edit', $jurado)->with('info', 'El jurado se actualizó con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurado $jurado)
    {
        //
    }
}
