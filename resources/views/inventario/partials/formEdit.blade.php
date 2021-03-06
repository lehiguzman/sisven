<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
        <p><strong>PRODUCTO : </strong>{{ $producto->nombre }}</p>      
    </div>
</div>
<div class="form-group row">
    <div class="col-md-12 form-inline justify-content-center">
    <input id="cantidad" type="text" class="form-control{{ $errors->has('cantidad') ? ' is-invalid' : '' }} col-sm-6" name="cantidad" value="{{ $inventario->cantidad }}" placeholder="Ingrese cantidad de producto" required autofocus>
        @if ($errors->has('nombre'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('cantidad') }}</strong>
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
        <a href="{{ route('inventarios.index') }}" class="btn btn-danger">                
             <i class="fas fa-expand-arrows-alt"> Cancelar</i>
        </a>        
    </div>                            
</div> 
  