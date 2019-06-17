<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
    <input id="cliente" type="text" class="form-control{{ $errors->has('cliente') ? ' is-invalid' : '' }} col-sm-6" name="cliente" value="{{ old('cliente') }}" placeholder="Ingrese nombre de cliente" required autofocus>
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
        <select name="producto_id" class="form-control{{ $errors->has('cliente') ? ' is-invalid' : '' }} col-sm-12">
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
        <input type="text" name="cantidad" placeholder="Cantidad" class="form-control{{ $errors->has('cantidad') ? ' is-invalid' : '' }} col-sm-8" }}>
    </div>
    <div class="col-md-3 form-inline justify-content-center">
        <input type="text" name="precio" placeholder="Precio del producto" class="form-control{{ $errors->has('cliente') ? ' is-invalid' : '' }} col-sm-12" }}>
    </div>
    <div class="col-md-2 form-inline justify-content-center">
        <input type="text" name="iva" placeholder="IVA" class="form-control{{ $errors->has('cliente') ? ' is-invalid' : '' }} col-sm-12" }}>
    </div>
    <div class="col-md-2 form-inline justify-content-center">
        <button type="button" class="btn btn-primary btn-user" id="addProducto">
                Agregar
        </button> 
    </div>
</div>
<hr>
    <div class="col-md-12 form-inline justify-content-center bg-primary text-white">PRODUCTOS A FACTURAR
    </div>
<hr>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
    <input id="impuesto" type="text" class="form-control{{ $errors->has('impuesto') ? ' is-invalid' : '' }} col-sm-6" name="impuesto" value="{{ old('impuesto') }}" placeholder="impuesto" required autofocus>
        @if ($errors->has('impuesto'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('impuesto') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
    <input id="montoTotal" type="text" class="form-control{{ $errors->has('montoTotal') ? ' is-invalid' : '' }} col-sm-6" name="montoTotal" value="{{ old('montoTotal') }}" placeholder="Monto Total" required autofocus>
        @if ($errors->has('montoTotal'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('montoTotal') }}</strong>
            </span>
        @endif
    </div>
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
  
  