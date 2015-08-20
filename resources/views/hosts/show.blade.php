@extends('app')

@section('page-title', 'Show Host')

@section('panel-heading', 'Host'  )

@section('content')



<div class="row" style="margin-bottom: 20px;">
	<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-lx-4">
		<b>Hostname :</b> {{ $host->hostname }}<br>
        <b>OS :</b> {{ $host->os_type }}<br>
        <b>Version :</b> {{ $host->os_version }}<br>
        <b>Revision :</b> {{ $host->os_revision }}<br>
        <b>In Service :</b> {{ $host->inservice_date }}<br>
        <b>Contacts :</b> {{ $host->contacts }}<br>
	</div>
	<div class="col-xs-6 col-sm-8 col-md-8 col-lg-8 col-lx-8">
        <b>CPUs :</b> {{ $host->cpus}}<br>
        <b>Cores :</b> {{ $host->cores }}<br>
        <b>Memory :</b> {{ $host->memory }} MB<br>   
        <b>Speed :</b> {{ $host->speed }} Mhz<br>
        <b>Stroage :</b> {{ $host->storage }} GB<br>  
	</div>
  </div>


	<div class="panel panel-default">
		<div class="panel-heading">IP Interfaces</div>

		<div class="table-responsive">
		    <table class="table">
		        <thead>
		        	<tr>
		                <th>Name</th>
		                <th>IP</th>
		            	<th>DNS Name</th>
		            </tr>
		        </thead>		        
		        <tbody>
		        	
		       	@foreach ($host->ipinterfaces as $ipinterface)

		            <tr>
		                <td>{{ $ipinterface->name }}</td>
		                <td>{{ $ipinterface->ip }}</td>
		                <td>{{ $ipinterface->dns_name }}</td>
		            </tr>

		        @endforeach

		        </tbody>
		    </table>
		</div>
	</div>	






	<div class="panel panel-default">
		<div class="panel-heading">Applications</div>

		<div class="table-responsive">
		    <table class="table">
		        <thead>
		        	<tr>
		                <th>Name</th>
		                <th>Environment</th>
		            	<th>Url</th>
		            	<th>Dev Team</th>
		            	<th>Business Unit</th>
		            </tr>
		        </thead>		        
		        <tbody>

		       	@foreach ($host->applications as $application)

		            <tr>
		                <td><a href="{{ route('applications.show', $application->id)}}">{{ $application->name}}</a></td>
		                <td><a href="{{ route('environments.show', $application->environment->id)}}">{{ $application->environment->name}}</a></td>
		                <td><a target="_blank" href="{{ $application->url }}">{{ $application->url }}</a></td>
		                <td><a href="{{ route('devteams.show', $application->devteam->id)}}">{{ $application->devteam->name}}</a></td>
		                <td><a href="{{ route('businesses.show', $application->business->id)}}">{{ $application->business->name}}</a></td>
		            </tr>

		        @endforeach

		        </tbody>
		    </table>
		</div>
	</div>	



	<div class="panel panel-default">
		<div class="panel-heading">Notes</div>
<div style="white-space: pre-wrap; padding: 20px;">{{ $host->notes }}</div>
	</div>	

	<div class="pull-right">
		<a href="{{ route('hosts.edit', ['id' => $host->id]) }}" class="btn btn-default submitButtonWidth" role="button">Edit</a> 
	</div>	


                   
@endsection