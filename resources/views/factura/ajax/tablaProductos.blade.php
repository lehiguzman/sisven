<div id="tablaProductos">
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
                    <button class="btn-danger" value="{{ $detalle_factura->id }}" onclick="elimina(this)">X</button>
                </td>
            </tr>
        @endforeach
    </table>
</div>