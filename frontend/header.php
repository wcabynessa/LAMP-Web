<?php include 'authentication.php'?>
  <nav class="navbar navbar-default main-header">
	<div class="container-fluid">
	  <div class="col-xs-1">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		  <span class="sr-only">Toggle navigation</span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		</button>
		<a class="navbar-brand pull-right" href="/">Home</a>
	  </div>
	  <div class="col-xs-11 row" >
		<ul class="nav navbar-nav pull-right row">
		  <li class="nav navbar-nav text-center" id="create-projects-nav"><a href="/frontend/create_project.php">Create projects</a></li>
		  <li class="nav navbar-nav text-center"><a href="/frontend/list_project.php?category=All">Showcase<span class="sr-only">(current)</span></a></li>
		  <li class="nav navbar-nav text-center" id="my-projects-nav"><a href="/frontend/profile.php">My projects</a></li>
		  <li class="nav navbar-nav text-center" id="signout-nav"><a id="signout-button" href="#">Sign out</a></li>
			<li class="nav navbar-nav dropdown" id="login-dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li id="signin-button"><a href="/frontend/signin.php"> Signin here </a></li>
						<li id="signup-button"><a href="/frontend/signup.php"> Signup here </a></li>

					</ul>
			</li>
		</ul>
	  </div>

	</div>
</nav>
<script src="/frontend/js/header.js"></script>
