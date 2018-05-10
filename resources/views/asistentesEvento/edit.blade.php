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
<h3>Editar Usuario Registrado</h3>
 	<hr>
 	<br>

<?php /**var_dump($events); */?>

{!!Form::model($user,['route'=> ['asistentesEvento.update', $user->id], 'method'=>'PUT'])!!} 
		  <div class="row">
		  	<div class="col-md-3">
			  	{!!Form::label('Nombre')!!} 
			    {!!Form::text('name',null, ['class'=>'form-control', 'placeholder'=>'Nombre Usuario'])!!}
		    </div>
		    <div class="col-md-3">
			  	{!!Form::label('Celular')!!} 
				{!!Form::text('phone',null, ['class'=>'form-control', 'placeholder'=>'Celular o Teléfono'])!!}
			  </div>
			    <div class="col-md-3">
			  	{!!Form::label('Correo')!!} 
				{!!Form::text('email',null, ['class'=>'form-control', 'placeholder'=>'Correo'])!!}
			  </div>
			<div class="col-md-3">
			  	{!!Form::label('Nombre Contacto')!!} 
			    {!!Form::text('contact_name',null, ['class'=>'form-control', 'placeholder'=>'Nombre de Contacto'])!!}
		    </div>
		   
		   
		  </div>

		  <div class="row">
 <div class="col-md-3">
			  	{!!Form::label('Teléfono Contacto')!!} 
			    {!!Form::text('contact_phone',null, ['class'=>'form-control', 'placeholder'=>'Teléfono Contacto'])!!}
		    </div>
		    <div class="col-md-3">
			  	{!!Form::label('Parentesco Contacto')!!} 
			    {!!Form::text('contact_kin',null, ['class'=>'form-control', 'placeholder'=>'Parentesco Contacto'])!!}
		    </div>	
		     
		  </div>


 <div class="row" style="padding-top: 30px;">
 	 <div class="col-md-3">
		{!!Form::submit('Actualizar', ['class'=>'btn btn-primary'])!!} 

		{!!Form::close()!!} 
 </div>

 <div class="col-md-3">

{!!Form::open(['route'=> ['asistentesEvento.destroy', $user->id], 'method'=>'DELETE'])!!} 
{!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!} 
{!!Form::close()!!} 
  </div>



 </div>



@stop


