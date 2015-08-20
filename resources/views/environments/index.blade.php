@extends('app')

@section('page-title', 'List Environments')

@section('panel-heading', 'Environments' )

@section('content')


    @foreach ($environments as $environment)

    <ul>
    	<li><a href="{{ url('/environments', $environment->id) }}">{{ $environment->name }}</a></li>

    </ul>

	@endforeach	


@endsection