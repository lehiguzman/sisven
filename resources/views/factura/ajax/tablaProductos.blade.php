<div id="divTablaProductos">
    <table id="tablaProductos" width="100%" border="1">
        <tr>
            <td width="30%">
                Producto
            </td>
            <td width="15%">
                Cantidad
            </td>
            <td width="30%">
                Monto Unitario
            </td>
            <td width="20%">
                IVA
            </td>        
            <td width="5%" >                
                sel
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
                    {{ number_format($detalle_factura->precio, 2, ".", "") }}
                </td>
                <td width="15%" align="center">
                    {{ number_format($detalle_factura->iva, 2, ".", "") }}
                </td>
                <td width="15%" align="center">
                     <button class="btn-danger" id="btnEliminaProducto" name="detalle_factura" value="{{ $detalle_factura->id }}">X</button>
                </td>
                <input type="hidden" name="detalle_id" id="detalle_id" value="{{ $detalle_factura->id }}">
            </tr>
        @endforeach
    </table>
    <br><br>
<div align="right">
    <h3>
        Monto Total : <b id="montoTotalPrint">{{ number_format($factura->montoTotal, 2, ".", "") }}</b>
        <input type="hidden" id="montoTotal" name="montoTotal" 
        value="{{ number_format($factura->montoTotal, 2, ".", "") }}"></input>
    </h3>
    <h4>
        Monto Iva : <b id="montoIvaPrint">{{ number_format($factura->impuesto, 2, ".", "") }}</b>
        <input type="hidden" id="impuesto" name="impuesto" value="{{ number_format($factura->impuesto, 2, ".", "") }}"></input>
    </h4>
</div>
</div>