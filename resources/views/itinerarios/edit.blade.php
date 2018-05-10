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
<h3>Editar Itinerarios</h3>
 	<hr>
 	<br>

<?php /**var_dump($events); */?>

{!!Form::model($itinerarie,['route'=> ['itinerarios.update', $itinerarie->id], 'method'=>'PUT'])!!} 
		  <div class="row">
		  	<div class="col-md-3">
			  	{!!Form::label('Fecha')!!} 
			    {!!Form::text('scheduled_time',null, ['class'=>'form-control', 'placeholder'=>'YYYY-MM-DD HH:mm:ss'])!!}
		    </div>
		    <div class="col-md-3">
			  	{!!Form::label('Persona a Cargo')!!} 
				{!!Form::text('person_in_charge',null, ['class'=>'form-control', 'placeholder'=>'Persona a Cargo'])!!}
			  </div>
			<div class="col-md-3">
			  	{!!Form::label('Locación')!!} 
			    {!!Form::text('location',null, ['class'=>'form-control', 'placeholder'=>'Locación'])!!}
		    </div>
		    <div class="col-md-3">
			  	{!!Form::label('Nombre Itinerario')!!} 
			    {!!Form::text('name',null, ['class'=>'form-control', 'placeholder'=>'Nombre Itinerario'])!!}
		    </div>
			
		  </div>

		  <div class="row">
		  <div class="col-md-3">
			  	{!!Form::label('Descripción')!!} 
			    {!!Form::text('description',null, ['class'=>'form-control', 'placeholder'=>'Descripción Itinerario'])!!}

		    </div>
		      <div class="col-md-3">
			  	{!!Form::label('Evento')!!} 
			  
			  		<?php /**print_r($events);  die();*/?>
					{!!Form::select('event_id', $events,null,['class'=>'form-control'])!!}		  	
	
		    </div>
		      <div class="col-md-3">
			  	{!!Form::label('Estado')!!} 
			    <select name="status" class="form-control">
					<option value="0">Inactivo</option>
					<option value="1" selected="selected">Activo</option>
				</select>
		    </div>
		  </div>


 <div class="row" style="padding-top: 30px;">
 	 <div class="col-md-3">
		{!!Form::submit('Actualizar', ['class'=>'btn btn-primary'])!!} 

		{!!Form::close()!!} 
 </div>

 <div class="col-md-3">

{!!Form::open(['route'=> ['itinerarios.destroy', $itinerarie->id], 'method'=>'DELETE'])!!} 
{!!Form::submit('Eliminar', ['class'=>'btn btn-danger'])!!} 
{!!Form::close()!!} 
  </div>


<script type="text/javascript">
   /** $('.scheduled_time').datepicker({  
       format: 'yyyy-mm-dd'
     }); */ 
</script>   
 </div>



@stop


