<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
    <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }} col-sm-6" name="nombre" value="{{ old('nombre') }}" placeholder="Ingrese Nombre de Producto" required autofocus>
        @if ($errors->has('nombre'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('nombre') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
    <input id="iva" name="iva" type="text" class="form-control{{ $errors->has('iva') ? ' is-invalid' : '' }} col-sm-6"  value="{{ old('iva') }}" placeholder="Ingrese IVA de Producto" required autofocus>
        @if ($errors->has('iva'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('iva') }}</strong>
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
  