<div id="divListaProductos">
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
</div>