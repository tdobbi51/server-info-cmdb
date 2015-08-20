<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">


 	<link href="{{ elixir('css/app.css') }}" rel="stylesheet">
  	<script src="{{ elixir('js/app.js') }}"></script>


	<title>@yield('page-title')</title>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
      

</head>
<body>

	@include('_navbar')

	<div class="container-fluid">
	    <div class="row">
	        <div class="col-md-12">
	            <div class="panel panel-default">

	            	{{-- panel-heading section of template is injected here --}}
	                <div class="panel-heading">@yield('panel-heading')</div>


	                <div class="panel-body">


	                    @if (count($errors) > 0)
	                        <div class="alert alert-danger">
	                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
	                            <ul>
	                                @foreach ($errors->all() as $error)
	                                    <li>{{ $error }}</li>
	                                @endforeach
	                            </ul>
	                        </div>
	                    @endif
							
						@yield('content')

				
	                </div>
	            </div>
	        </div>
	    </div>
	</div>




</body>
</html>
