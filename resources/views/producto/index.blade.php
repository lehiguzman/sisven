@extends('home')

@section('contenido')	
    <div class="content">
        <div class="container-fluid">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">                   
                  <div class="card-header card-header-icon">
                    <div class="card-icon text-center shadow">                      
                      <i class="fas fa-id-card-alt" style='font-size:64px; color:#41B1A7;'> </i><br>
                      <h4 class="card-title">Productos</h4>
                    </div>                    
                    <a href="{{ route('productos.create') }}" class="btn btn-primary" style="float: center;">
                        <i class="fas fa-plus"> Nuevo</i>
                    </a>
                    <div>
                      @if(Session::has('message'))
                        <br>
                        <div class="alert alert-info" role="alert">{{ Session::get('message') }}</div>  
                      @endif
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-primary">
                          <tr align="center">
                          <th>
                            Nombre
                          </th>
                          <th style="border: none;" width="10%"></th>
                          <th style="border: none;" width="10%"></th>
                          <th style="border: none;" width="10%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        	@foreach($productos as $producto)
                          <tr>
                            <td class="text-center">
                              {{ $producto->nombre }}
                            </td>           
                             <td style="border: none;" class="text-center">
                                <a href="{{ route('productos.show' , $producto->id) }}" class="btn btn-info">
                                  <i class="fas fa-eye"> Ver</i>
                                </a>
                            </td> 
                            <td style="border: none;" class="text-center">
                              <a href="{{ route('productos.edit' , $producto->id) }}" class="btn btn-success">
                                <i class="fas fa-pencil-alt"> Editar</i>
                              </a>
                            </td>  
                            <td style="border: none;" class="text-center">
                              {!! Form::open(['route' => ['productos.destroy' , $producto->id], 'method' => 'DELETE']) !!}
                                <button type="button" class="btn btn-danger" onclick="if(confirm('¿Desea borrar el Producto?')) { this.type = 'submit'; }"><i class="fas fa-trash-alt"> Eliminar</i></button>
                              {!! Form::close() !!}
                            </td>                                                      
                          </td>
                          </tr>
                          	@endforeach   
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection