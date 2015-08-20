@extends('app')

@section('page-title', 'List Devteams')

@section('panel-heading', 'Devteams' )

@section('content')


<div>
	<table id="devteams-table" class="table table-striped table-condensed" width="80%">
	    <thead>
		    <tr>
			    <th>Name</th>
			    <th>Iteration Manager</th>
			    <th>Email</th>
		    </tr>
	    </thead>
	</table>
</div>



<script type="text/javascript">

$(document).ready(function () {
    $('#devteams-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '{{ url("datatable/devteams") }}',
        columns: [
            {data: 'name', name: 'name'},
            {data: 'manager', name: 'manager'},
            {data: 'email', name: 'email'},
        ]
    });
} );

</script>



@endsection