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
        $detalle_facturas = Detalle_factura::where('factura_id', '=', $factura->id)->get();
        $productos = Producto::orderBy('ID','ASC')->paginate();        
        return view('factura.show', compact('factura', 'detalle_facturas', 'productos'));
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
        $detalle_facturas = Detalle_factura::where('factura_id', '=', $factura->id)->get();
        $productos = Producto::orderBy('ID', 'ASC')->paginate();
        return view('factura.edit', compact('factura', 'detalle_facturas', 'productos'));
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
            $factura->cliente = $request->cliente;
            $factura->montoTotal = $request->montoTotal;
            $factura->impuesto = $request->impuesto;
            $factura->descripcion = $request->descripcion;            
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

    /**
     * Ajax de porcentaje de IVA
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ajaxIva(Request $request)
    {
        $data = $request;
        
        $producto = Producto::find($data['producto']);

        return view('factura.ajax.iva', compact('producto'));
    }     

    /**
     * Ajax de tabla de productos
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ajaxActualizaProductos(Request $request)
    {
        $data = $request;        
        
        $montoTotal = 0;
        $impuesto = 0;

        $detalle_factura = Detalle_factura::updateOrCreate(
                ['factura_id' => $data['factura'],'producto_id' => $data['producto']],
                ['cantidad' => $data['cantidad'],
                 'precio' => $data['precio'],
                 'cantidad' => $data['cantidad'],
                 'iva' => $data['iva']
                ]);

        $detalle_facturas = Detalle_factura::where('factura_id', '=', $data['factura'])->get();

          foreach ($detalle_facturas as $detalle_factura) {
           $montoTotal += $detalle_factura->precio;
           $impuesto += $detalle_factura->iva;           
          }

        $factura = Factura::find($data['factura']);

            if($factura)
            {
                $factura->montoTotal = $montoTotal;
                $factura->impuesto = $impuesto;
                $factura->save();
            }

        $productos = Producto::orderBy('ID', 'ASC')->paginate();
        
        return view('factura.ajax.tablaProductos', compact('detalle_facturas', 'productos', 'impuesto', 'factura'));
    } 
}
