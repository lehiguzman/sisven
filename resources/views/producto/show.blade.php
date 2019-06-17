@extends('home')

@section('contenido')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <b>Ver producto registrada</b>
              </div>
              <div class="card-body">   
                <p class="card-text">    
                  <p><strong>ID : </strong>{{ $producto->id }}</p>                  
                  <p><strong>Nombre : </strong>{{ $producto->nombre }}</p>
                <br>
                    <a href="{{ route('productos.index') }}"><button type="button" class="btn btn-primary float-right">Regresar</button></a>
              </div>
            </div>
        </div>
    </div>

@endsection