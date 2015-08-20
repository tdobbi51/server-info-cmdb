@extends('app')

@section('page-title', 'User Profile')

@section('panel-heading', 'User Profile for ' . $user->username )

@section('content')

    <b>Uid</b> {{ $user->username }}<br>
    <b>First name</b> {{ $user->firstname }}<br>
    <b>Last name</b> {{ $user->lastname }}<br>
    <b>email</b> {{ $user->email }}<br>
                    
@endsection
                