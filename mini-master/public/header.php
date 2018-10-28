
<!DOCTYPE html>
<html>
<head>
	<title>Responsive Collapse Plugin Demo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

	<link href="src/jquery.responsive-collapse.css" rel="stylesheet">
    <style>
    body { background-color:#fafafa; font-family:'Roboto';}
    h1 { margin:70px auto; text-align:center;}
    </style>
</head>

<body>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a href="#" class="navbar-brand">WebSite Logo</a>
		</div>
		<div class="navbar-collapse collapse navbar-right">
		        <ul class="nav navbar-nav">
				<li><a href="#"><i class="fa fa-link"></i> Item 1</a></li>
				<li><a href="#"><i class="fa fa-link"></i> Item 2</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-list"></i> Item 3 <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#">Item 3.1</a></li>
						<li><a href="#">Item 3.2</a></li>
						<li><a href="#">Item 3.3</a></li>
						<li><a href="#">Item 3.4</a></li>
					</ul>
				</li>
				<li><a href="#"><i class="fa fa-link"></i> Item 3</a></li>
				<li><a href="#"><i class="fa fa-link"></i> Item 4</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-list"></i> Item 5 <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#">Item 5.1</a></li>
						<li><a href="#">Item 5.2</a></li>
						<li><a href="#">Item 5.3</a></li>
						<li><a href="#">Item 5.4</a></li>
					</ul>
				</li>
				<li><a href="#"><i class="fa fa-link"></i> Item 6</a></li>
				<li><a href="#"><i class="fa fa-link"></i> Item 7</a></li>
				<li><a href="#"><i class="fa fa-link"></i> Item 8</a></li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> User <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#">Profile</a></li>
						<li class="divider"></li>
						<li><a href="#">Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
<h1>Responsive Collapse Plugin Demo</h1>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="src/jquery.responsive-collapse.js"></script>

<script type="text/javascript">
	$(window).load(function() {
   	     $('ul.navbar-nav').responsiveCollapse();
	});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
