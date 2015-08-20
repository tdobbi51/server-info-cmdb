@extends('app')

@section('page-title', 'Users')

@section('panel-heading', 'Registered Users' )

@section('content')

	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr><th>Username</th><th>Firstname</th><th>Lastname</th><th>Email</th><th>LastLogin</th></tr>
			</thead>
			<tbody>
	    	@foreach ($users as $user)
	    		<tr><td>{{ $user->username }}</td>
	    			<td>{{ $user->firstname }}</td>
	    			<td>{{ $user->lastname }}</td>
	    			<td>{{ $user->email }}</td>
	    			<td>{{ $user->last_login }}</td>
	    		</tr>
			@endforeach	
			</tbody>
		</table>
	</div>
@endsection
				