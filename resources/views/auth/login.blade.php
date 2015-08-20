@extends('app')

@section('page-title', 'Login')

@section('panel-heading', 'Login')

@section('content')

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label class="col-md-4 control-label">UserID</label>
            <div class="col-md-6">
                <input type="username" class="form-control" name="username" value="{{ old('username') }}" autofocus>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Password</label>
            <div class="col-md-6">
                <input type="password" class="form-control" name="password">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </div>
    </form>

@endsection
