@extends('app')

@section('page-title', 'Show Environment')

@section('panel-heading', 'Environment'  )

@section('content')


	<div style="margin-bottom: 20px;">
    <b>Name : </b> {{ $environment->name }}<br>
    <b>Description : </b> {{ $environment->description }}<br>
	</div>

	<div class="panel panel-default">
			<div class="panel-heading">Applications</div>

			<div class="table-responsive">
			    <table class="table">
			        <thead><tr>
			                <td>Name</td>
			                <td>Dev Team</td>
			                <td>Url</td>
			                <td>Business Unit</td>
			            </tr>
			        </thead>		        
			        <tbody>

			       	@foreach ($applications as $application)

			            <tr>
			                <td><a href="{{ route('applications.show', $application->id)}}">{{ $application->name}}</a></td>
			                <td><a href="{{ route('devteams.show', $application->devteam->id)}}">{{ $application->devteam->name}}</a></td>
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
<div style="white-space: pre-wrap; padding: 20px;">{{ $environment->notes }}</div>
	</div>	

	<div class="pull-right">
		<a href="{{ route('environments.edit', ['id' => $environment->id]) }}" class="btn btn-default submitButtonWidth" role="button">Edit</a> 
	</div>	


                   
@endsection