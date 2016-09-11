  <nav class="navbar navbar-default" style="border-radius:0;">
	<div class="container-fluid">
	  <div class="col-xs-2">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		  <span class="sr-only">Toggle navigation</span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		</button>
		<a class="navbar-brand pull-right" href="#">Brand</a>
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
		<ul class="nav navbar-nav pull-right col-xs-6 row">
		  <li class="active col-xs-3 text-center"><a href="#">Link <span class="sr-only">(current)</span></a></li>
		  <li class="col-xs-3 text-center"><a href="#">Link</a></li>
<?php
if (false) {
	echo '<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Your account <span class="caret"></span></a>
		<ul class="dropdown-menu">
		<li><a href="#">Profile</a></li>
		<li><a href="#">Something</a></li>
		<li><a href="#">Something else here</a></li>
		<li role="separator" class="divider"></li>
		<li><a href="#">Log out</a></li>
		</ul>
		</li>';
}
else {
	echo '<li class="col-xs-3 text-center"><a href="#">Login</a></li>';
}
?>
		</ul>
	  </div>

	</div>
</nav>

