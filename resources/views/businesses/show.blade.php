@extends('app')

@section('page-title', 'Show Business Unit')

@section('panel-heading', 'Business Unit' )

@section('content')


	<div style="margin-bottom: 20px;">
    <b>Name : </b> {{ $business->name }}<br>
    <b>Description : </b> {{ $business->description }}<br>
    <b>Contact Person : </b> {{ $business->contact }}<br>
    <b>Email : </b> <a href="mailto:{{ $business->email }}">{{ $business->email }}</a><br>
	</div>

	<div class="panel panel-default">
			<div class="panel-heading">Applications</div>

			<div class="table-responsive">
			    <table class="table">
			        <thead><tr>
			                <td>Name</td>
			                <td>Environment</td>
			                <td>Dev Team</td>
			            </tr>
			        </thead>		        
			        <tbody>

			       	@foreach ($applications as $application)

			            <tr>
			                <td><a href="{{ route('applications.show', $application->id)}}">{{ $application->name}}</a></td>
			                <td>{{ $application->environment->name }}</td>
			                <td><a href="{{ route('devteams.show', $application->devteam->id)}}">{{ $application->devteam->name}}</a></td>
			            </tr>

			        @endforeach

			        </tbody>
			    </table>
			</div>

	</div>	



	<div class="panel panel-default">
		<div class="panel-heading">Notes</div>
<div style="white-space: pre-wrap; padding: 20px;">{{ $business->notes }}</div>
	</div>	

	<div class="pull-right">
		<a href="{{ route('businesses.edit', ['id' => $business->id]) }}" class="btn btn-default submitButtonWidth" role="button">Edit</a> 
	</div>	


                   
@endsection