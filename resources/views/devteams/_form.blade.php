
{{-- Shared form fields for Devteams --}}



<div class="form-group">

	{!! Form::label('name', 'Name: ') !!}

	{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Dev Team Name']) !!}

</div>

<div class="form-group">

	{!! Form::label('manager', 'Iteration Manager:') !!}

	{!! Form::text('manager', null, ['class' => 'form-control', 'placeholder' => 'First and Last Name']) !!}
	
</div>

<div class="form-group">

	{!! Form::label('email', 'Team Email: ') !!}

	{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'email@premierinc.com']) !!}
	
</div>

<div class="form-group">

	{!! Form::label('notes', 'Notes: ') !!}

	{!! Form::textarea('notes', null, ['class' => 'form-control', 'placeholder' => 'Optional notes']) !!}
	
</div>

<button type="Submit" class="btn btn-default pull-right">{!! $submitButtonText !!}</button>
