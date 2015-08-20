	<nav class="navbar navbar-default navbar-inverse role="navigation>
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">InventoryDB</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				<ul class="nav navbar-nav">

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hosts<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li>
	                       		<a href="{{ route('hosts.index') }}">List</a>
	                        </li>
						</ul>
					</li>
				</ul>

				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Applications<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li>
	                        	{{-- <a href="{{ url('/applications') }}">List</a> --}}
	                        	<a href="{{ route('applications.index') }}">List</a>
	                        </li>
	                        <li>
	                            <a href="{{ route('applications.create') }}">Add New</a>
	                        </li>
						</ul>
					</li>
				</ul>

				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dev Teams<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li>
	                        	<a href="{{ route('devteams.index') }}">List</a>
	                        </li>
	                        <li>
	                            <a href="{{ route('devteams.create') }}">Add New</a>
	                        </li>
						</ul>
					</li>
				</ul>

				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Business Units<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li>
	                        	<a href="{{ route('businesses.index') }}">List</a>
	                        </li>
	                        <li>
	                            <a href="{{ route('businesses.create') }}">Add New</a>
	                        </li>
						</ul>
					</li>
				</ul>

				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Environments<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li>
	                        	<a href="{{ route('environments.index') }}">List</a>
	                        </li>
	                        <li>
	                            <a href="{{ route('environments.create') }}">Add New</a>
	                        </li>
						</ul>
					</li>
				</ul>				

				<ul class="nav navbar-nav navbar-right">

					{{-- Login and registration links will be include in the top navbar if user is not logged in --}}
					@if (Auth::guest())
						<li><a href="{{ secure_url('/auth/login') }}">Login</a></li> 

					{{-- User profile links will be included in the top navbar if user is logged in --}}
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> {{ Auth::user()->firstname }}  {{ Auth::user()->lastname }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li>
                                <a href="{{ secure_url('/profile') }}"><i class="glyphicon glyphicon-user"></i> Profile</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ secure_url('/auth/logout') }}"><i class="glyphicon glyphicon-off"></i> Log Out</a>
                                </li>
							</ul>
						</li>
					@endif


				</ul>
			</div>
		</div>
	</nav>