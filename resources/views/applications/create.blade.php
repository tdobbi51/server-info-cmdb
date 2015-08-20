@extends('app')

@section('page-title', 'Create Application')

@section('panel-heading', 'Add New Application' )

@section('content')
{{-- TODO: This div has to be included in each 'content' section when using a form
There has to be a better way. This keeps the form fields from streaching full
page.  This was pulled from the main template becuase for the 'show' pages
I do was to use the full screen, so we are only passing this div in templates 
containing forms.  --}} 
<div class="col-xs-12 col-sm-8 col-sm-offset-1 col-md-6 col-md-offset-1 col-lg-4 col-lg-offset-1">


	{!! Form::open(array('route' => 'applications.store', 'id' => 'applications')) !!}

		{{-- Include shared form partial --}}
		@include('applications/_form', ['submitButtonText' => 'Save'])
	    
	{!! Form::close() !!}


</div>


{{-- Include the jquery required by the form --}}
{{-- <script src="{{ asset('js/applications.js') }}"></script> --}}
@include('applications/js')
	
@endsection
                
