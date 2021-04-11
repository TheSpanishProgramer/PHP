<!DOCTYPE html>
<html lang="en">
	<head>
		@include('includes.head')
	</head>
	<body>
		<div id="wrap">
			<header>
				<nav class="navbar navbar-default navbar-fixed-top shadow nav-justified" role="navigation">
					<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->				
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="{{action('home')}}">PS4Play</a>
					</div>					
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="navbarCollapse">
						<ul class="nav navbar-nav">
				 			<li class="dropdown">
								<a href="#" data-toggle="dropdown" class="dropdown-toggle">
									Games <b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li>
										{{ HTML::linkAction('games', 'Action', array('action')) }}
									</li>
									<li>
										{{HTML::linkAction('games','Adventure',array('adventure')) }}
									</li>
									<li>
										{{HTML::linkAction('games','Role Playing',array('rpg'))}}
									</li>
							        <li>
							        	{{HTML::linkAction('games','Sports', array('sports'))}}
							        </li>
						       	</ul>
						    </li>
							@if (Auth::check()) 
								<li> 
									<a href="{{action('logout')}}" >
										Sign out
									</a> 
								</li>						
							@else 							
								<li> 
									<a href="{{action('CustomerController@signIn')}}" >
										Sign in
									</a> 
								</li>
								<li> 
									<a href="{{action('CustomerController@signUp')}}" >
										Sign up
									</a> 
								</li>
							@endif						
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li>					
								<a href="{{action('CartController@cart')}}" >
									<i class="fa fa-shopping-cart"></i>
								</a>
							</li>
				 		</ul>	
					</div>				
					<!--navbar container ends!-->
				</div>
			</nav>
		</header>		
		<!--body container begins!-->
		<div class="container">	
			@yield('content')			
	   	</div>
	   	</div>
		<!--body container ends!-->	
		{{ HTML::script('js/ps4play.min.js') }}

		@include('includes.footer')
	</body>
</html>
