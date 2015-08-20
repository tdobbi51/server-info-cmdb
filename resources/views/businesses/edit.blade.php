@extends('app')

@section('page-title', 'Edit Business Unit')

@section('panel-heading', 'Edit Business Unit' )

@section('content')

{{-- TODO: This div has to be included in each 'content' section when using a form
There has to be a better way. This keeps the form fields from streaching full
page.  This was pulled from the main template becuase for the 'show' pages
I do was to use the full screen, so we are only passing this div in templates 
containing forms.  --}} 
<div class="col-xs-12 col-sm-8 col-sm-offset-1 col-md-6 col-md-offset-1 col-lg-4 col-lg-offset-1">



	{!! Form::model( $business, ['method' => 'PATCH', 'route' => ['businesses.update', $business->id]]) !!}

		{{-- Include shared form partial --}}
		@include('businesses/_form', ['submitButtonText' => 'Update'])


	{!! Form::close() !!}



		{{-- Delete the record --}}
	{!! Form::open(['method' => 'DELETE', 'route' => ['businesses.destroy', $business->id]]) !!}

		<div class="form-group">
		    <button class="btn btn-danger" type="button" data-toggle="modal" 
			    data-target="#confirmDelete" data-title="Are you sure?" 
			    data-message="Delete {{ $business->name }} Business Unit?">
			    <i class="glyphicon glyphicon-trash"></i> Delete
		    </button>
		</dev>	

	{!! Form::close() !!}

	{{-- Include the delete confirmation modal --}}
	@include('deleteConfirmationModal')


</div>
@endsection 

