@extends('app')

@section('page-title', 'Hosts')

@section('panel-heading', 'Hosts' )

@section('content')


<div>
    <table id="hosts-table" class="table table-striped table-condensed" width="100%">
        <thead>
            <tr>
                <th>Hostname</th>
                <th>OS</th>
                <th>Version</th>
                <th>Revision</th>
                <th>CPUs</th>
                <th>Cores</th>
                <th>Speed Mhz</th>
                <th>Memory MB</th>
                <th>Storage MB</th>
            </tr>
        </thead>
    </table>
</div>


    <div class="pull-right margin-top-lg">
      <a class="btn btn-default" href="/excel/export/hosts"><i class="fa fa-file-excel-o fa-lg fa-border"></i> Export</a>
    </div>

   



<script type="text/javascript">

$(document).ready(function () {
    $('#hosts-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '{{ url("datatable/hosts") }}',
        columns: [
            {data: 'hostname', name: 'hostname'},
            {data: 'os_type', name: 'os_type'},
            {data: 'os_version', name: 'os_version'},
            {data: 'os_revision', name: 'os_revision'},
            {data: 'cpus', name: 'cpus'},
            {data: 'cores', name: 'cores'},
            {data: 'speed', name: 'speed'},
            {data: 'memory', name: 'memory'},
            {data: 'storage', name: 'storage'}
        ]
    });
} );

</script>


@endsection
                
