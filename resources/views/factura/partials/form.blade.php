<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
    <input id="cliente"  name="cliente" type="text" class="form-control{{ $errors->has('cliente') ? ' is-invalid' : '' }} col-sm-6" value="{{ old('cliente') }}" placeholder="Ingrese nombre de cliente" required autofocus>
        @if ($errors->has('cliente'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('cliente') }}</strong>
            </span>
        @endif
    </div>
</div>
<hr>
    <div class="col-md-12 form-inline justify-content-center bg-brown text-white">FORMULARIO DE PRODUCTOS A FACTURAR
    </div>
<hr>
<div class="form-group row">
    <div class="col-md-3 form-inline justify-content-center">
        <select  id="producto" name="producto" class="form-control{{ $errors->has('producto') ? ' is-invalid' : '' }} col-sm-12">
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
        <input type="text" id="precio" name="precio"  placeholder="Precio del producto" class="form-control{{ $errors->has('cliente') ? ' is-invalid' : '' }} col-sm-12" }}>
    </div>
    <div class="col-md-2 form-inline justify-content-center">
        <input type="text" id="iva" name="iva" placeholder="IVA" class="form-control{{ $errors->has('cliente') ? ' is-invalid' : '' }} col-sm-12" }}>
    </div>
    <div class="col-md-2 form-inline justify-content-center">
        <button type="button" class="btn btn-primary btn-user" onclick="agregaProducto()">
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
<div id="tabla">
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
    </table>    
</div>
<div>
    <h3>
        Monto Total : <b id="montoTotal">0.00</b>
    </h3>
    <h4>
        Monto Iva : <b id="montoIva">0.00</b>
    </h4>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
    <input id="descripcion" type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }} col-sm-6" name="descripcion" value="{{ old('descripcion') }}" placeholder="Descripción" required autofocus>
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
    function agregaProducto()
    {                
        var selectProductos = document.getElementById('producto');
        var textCantidad = document.getElementById("cantidad");
        var textPrecio = document.getElementById("precio");
        var textIva = document.getElementById("iva");

        var tabla = document.getElementById('tablaProductos');

        var fila = document.createElement('tr');
        fila.setAttribute("width", "100%");
        fila.setAttribute("id", selectProductos.value);
        fila.setAttribute("name", selectProductos.value);
        var tablaFila = tabla.appendChild(fila);

        var columnaProducto = document.createElement('td');
        columnaProducto.setAttribute("width", "30%");
        var columnaCantidad = document.createElement('td');
        columnaCantidad.setAttribute("width", "15%");
        var columnaPrecio = document.createElement('td');
        columnaPrecio.setAttribute("width", "25%");
        var columnaIva = document.createElement('td');
        columnaIva.setAttribute("width", "20%");
        var columnaSel = document.createElement('td');
        columnaSel.setAttribute("width", "5%");

        
        var tablaProducto = tablaFila.appendChild(columnaProducto);
            tablaProducto.setAttribute("align", "center");
        var tablaCantidad = tablaFila.appendChild(columnaCantidad);
            tablaCantidad.setAttribute("align", "center");
        var tablaPrecio = tablaFila.appendChild(columnaPrecio);
            tablaPrecio.setAttribute("align", "center");
        var tablaIva = tablaFila.appendChild(columnaIva);
            tablaIva.setAttribute("align", "center");
        var tablaSel = tablaFila.appendChild(columnaSel);
            tablaSel.setAttribute("align", "center");                     
        

        var textoProducto = document.createTextNode(selectProductos.options[selectProductos.selectedIndex].text);
        var textoCantidad = document.createTextNode(textCantidad.value);        
                var textPrecio = parseFloat(textPrecio.value);
        var textoPrecio = document.createTextNode(textPrecio.toFixed(2));
                var textIva = parseFloat(textIva.value);
        var textoIva = document.createTextNode(textIva.toFixed(2));
        var botonEliminar = document.createElement('button'); 
        botonEliminar.setAttribute("onclick", "Elimina(this)"); 
        botonEliminar.setAttribute("value", document.getElementById('producto').value); 
        botonEliminar.setAttribute("class", "btn-danger"); 
        var textEliminar = document.createTextNode("X")
        botonEliminar.appendChild(textEliminar);

        actualizaTotal(textPrecio);
        actualizaIva(textIva);

        tablaProducto.appendChild(textoProducto);
        tablaCantidad.appendChild(textoCantidad);
        tablaPrecio.appendChild(textoPrecio);
        tablaIva.appendChild(textoIva);
        tablaSel.appendChild(botonEliminar);

        //Campos a enviar a base de datos
        var hiddenProducto = document.createElement('input');
        var inputProducto = tablaFila.appendChild(hiddenProducto);
            inputProducto.setAttribute('type', 'hidden');
            inputProducto.setAttribute('name', 'producto_id[]');
            inputProducto.setAttribute('value', document.getElementById('producto').value);

        var hiddenCantidad = document.createElement('input');
        var inputCantidad = tablaFila.appendChild(hiddenCantidad);
            inputCantidad.setAttribute('type', 'hidden');
            inputCantidad.setAttribute('name', 'cantidad[]');
            inputCantidad.setAttribute('value', document.getElementById('cantidad').value);

        var hiddenPrecio = document.createElement('input');
        var inputPrecio = tablaFila.appendChild(hiddenPrecio);
            inputPrecio.setAttribute('type', 'hidden');
            inputPrecio.setAttribute('name', 'precio[]');
            inputPrecio.setAttribute('value', document.getElementById('precio').value);

        var hiddenIva = document.createElement('input');
        var inputIva = tablaFila.appendChild(hiddenIva);
            inputIva.setAttribute('type', 'hidden');
            inputIva.setAttribute('name', 'iva[]');
            inputIva.setAttribute('value', document.getElementById('iva').value);

    }

    function Elimina(e)
    {
        var tabla = document.getElementById('tablaProductos');
                
        for (var i = tabla.rows.length-1; i > 0; i--) {
            var fila = tabla.rows[i];
            var filaId = tabla.rows[i].id;
            
            //alert("Fila seleccionada "+ e.value + " fila recorrido : "+ filaId);            
            if(e.value == filaId)
            {                   
                tabla.removeChild(fila);                
            }
        }        
    }

    function actualizaTotal(precio)
    {
        var montoTotal = document.getElementById("montoTotal");       
        var monto = parseFloat(montoTotal.innerHTML);        
        var total = precio + monto;
        montoTotal.innerHTML = total.toFixed(2);
    }

    function actualizaIva(iva)
    {
        var montoIva = document.getElementById("montoIva");
        var monto = parseFloat(montoIva.innerHTML);        
        var total = iva + monto;
        montoIva.innerHTML = total.toFixed(2);
    }
</script>
  
  