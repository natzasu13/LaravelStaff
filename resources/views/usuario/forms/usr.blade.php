    {!!Form::label('Nombre')!!} 
	{!!Form::text('nameInput',null, ['class'=>'form-control', 'placeholder'=>'Ingrese el Nombre'])!!}

	{!!Form::label('Apellido')!!} 
	{!!Form::text('lastnameInput',null, ['class'=>'form-control', 'placeholder'=>'Ingrese el Apellido'])!!}

	{!!Form::label('Correo')!!} 
	{!!Form::text('emailInput',null, ['class'=>'form-control', 'placeholder'=>'Ingrese su Email'])!!}

	{!!Form::label('Contraseña')!!} 
	{!!Form::password('passwordInput', ['class'=>'form-control', 'placeholder'=>'Ingrese la contraseña'])!!}
