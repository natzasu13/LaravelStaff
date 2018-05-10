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
<h3>Crear Itinerario</h3>
 	<hr>
 	<br>


{!!Form::open(['route'=>'itinerarios.store', 'method'=>'POST'])!!} 

     <div class="row">
		  	<div class="col-md-3">
			   {!!Form::label('Fecha')!!} 
			  {{--  {!!Form::text('scheduled_time',null, ['class'=>'form-control timepicker ', 'placeholder'=>'YYYY-MM-DD HH:mm:ss'])!!} --}}
			  {{--   <input type="date"  name="scheduled_time" value="{{ \Carbon\Carbon::createFromDate($current->year,$current->month,$current->day)->format('Y-m-d')}}" /> --}}
		    
			<input type="datetime-local" id="scheduled_time" name="scheduled_time" max="3000-12-31" 
			        min="1000-01-01" class="form-control" placeholder="2018-05-02 11:30:00" required="">
			</div>

		    <div class="col-md-3">
			  	{!!Form::label('Persona a Cargo')!!} 
				{!!Form::text('person_in_charge',null , ['class'=>'form-control', 'placeholder'=>'Persona a Cargo','required'])!!}

			  </div>
			<div class="col-md-3">
			  	{!!Form::label('Locación')!!} 
			    {!!Form::text('location',null, ['class'=>'form-control', 'placeholder'=>'Locación','required'])!!}
		    </div>
		    <div class="col-md-3">
			  	{!!Form::label('Nombre Itinerario')!!} 
			    {!!Form::text('name',null, ['class'=>'form-control', 'placeholder'=>'Nombre Itinerario','required'])!!}
		    </div>
			
		  </div>

		  <div class="row">
		  <div class="col-md-3">
			  	{!!Form::label('Descripción')!!} 
			    {!!Form::text('description',null, ['class'=>'form-control', 'placeholder'=>'Descripción Itinerario','required'])!!}

		    </div>
		      <div class="col-md-3">
			  	{!!Form::label('Evento')!!} 
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
  <div class="row" style="padding-top: 20px;">

</script>  
{!!Form::submit('Crear Itinerario', ['class'=>'btn btn-primary'])!!} 

{!!Form::close()!!} 
</div>

@section('scripts')
        <script >
            $(function () {
            	alert('hola5');
                $('#scheduled_time').datetimepicker({
                	locale: 'es',
                	format: 'DD/MM/YYYY'
                });
                //$('#datetimepicker1').data("DateTimePicker").FUNCTION()
            });
        </script>

        <script type="text/javascript">

    $('#scheduled_time').datetimepicker({
    format: 'yyyy-mm-dd hh:ii'
});
@endsection	



@stop