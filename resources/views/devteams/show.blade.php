@extends('app')

@section('page-title', 'Show Dev Team')

@section('panel-heading', 'Dev Team'  )

@section('content')


	<div style="margin-bottom: 20px;">
    <b>Name : </b> {{ $devteam->name }}<br>
    <b>Iteration Manager : </b> {{ $devteam->manager }}<br>
    <b>Team Email : </b> <a href="mailto:{{ $devteam->email }}">{{ $devteam->email }}</a><br>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">Applications</div>

		<div class="table-responsive">
		    <table class="table">
		        <thead>
		        	<tr>
		                <td>Name</td>
		                <td>Environment</td>
		            	<td>Url</td>
		            	<td>Business Unit</td>
		            </tr>
		        </thead>		        
		        <tbody>

		       	@foreach ($applications as $application)

		            <tr>
		                <td><a href="{{ route('applications.show', $application->id)}}">{{ $application->name}}</a></td>
		                <td><a href="{{ route('environments.show', $application->environment->id)}}">{{ $application->environment->name}}</a></td>
		                <td><a target="_blank" href="{{ $application->url }}">{{ $application->url }}</a></td>
		                <td><a href="{{ route('businesses.show', $application->business->id)}}">{{ $application->business->name}}</a></td>
		            </tr>

		        @endforeach

		        </tbody>
		    </table>
		</div>
	</div>	



	<div class="panel panel-default">
		<div class="panel-heading">Notes</div>
<div style="white-space: pre-wrap; padding: 20px;">{{ $devteam->notes }}</div>
	</div>	

	<div class="pull-right">
		<a href="{{ route('devteams.edit', ['id' => $devteam->id]) }}" class="btn btn-default submitButtonWidth" role="button">Edit</a> 
	</div>	


                   
@endsection