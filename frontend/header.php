<?php include 'authentication.php'?>
  <nav class="navbar navbar-default main-header">
	<div class="container-fluid">
	  <div class="col-xs-2">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		  <span class="sr-only">Toggle navigation</span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		</button>
		<a class="navbar-brand pull-right" href="/">Home</a>
	  </div>
	  <div class="col-xs-4 row">
		<form class="navbar-form col-xs-12" role="search" style="padding: 0; width: 100%;">
		 <div class="input-group" style="width:100%;">
			<input placeholder="Search" type="text" class="form-control">
			<span class="input-group-btn"><button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button></span>
		  </div>
		</form>
	  </div>
	  <div class="col-xs-6 row" >
		<ul class="nav navbar-nav pull-right row">
		  <li class="nav navbar-nav text-center"><a href="/frontend/list_project.php?category=All">Showcase<span class="sr-only">(current)</span></a></li>
		  <li class="nav navbar-nav text-center" id="my-projects-nav"><a href="#">My projects</a></li>
		  <li class="nav navbar-nav text-center" id="your-account-nav"><a href="#">Your account</a></li>
			<li class="nav navbar-nav dropdown" id="login-dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li id="signin-button"><a href="/frontend/signin.php"> Signin here </a></li>
						<li id="singup-button"><a href="/frontend/signup.php"> Signup here </a></li>
						<li id="signout-button"><a href="/frontend/signin.php"> Signin here </a></li>
					</ul>
			</li>
		</ul>
	  </div>

	</div>
</nav>
<script src="/frontend/js/header.js"></script>
