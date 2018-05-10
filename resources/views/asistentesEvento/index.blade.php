
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
<h3>Asistentes al Evento</h3>
 	<hr>
 	<br>
		{!!Form::open(['route'=>'asistentesEvento.index', 'method'=>'GET'])!!} 
		  <div class="row">
		    <div class="col-md-3">
	     	   {!!Form::label('Nombre')!!} 
			   {!!Form::text('name',null, ['class'=>'form-control', 'placeholder'=>'Nombre de Usuario'])!!}
			 </div>
		     <div class="col-md-3">
			  	{!!Form::label('Correo')!!} 
				{!!Form::text('email',null, ['class'=>'form-control', 'placeholder'=>'Email de Usuario'])!!}
			</div>
			<div class="col-md-3">
			  	{!!Form::label('Celular')!!} 
			    {!!Form::text('phone',null, ['class'=>'form-control', 'placeholder'=>'Celular del Usuario'])!!}
		    </div>
			<div class="col-md-3" style="padding-top: 30px;">
		    	{{ Form::submit('Buscar', array('class' => 'btn')) }}
		    </div>
		  </div>
		{!!Form::close()!!} 

	<div id="tablaUsuariosRegistrados" class="table-responsive" style="padding-top: 45px;" >

{{--
 <table class="table table-bordered">
            <thead>
             <th>Nombre</th>
            </thead>
            <tbody>
		@foreach($users as $user)
		        <tr data-toggle="collapse" data-target="#{{ $user->id }}" class="accordion-toggle">
					<td style="background-color: #EFF2FB;"><b>Id: {{$user->id}} - {{$user->name}} {{$user->lastname}}  </b></td>
		        </tr>
		        <tr>
		            <td colspan="6" class="hiddenRow" >
		                <div id="{{ $user->id }}" class="accordion-body collapse" >
		                <b>Celular :</b> {{$user->phone}}
		                <br>
		                <b>Email: </b>{{$user->email}}
						<br>
		                 <b>Contacto:</b> {{$user->contact_name}}
		                <br>
		                 <b>Teléfono Contacto: </b>{{$user->contact_phone}}
           				<br>
		                 <b>Parentesco:</b> {{$user->contact_kin}}
		                </div>
		            </td>
		        </tr>
		    @endforeach
            </tbody>
        </table>
	--}}




 <table class="table table-bordered">
            <thead>
            <th>ID</th>
             <th>Nombre</th>
              <th>Celular</th>
               <th>Email</th>
                <th>Contacto</th>
                 <th>Teléfono de Contacto</th>
                  <th>Parentesco</th>
                    <th>Editar</th>
            </thead>
            <tbody>
	@foreach($users as $user)
				<tbody>
					<tr>
						<td>{{$user->id}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->phone}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->contact_name}}</td>
						<td>{{$user->contact_phone}}</td>
						<td> {{$user->contact_kin}}</td>
				        <td> {!!link_to_route('asistentesEvento.edit', $title='Editar', $parameters = $user->id, $attributes=['class'=>'btn btn-primary'])!!} </td>
					</tr>
				</tbody>
				
			@endforeach
            </tbody>
        </table>
        {!!$users->render()!!}
	</div>
</div>
@endsection






