<nav id="myNavbar" class="navbar navbar-default navbar-fixed-top shadow" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href= {{ action('HomeController@showHome') }}>PS4Play</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="nav navbar-nav">
				 <li class="dropdown">
					<a href="#" data-toggle="dropdown" class="dropdown-toggle">Games<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li> {{HTML::linkAction('GameController@action', 'Action')}} </li>
						<li> {{HTML::linkAction('GameController@adventure', 'Adventure')}} </li>
						<li> {{HTML::linkAction('GameController@rolePlaying', 'Role Playing')}} </li>
						<li> {{HTML::linkAction('GameController@sports', 'Sports')}} </li>
					</ul>
				
					@yield('navbar')

			</ul>
			    <ul class="nav navbar-nav navbar-right">
					<li>					
						<a href= {{ action('CustomerController@showCart') }}>
							<i class="fa fa-shopping-cart fa-2x"></i>
						</a>
					</li>
				 </ul>
			</ul>
		</div>
	</div>
</nav>