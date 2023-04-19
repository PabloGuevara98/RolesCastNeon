<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cast;


class CastsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->middleware('can:admin.casts.index')->only('index');
        $this->middleware('can:admin.casts.edit')->only('edit','update');
        $this->middleware('can:admin.casts.create')->only('create',);
        $this->middleware('can:admin.casts.destroy')->only('destroy',);


    }


    public function index()
    {
        //
        $casts = Cast::all();

        return view('admin.casts.index', compact('casts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.casts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request-> validate([
            'nombre' => 'required',
            'slug' => 'required|unique:casts',
            'fecha' => 'required',
            'participantes' => 'required'
        ]);
        $cast = Cast::create($request->all());
        return redirect()->route('admin.casts.edit', $cast)->with('info', 'El cast se creó con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cast $cast)
    {
        //
        return view('admin.casts.show', compact('cast'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cast $cast)
    {
        //
        return view('admin.casts.edit', compact('cast'));
        $this->authorize('author', $cast);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cast $cast)
    {
        //
        $request-> validate([
            'nombre' => 'required',
            'slug' => "required|unique:casts,slug,$cast->id",
            'fecha' => 'required',
            'participantes' => 'required'
        ]);

        $cast ->update($request->all());
        return redirect()->route('admin.casts.edit',$cast)->with('info', 'El cast se actualizó con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cast $cast)
    {
        //
        $this->authorize('author', $cast);

        $cast->delete();

        return redirect()->route('admin.casts.index')->with('info', 'El cast se eliminó con éxito.');
    }
}
