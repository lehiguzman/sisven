<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
    <input id="cliente"  name="cliente" type="text" class="form-control{{ $errors->has('cliente') ? ' is-invalid' : '' }} col-sm-6" value="{{ old('cliente') }}" placeholder="Ingrese nombre de cliente" required autofocus>
        @if ($errors->has('cliente'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('cliente') }}</strong>
            </span>
        @endif
    </div>
    <input type="hidden" name="producto_id" id="producto_id">
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
        <input type="text" id="precio" name="precio" placeholder="Precio del producto" class="form-control{{ $errors->has('cliente') ? ' is-invalid' : '' }} col-sm-12" }} 
        onblur="calculaIva()">
    </div>
    <div class="col-md-2 form-inline justify-content-center">
        <input type="text" id="iva" name="iva" placeholder="IVA" class="form-control{{ $errors->has('iva') ? ' is-invalid' : '' }} col-sm-12" }} disabled="disabled">
    </div>
    <div class="col-md-2 form-inline justify-content-center">
        <button type="button" id="buttonProducto" class="btn btn-primary btn-user" onclick="calculaIva(); agregaProducto();">
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
<div id="tablaProductos">
        
</div>
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