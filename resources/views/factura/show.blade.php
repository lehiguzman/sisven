@extends('home')

@section('contenido')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <b>Ver factura registrada</b>
              </div>
              <div class="card-body">   
                <p class="card-text">    
                <p><strong>Cliente : </strong>{{ $factura->cliente }}</p>                  
                <p><strong>Monto total : </strong>{{ $factura->montoTotal }}</p>                
                <p><strong>Monto impuesto : </strong>{{ $factura->impuesto }}</p>
                <p><strong>Descripción : </strong>{{ $factura->descripcion }}</p>
                <hr>
                  <div class="col-md-12 form-inline justify-content-center bg-primary text-white">PRODUCTOS FACTURADOS
                  </div>
                <hr>
                <table width="100%">
                  <tr class="font-weight-bold h4">
                    <td width="40%" align="center">
                        Producto
                    </td>
                    <td width="15%" align="center">
                        Cantidad
                    </td>
                    <td width="15%" align="center">
                        Monto
                    </td>
                    <td width="15%" align="center">
                        Iva
                    </td>
                    <td width="15%" align="center">
                        Total
                    </td>
                  </tr>
                  @foreach($detalle_facturas as $detalle_factura)                  
                    <tr>
                      <td width="40%" align="center">
                        @foreach($productos as $producto)                        
                          @if($detalle_factura->producto_id == $producto->id)
                            {{ $producto->nombre }}
                          @endif
                        @endforeach
                      </td>
                      <td width="15%" align="center">
                        {{ $detalle_factura->cantidad }}
                      </td>
                      <td width="15%" align="center">
                        {{ number_format($detalle_factura->precio, 2) }}
                      </td>
                      <td width="15%" align="center">
                        {{ number_format($detalle_factura->iva, 2) }}
                      </td>
                      <td width="15%" align="center">
                        {{ number_format(($detalle_factura->cantidad * $detalle_factura->precio) + $detalle_factura->iva, 2) }}
                      </td>
                    </tr>
                  @endforeach
                </table>
                <br>
                    <a href="{{ route('facturas.index') }}"><button type="button" class="btn btn-primary float-right">Regresar</button></a>
              </div>
            </div>
        </div>
    </div>

@endsection