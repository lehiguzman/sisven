@extends('home')

@section('contenido')
	<div class="row">
		<div class="col-md-12">
			<div class="card">
  				<div class="card-header">
  					<div class="card-icon text-center">                      
                    	<img src="{{ asset('img/icons/baseline-perm_contact_calendar-24px.svg')}}" width="50px" height="50px"> <br>
                    	<h4 class="card-title ">Registro de nueva Inventario</h4>
                	</div> 
  					<div class="card-body">   
    					<p class="card-text">		
							{!! Form::open(['route' => 'inventarios.store']) !!}

								@include('inventario.partials.form')
      
							{!! Form::close() !!}
    					</p>
    					<br>
		  			</div>  
				</div>
			</div>
		</div>
	</div>
@endsection