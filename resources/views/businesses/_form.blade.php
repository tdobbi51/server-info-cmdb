
{{-- Shared form fields for Businesses --}}



<div class="form-group">

	{!! Form::label('name', 'Name: ') !!}

	{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Business Unit Name']) !!}

</div>

<div class="form-group"> 

  {!! Form::label('description', 'Description: ') !!}

  {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Short Description', 'rows' => '2']) !!}

</div>

<div class="form-group">

	{!! Form::label('contact', 'Contact Person:') !!}

	{!! Form::text('contact', null, ['class' => 'form-control', 'placeholder' => 'First and Last Name']) !!}
	
</div>

<div class="form-group">

	{!! Form::label('email', 'Contact Email: ') !!}

	{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'email@premierinc.com']) !!}
	
</div>

<div class="form-group">

	{!! Form::label('notes', 'Notes: ') !!}

	{!! Form::textarea('notes', null, ['class' => 'form-control', 'placeholder' => 'Optional Notes']) !!}
	
</div>

<button type="Submit" class="btn btn-default pull-right">{!! $submitButtonText !!}</button>
