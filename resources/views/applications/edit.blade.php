@extends('app')

@section('page-title', 'Edit Application')

@section('panel-heading', 'Edit Application')

@section('content')
{{-- TODO: This div has to be included in each 'content' section when using a form
There has to be a better way. This keeps the form fields from streaching full
page.  This was pulled from the main template becuase for the 'show' pages
I do was to use the full screen, so we are only passing this div in templates 
containing forms.  --}} 
<div class="col-xs-12 col-sm-8 col-sm-offset-1 col-md-6 col-md-offset-1 col-lg-4 col-lg-offset-1">


	 {!! Form::model( $application, [ 'id' => 'applications', 'method' => 'PATCH', 'route' => ['applications.update', $application->id]]) !!}

		{{-- Include shared form partial --}}
		@include('applications/_form', ['submitButtonText' => 'Update'])

	{!! Form::close() !!}



	{{-- Delete the record --}}
	{!! Form::open(['method' => 'DELETE', 'route' => ['applications.destroy', $application->id]]) !!}

		<div class="form-group">
		    <button class="btn btn-danger" type="button" data-toggle="modal" 
			    data-target="#confirmDelete" data-title="Are you sure?" 
			    data-message="Delete {{ $application->name }} Application?">
			    <i class="glyphicon glyphicon-trash"></i> Delete
		    </button>
		</dev>	

	{!! Form::close() !!}



	{{-- Include the delete confirmation modal --}}
	@include('deleteConfirmationModal')


</div>


@include('applications/js')


	
@endsection 



