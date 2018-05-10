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

<div style="padding-left: 20px;">
	

<h3>Usuarios Registrados a los Eventos</h3>

 	<div id="filtros" style="padding-top: 25px;" class="row">
{!!Form::open(['route'=>'usuario.index', 'method'=>'GET'])!!} 

       <div class="form-group col-sm-2">
         {!!Form::label('Nombre')!!} 
		 {!!Form::text('name',null, ['class'=>'form-control', 'placeholder'=>'Nombre de Usuario'])!!}
        </div>
       <div class="form-group col-sm-2">
         {!!Form::label('Correo')!!} 
		 {!!Form::text('email',null, ['class'=>'form-control', 'placeholder'=>'Email de Usuario'])!!}
        </div>
        <div class="form-group col-sm-2">
         {!!Form::label('Celular')!!} 
		 {!!Form::text('cellphone',null, ['class'=>'form-control', 'placeholder'=>'Celular del Usuario'])!!}
        </div>
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

{!!Form::close()!!} 

 	</div>

	<div id="tablaUsuariosRegistrados" style="padding-top: 45px;" >
		<table class="table" >
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Evento</th>
					<th>Correo</th>
					<th>Celular</th>
					<th>Confirmado</th>
					{{--<th>Operaciones</th>--}}
				</tr>
			</thead>
			@foreach($users as $user)
				<tbody>
					<tr>
						<td>{{$user->id}}</td>
						<td>{{$user->name}}</td>
						<td></td>
						<td>{{$user->email}}</td>
						<td>{{$user->phone}}</td>
				        <td> {!!link_to_route('usuario.edit', $title='Confirmar asistencia', $parameters = $user->id, $attributes=['class'=>'btn btn-primary'])!!} </td>
					    

					    {{--<td>{!!Form::checkbox('asap',null,null, array('id'=>'asap'))!!}</td>--}}
					    {{--<td> {!!Form::select('type', config('options.types'), null,['class'=>'form-control'])!!}</td>--}}
				        {{--<td> {!!link_to_route('usuario.edit', $title='Editar', $parameters = $user->id, $attributes=['class'=>'btn btn-primary'])!!} </td>--}}
					</tr>
				</tbody>
			@endforeach
		</table>
		{!!$users->render()!!}

	</div>
</div>

@stop