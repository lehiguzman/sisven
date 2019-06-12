@extends('home')

@section('contenido')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <b>Ver sección registrada</b>
              </div>
              <div class="card-body">   
                <p class="card-text">    
                <p><strong>Nombre : </strong>{{ $section->nombre }}</p>                  
                <p><strong>Observación : </strong>{{ $section->observacion }}</p>                 
                <br>
                    <a href="{{ route('sections.index') }}"><button type="button" class="btn btn-primary float-right">Regresar</button></a>
              </div>
            </div>
        </div>
    </div>

@endsection