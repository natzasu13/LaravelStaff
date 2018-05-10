
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
<h3>Sugerencias del Evento</h3>

 	<hr>
 	<br>
		

	<div id="tablaSugerencias" class="table-responsive" style="padding-top: 45px;" >
	<table class="table table-bordered">
			<tr class="heading">
					<th>ID</th>
					<th>Usuario Registrado</th>
					<th>Aplicación</th>
					<th>Sugerencias</th>
				</tr>
			</thead>
			@foreach($suggestions as $suggestion)
				<tbody>
					<tr>
						<td>{{$suggestion->id}}</td>
						<td>{{$suggestion->getPosterUsername()->name}}</td>
						<td>{{$suggestion->application}}</td>
						<td>{{$suggestion->suggestion}}</td>
					
					</tr>
				</tbody>				
			@endforeach
		</table>
		{!!$suggestions->render()!!}
	</div>


</div>
@endsection




