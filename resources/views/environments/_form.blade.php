
{{-- Shared form fields for Environments --}}



<div class="form-group">

	{!! Form::label('name', 'Name: ') !!}

	{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}

</div>


<div class="form-group"> 

  {!! Form::label('description', 'Description: ') !!}

  {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Short Description', 'rows' => '2']) !!}

</div>

<div class="form-group">

	{!! Form::label('notes', 'Notes: ') !!}

	{!! Form::textarea('notes', null, ['class' => 'form-control', 'placeholder' => 'Optional Notes']) !!}
	
</div>

<button type="Submit" class="btn btn-default pull-right">{!! $submitButtonText !!}</button>
