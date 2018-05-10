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
<h3>Crear Usuario</h3>
 	<hr>
 	<br>

<?php /**var_dump($events); */?>

{!!Form::open(['route'=>'asistentesEvento.store', 'method'=>'POST'])!!} 

		  <div class="row">
		  	<div class="col-md-3">
			  	{!!Form::label('Nombre')!!} 
			    {!!Form::text('name',null, ['class'=>'form-control', 'placeholder'=>'Nombre Usuario', 'required'])!!}
		    </div>
		    <div class="col-md-3">
			  	{!!Form::label('Celular')!!} 
				{!!Form::text('phone',null, ['class'=>'form-control', 'placeholder'=>'Celular o Teléfono', 'required'])!!}
			  </div>
			    <div class="col-md-3">
			  	{!!Form::label('Correo')!!} 
				{!!Form::text('email',null, ['class'=>'form-control', 'placeholder'=>'Correo', 'required'])!!}
			  </div>
			<div class="col-md-3">
			  	{!!Form::label('Nombre Contacto')!!} 
			    {!!Form::text('contact_name',null, ['class'=>'form-control', 'placeholder'=>'Nombre de Contacto'])!!}
		    </div>
		   
		   
		  </div>

		  <div class="row">
 <div class="col-md-3">
     		  	{!!Form::label('País')!!} 
			    {!!Form::text('country',null, ['class'=>'form-control', 'placeholder'=>'País','required'])!!}
	    </div>
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
		{!!Form::submit('Guardar', ['class'=>'btn btn-primary'])!!} 

		{!!Form::close()!!} 
 </div>





 </div>



@stop


