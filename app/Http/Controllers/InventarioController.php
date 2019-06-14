<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Inventario;

class InventarioController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventarios = Inventario::orderBy('ID', 'DESC')->paginate();
        return view('inventario.index', compact('inventarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $data = $request;

                Inventario::create([
                    'producto_id' => $data['producto_id'],
                    'cantidad' => $data['cantidad']
                ]);
        return redirect()->route('inventarios.index')->with('message', 'Inventario agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventario = Producto::find($id);
        return view('inventario.show', compact('inventario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventario = Inventario::find($id);
        return view('inventario.edit', compact('inventario'));  
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
        $inventario = Inventario::find($id);
        
        if($inventario)
        {            
            $inventario->cantidad = $request->cantidad;            
            $inventario->save();         
        }
        return redirect()->route('inventarios.index')->with('message', 'Inventario actualizado exitosamente');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Inventario::destroy($id);
        return redirect()->route('inventarios.index')->with('message', 'Inventario eliminado exitosamente');      
    }    
}
