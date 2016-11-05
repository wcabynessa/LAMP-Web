<?php include 'authentication.php'?>
  <nav class="navbar navbar-default main-header">
	<div class="container-fluid">
	  <div class="col-xs-2 row">
		<div class="nav navbar-nav pull-right row">
			<li class="nav navbar-nav text-center"><a class="navbar-brand pull-right" href="/">Home</a></li>
			<li class="nav navbar-nav text-center"><a class="pull-right" href="/frontend/list_project.php?category=All">All projects</a></li>
		</div>
	  </div>
	  <div class="col-xs-10 row" >
		<ul class="nav navbar-nav pull-right row">
		  <li class="nav navbar-nav text-center" id="create-projects-nav"><a href="/frontend/create_project.php">Create projects</a></li>
		  <li class="nav navbar-nav text-center" id="my-projects-nav"><a href="/frontend/profile.php">Admin</a></li>
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
