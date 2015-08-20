@extends('app')

@section('page-title', 'List Businesses')

@section('panel-heading', 'Businesses' )

@section('content')


<div>
	<table id="businesses-table" class="table table-striped table-condensed" width="80%">
	    <thead>
		    <tr>
			    <th>Name</th>
			    <th>Contact</th>
			    <th>Email</th>
		    </tr>
	    </thead>
	</table>
</div>



<script type="text/javascript">

$(document).ready(function () {
    $('#businesses-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '{{ url("datatable/businesses") }}',
        columns: [
            {data: 'name', name: 'name'},
            {data: 'contact', name: 'contact'},
            {data: 'email', name: 'email'},
        ]
    });
} );

</script>



@endsection