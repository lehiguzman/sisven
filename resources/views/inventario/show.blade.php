@extends('home')

@section('contenido')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <b>Ver inventario registrado</b>
              </div>
              <div class="card-body">   
                <p class="card-text">    
                <p><strong>ID : </strong>{{ $inventario->id }}</p>                  
                <p><strong>PRODUCTO : </strong>{{ $producto->nombre }}</p>
                <p><strong>CANTIDAD : </strong>{{ $inventario->cantidad }}</p>        
                <br>
                    <a href="{{ route('inventarios.index') }}"><button type="button" class="btn btn-primary float-right">Regresar</button></a>
              </div>
            </div>
        </div>
    </div>

@endsection