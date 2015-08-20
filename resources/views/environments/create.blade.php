@extends('app')

@section('page-title', 'Create Environment')

@section('panel-heading', 'Add New Environment')

@section('content')

{{-- TODO: This div has to be included in each 'content' section when using a form
There has to be a better way. This keeps the form fields from streaching full
page.  This was pulled from the main template becuase for the 'show' pages
I do was to use the full screen, so we are only passing this div in templates 
containing forms.  --}} 
<div class="col-xs-12 col-sm-8 col-sm-offset-1 col-md-6 col-md-offset-1 col-lg-4 col-lg-offset-1">

	{!! Form::open(array('route' => 'environments.store')) !!}


		{{-- Include shared form partial --}}
		@include('environments/_form', ['submitButtonText' => 'Submit'])

	{!! Form::close() !!}


</div>

@endsection
                

