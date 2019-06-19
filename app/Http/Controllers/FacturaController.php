<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factura;
use App\Inventario;
use App\Producto;
use App\Detalle_factura;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas = Factura::orderBy('ID', 'DESC')->paginate();        
        return view('factura.index', compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facturas = Factura::orderBy('ID', 'DESC')->paginate();
        $productos = Producto::orderBy('ID', 'DESC')->paginate();
        return view('factura.create', compact('facturas', 'productos'));
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

                $factura = Factura::create([
                    'cliente' => $data['cliente'],
                    'impuesto' => $data['impuesto'],
                    'montoTotal' => $data['montoTotal'],
                    'descripcion' => $data['descripcion']
                ]);                

                for ($i=0; $i < count($data['producto_id']); $i++) 
                {                 
                    Detalle_factura::create([
                    'factura_id' => $factura->id,
                    'producto_id' => $data['producto_id'][$i],
                    'precio' => $data['precio'][$i],
                    'cantidad' => $data['cantidad'][$i],
                    'iva' => $data['iva'][$i]
                    ]);
                }        

        return redirect()->route('facturas.index')->with('message', 'Factura agregada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $factura = Factura::find($id);
        return view('factura.show', compact('factura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $factura = Factura::find($id);
        return view('factura.edit', compact('factura'));  
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
        $factura = Factura::find($id);
        
        if($factura)
        {            
            $factura->cantidad = $request->cantidad;            
            $factura->save();         
        }
        return redirect()->route('facturas.index')->with('message', 'Factura actualizada exitosamente');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Factura::destroy($id);
        return redirect()->route('facturas.index')->with('message', 'Factura eliminada exitosamente');      
    }    
}
