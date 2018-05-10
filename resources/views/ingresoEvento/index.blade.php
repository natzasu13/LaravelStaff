
@extends('layouts.admin')

<?php $message=Session::get('message')?>

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true">&times;</span>
</button>
{{Session::get('message')}}
</div>
@endif

@section('content')
<div class="container">
    <br>
<h3>Ingreso a los Eventos</h3>

 	<hr>
 	<br>
		{!!Form::open(['route'=>'ingresoEvento.index', 'method'=>'GET'])!!} 
		  <div class="row">
		    <div class="col-md-6">
	     	   {!!Form::label('Usuario')!!} 
			   {!!Form::text('name',null, ['class'=>'form-control', 'placeholder'=>'Nombre del Usuario'])!!}
			   </div>
		 
			<div class="col-md-3" style="padding-top: 30px;">
		    	{{ Form::submit('Buscar', array('class' => 'btn')) }}
		    </div>
		  </div>
	
	
		      {{--

		<div class="form-group col-sm-2">
		         {!!Form::label('Evento')!!} 
		          <select class="form-control" id="filtro-tipo">
		            <option value="">Tipo</option>
		            <option value="">Receita</option>
		            <option value="">Despesa</option>
		          </select>
		        </div>

		       
		        <div class="form-group col-sm-2" style="padding-top: 25px;">
		          <button type="submit" class="btn btn-primary">Buscar</button>
		        </div>
--}}  

		{!!Form::close()!!} 
	<a href="{{ url("config/page/excel")}}" class="btn btn-success btn-sm">Exportar Excel</a>

	<div id="tablaUsuariosRegistrados" class="table-responsive" style="padding-top: 45px;" >
	<table class="table table-bordered">
	
			<tr class="heading">
			
					<th>ID</th>
					<th>Nombre</th>
					<th>Evento</th>
					<th>Correo</th>
					<th>Celular</th>
					<th>Estado</th>
				</tr>
			</thead>
			@foreach($userEvents as $user)
				<tbody>
					<tr>
						
						<td>{{$user->getPosterUsername()->id}}</td>
						<td>{{$user->getPosterUsername()->name}} </td>
						<td>{{$user->getPosterEventname()}}</td>
						<td>{{$user->getPosterUsername()->email}}</td>
						<td>{{$user->getPosterUsername()->phone}}</td>
					    <td>{{$user->getPosterStags()->name}}</td>
					    
					</tr>
				</tbody>
				
			@endforeach
		</table>
		{!!$userEvents->render()!!}
	</div>


</div>
@endsection




