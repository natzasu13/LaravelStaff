
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
<h3>Itinerarios Eventos</h3>
 	<hr>
 	<br>
		{!!Form::open(['route'=>'itinerarios.index', 'method'=>'GET'])!!} 
		  <div class="row">
		    <div class="col-md-3">
			  	{!!Form::label('Persona a Cargo')!!} 
				{!!Form::text('person_in_charge',null, ['class'=>'form-control', 'placeholder'=>'Persona a Cargo'])!!}
			  </div>
			<div class="col-md-3">
			  	{!!Form::label('Locación')!!} 
			    {!!Form::text('location',null, ['class'=>'form-control', 'placeholder'=>'Locación'])!!}
		    </div>
			<div class="col-md-3" style="padding-top: 30px;">
		    	{{ Form::submit('Buscar', array('class' => 'btn')) }}
		    </div>
		  </div>

		{!!Form::close()!!} 

	<div id="tablaUsuariosRegistrados" class="table-responsive" style="padding-top: 45px;" >
	<table class="table table-bordered">
	
			<tr class="heading">
			
					<th>ID</th>
					<th>Fecha</th>
					<th>Nombre</th>
					<th>Locación</th>
					<th>Descripción</th>
					<th>Persona a Cargo</th>
					<th>Evento</th>
					<th>Estado</th>
					<th>Editar</th>
				</tr>
			</thead>
			@foreach($itineraries as $itinerarie)
				<tbody>
					<tr>
						<td>{{$itinerarie->id}}</td>
						<td>{{$itinerarie->scheduled_time}}</td>
						<td>{{$itinerarie->name}}</td>
						<td>{{$itinerarie->location}}</td>
						<td>{{$itinerarie->description}}</td>
						<td>{{$itinerarie->person_in_charge}}</td>
						<td>{{$itinerarie->getPosterEventname()->name}}</td>
						<td>{{$itinerarie->status}}</td>
				        <td> {!!link_to_route('itinerarios.edit', $title='Editar', $parameters = $itinerarie->id, $attributes=['class'=>'btn btn-primary'])!!} </td>
					</tr>
				</tbody>
				
			@endforeach
		</table>
	{!!$itineraries->render()!!}
	</div>
   
</div>
@endsection




