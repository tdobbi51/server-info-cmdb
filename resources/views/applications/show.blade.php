@extends('app')

@section('page-title', 'Show Application')

@section('panel-heading', 'Show Application'  )

@section('content')

	<div style="margin-bottom: 20px;">
		<b>Name : </b> {{ $application->name }}<br>
		<b>Environment : </b> <a href="{{ route('environments.show',  $application->environment->id) }}">{{ $application->environment->name }}</a><br>	
	    <b>Url : </b> <a target="_blank" href="{{ $application->url }}">{{ $application->url }}</a> <br>
	    <b>Description : </b> {{ $application->description }}<br>	
	    <b>Dev Team :</b> <a href="{{ route('devteams.show', $application->devteam->id)}}">{{ $application->devteam->name}}</a><br>
	    <b>Business :</b> <a href="{{ route('businesses.show',  $application->business->id)}}">{{ $application->business->name}}</a><br>
    </div>


	<div class="panel panel-default">
		<div class="panel-heading">Hosts</div>

		<div class="table-responsive">
		    <table class="table">
		        <thead>
		        	<tr>
		                <td>Name</td>
		            	<td>OS</td>
		            	<td>Memory</td>
		            	<td>CPUS</td>
		            	<td>Cores</td>
		            	<td>Speed</td>
		            	<td>Storage</td>
		            </tr>
		        </thead>		        
		        <tbody>

		       	@foreach ($application->hosts as $host)
		            <tr>
		                <td><a href="{{ route('hosts.show', $host->id)}}">{{ $host->hostname}}</a></td>
		                <td>{{ $host->os_version }} {{ $host->os_revision }}</td>
		                <td>{{ $host->memory }}MB</td>
		                <td>{{ $host->cpus }}</td>
		                <td>{{ $host->cores }}</td>
		                <td>{{ $host->speed }}Mhz</td>
		                <td>{{ $host->storage }}GB</td>		            
		            </tr>
		        @endforeach

		        </tbody>
		    </table>
		</div>
	</div>	    


	<div class="panel panel-default">
		<div class="panel-heading">Notes</div>
		<div style="white-space: pre-wrap; padding: 20px;">{{ $application->notes }}</div>
	</div>	



	<a href="{{ route('applications.edit', ['id' => $application->id]) }}" class="btn btn-default submitButtonWidth pull-right" role="button">Edit</a> 

            
@endsection