
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
<h3>Registrar Usuarios a los Eventos</h3>

 	<hr>
 	<br>
		{!!Form::open(['route'=>'usuarioEvento.index', 'method'=>'GET'])!!} 
		  <div class="row">
		    <div class="col-md-6">
	     	   {!!Form::label('Nombre')!!} 
			   {!!Form::text('name',null, ['class'=>'form-control', 'placeholder'=>'Nombre de Usuario'])!!}
			   </div>
		  {{--
			 <div class="col-md-3">
			  	{!!Form::label('Correo')!!} 
				{!!Form::text('email',null, ['class'=>'form-control', 'placeholder'=>'Email de Usuario'])!!}
			  </div>
			<div class="col-md-3">
			  	{!!Form::label('Celular')!!} 
			    {!!Form::text('phone',null, ['class'=>'form-control', 'placeholder'=>'Celular del Usuario'])!!}
		    </div>
		  --}}  
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

	<div id="tablaUsuariosRegistrados" class="table-responsive" style="padding-top: 45px;" >
	<table class="table table-bordered">
	
			<tr class="heading">
					<th>ID</th>
					<th>Nombre</th>
					<th>Evento</th>
					<th>Correo</th>
					<th>Celular</th>
					<th>Estado</th>
					<th>Confirmado</th>
					{{--<th>Operaciones</th>--}}
				</tr>
			</thead>
			@foreach($userEvents as $user)
				<tbody>
					<tr>
						
						<td>{{$user->getPosterUsername()->id}}</td>
						<td>{{$user->getPosterUsername()->name}}</td>
						<td>{{$user->getPosterEventname()}}</td>
						<td>{{$user->getPosterUsername()->email}}</td>
						<td>{{$user->getPosterUsername()->phone}}</td>
					    <td>{{$user->getPosterStags()->name}}</td>
				        <td> {!!link_to_route('usuarioEvento.edit', $title='Registro de Entrada', $parameters = $user->id, $attributes=['class'=>'btn btn-primary'])!!} </td>
				  		{{--<td>{!!Form::checkbox('asap',null,null, array('id'=>'asap'))!!}</td>--}}
					    {{--<td> {!!Form::select('type', config('options.types'), null,['class'=>'form-control'])!!}</td>--}}
				        {{--<td> {!!link_to_route('usuarioEvento.edit', $title='Editar', $parameters = $user->id, $attributes=['class'=>'btn btn-primary'])!!} </td>--}}
					</tr>
				</tbody>
				
			@endforeach
		</table>
		{!!$userEvents->render()!!}
	</div>



   
</div>
@endsection




