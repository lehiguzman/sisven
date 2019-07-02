<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
    <input id="cliente" name="cliente" type="text" class="form-control{{ $errors->has('cliente') ? ' is-invalid' : '' }} col-sm-6" value="{{ $factura->cliente }}" placeholder="Ingrese nombre de cliente" required autofocus>       
    </div>
    <input type="hidden" name="factura_id" id="factura_id" value="{{ $factura->id }}">
</div>
<hr>
    <div class="col-md-12 form-inline justify-content-center bg-brown text-white">FORMULARIO DE PRODUCTOS A FACTURAR
    </div>
<hr>
<div class="form-group row">
    <div class="col-md-3 form-inline justify-content-center">
        <select  id="producto" name="producto" class="form-control{{ $errors->has('producto') ? ' is-invalid' : '' }} col-sm-12" onchange="verificaExistente(this)">
            <option value="" disabled selected>
                -- Seleccione Producto --
            </option>
            @foreach($productos as $producto)
                <option value="{{ $producto->id }}">
                    {{ $producto->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2 form-inline justify-content-center">
        <input type="text" id="cantidad" name="cantidad" placeholder="Cantidad" class="form-control{{ $errors->has('cantidad') ? ' is-invalid' : '' }} col-sm-8" }}>
    </div>
    <div class="col-md-3 form-inline justify-content-center">
        <input type="text" id="precio" name="precio" placeholder="Precio del producto" class="form-control{{ $errors->has('precio') ? ' is-invalid' : '' }} col-sm-12" }} 
        onblur="calculaIva()">
    </div>
    <div class="col-md-2 form-inline justify-content-center">
        <input type="text" id="iva" name="iva" placeholder="IVA" class="form-control{{ $errors->has('iva') ? ' is-invalid' : '' }} col-sm-12" }} disabled="disabled">
    </div>
    <div class="col-md-2 form-inline justify-content-center">
        <button type="button" id="btnAgregaProducto" class="btn btn-primary btn-user" onclick="calculaIva();">
                Agregar
        </button> 
    </div>
    <div id="divIvaOculto">
        
    </div>
</div>
<hr>
    <div class="col-md-12 form-inline justify-content-center bg-primary text-white">PRODUCTOS A FACTURAR
    </div>
<hr>
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
                SEL
            </td>    
        </tr>
        @foreach($detalle_facturas as $detalle_factura)                  
            <tr id="{{ $detalle_factura->producto_id }}">
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
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
    <input id="descripcion" type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }} col-sm-6" name="descripcion" value="{{ $factura->descripcion }}" placeholder="Descripción" required autofocus>
        @if ($errors->has('descripcion'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('descripcion') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row mb-0">
    <div class="col-md-12 form-inline justify-content-center">
        <button type="submit" rel="tooltip" class="btn btn-info" value="{{ __('Registrar') }}">
            <i class="fas fa-archive"> Registrar</i>                              
        </button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                         
        <a href="{{ route('productos.index') }}" class="btn btn-danger">                
             <i class="fas fa-expand-arrows-alt"> Cancelar</i>
        </a>  
    </div>                            
</div> 

<script type="text/javascript">
    function calculaIva()
    {
        var cantidad = parseFloat(document.getElementById("cantidad").value);
        var precio = parseFloat(document.getElementById("precio").value);        
        var porcIva = document.getElementById("ivaOculto").value;

        var iva = ((precio * cantidad) * porcIva) / 100;

        document.getElementById("iva").value = iva;
    }

    function verificaExistente(e)
    {        
        var tabla = document.getElementById('tablaProductos');
        var productoId = e.value;
        var check = true;

            if(e.value == "")
            {
                alert("Debe seleccionar un producto");
                document.getElementById("producto").focus();
                check = false;
            }

            for (var i = 1; i < tabla.rows.length; i++) 
            {                
                if(productoId == tabla.rows[i].id)
                {
                    alert("El producto ya ha sido agregado");
                    document.getElementById("producto").value = "";
                    check = false;
                }
            }
        return check;
    }
</script>