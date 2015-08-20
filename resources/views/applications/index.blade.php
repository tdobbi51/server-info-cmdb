@extends('app')

@section('page-title', 'List Applications')

@section('panel-heading', 'Applications' )

@section('content')


<div>
	<table id="applications-table" class="table table-striped table-condensed" width="100%">
	    <thead>
		    <tr>
			    <th>Name</th>
			    <th>Environment</th>
			    <th>Dev Team</th>
			    <th>Business</th>
		    </tr>
	    </thead>
	</table>
</div>



<script type="text/javascript">

$(document).ready(function () {
    $('#applications-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '{{ url("datatable/applications") }}',
        columns: [
            {data: 'appname', name: 'applications.name'},
            {data: 'envname', name: 'environments.name'},
            {data: 'devname', name: 'devteams.name'},
            {data: 'busname', name: 'businesses.name'}

        ]
    });
} );

</script>



@endsection