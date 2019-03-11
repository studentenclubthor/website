<!DOCTYPE html>
<html>
<head>
	<title>studentenclub THOR</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap -->
	<link href="<?php echo URL; ?>css/bootstrap.css" rel="stylesheet">
	<script src="<?php echo URL; ?>js/jquery-1.12.4.min.js"></script>
	<script src="<?php echo URL; ?>js/bootstrap.js"></script>
	<link href="<?php echo URL; ?>css/myCss.css" rel="stylesheet">
	<link href="<?php echo URL; ?>css/jquery-timeline.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
	<div class="navbar-header">
		<a href="<?php echo URL; ?>" class="navbar-brand mt-auto"><img class="bannerLogo" src=<?php echo URL; ?>img/schild.png /></a>
		<a href="<?php echo URL; ?>" class="navbar-brand">Studentenclub THOR</a>
	</div>
	<button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target=".collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	<div class="navbar-collapse collapse justify-content-end">
		<ul class="navbar-nav">
			<li class="nav-item dropdown">
				<a class="nav-link" href="<?php echo URL; ?>login/test">t</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">De Club</a>
				<div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
					<a class="nav-link bg-dark" href="<?php echo URL; ?>club"><i class="fa fa-link"></i> Beginselen</a>
					<a class="nav-link bg-dark" href="<?php echo URL; ?>club/Praesidia"><i class="fa fa-link"></i> Praesidia</a>
					<a class="nav-link bg-dark" href="<?php echo URL; ?>club/Geschiedenis"><i class="fa fa-link"></i> Geschiedenis</a>
					<a class="nav-link bg-dark" href="<?php echo URL; ?>club/Jaarboeken"><i class="fa fa-link"></i> Jaarboeken</a>
					<a class="nav-link bg-dark" href="<?php echo URL; ?>club/Kiesboeken"><i class="fa fa-link"></i> Kiesboeken</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link bg-dark" href="<?php echo URL; ?>boom"><i class="fa fa-link"></i> Club boom</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-list"></i> Cantussen</a>
				<div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
					<a class="nav-link bg-dark" href="<?php echo URL; ?>Cantus"><i class="fa fa-link"></i> Liederenboekjes</a>
					<a class="nav-link bg-dark" href="<?php echo URL; ?>Cantus/liederen"><i class="fa fa-link"></i> Liederen</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-list"></i> Evenementen</a>
				<div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
					<a class="nav-link bg-dark" href="<?php echo URL; ?>Evenementen"><i class="fa fa-link"></i> Data</a>
					<a class="nav-link bg-dark" href="<?php echo URL; ?>Evenementen/fotos"><i class="fa fa-link"></i> Foto's</a>
					<a class="nav-link bg-dark" href="<?php echo URL; ?>Evenementen/thorDeLouvain"><i class="fa fa-link"></i> Thor de Louvain</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-list"></i> Algemeen</a>
				<div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
					<a class="nav-link bg-dark" href="<?php echo URL; ?>Algemeen"><i class="fa fa-link"></i> Statuten</a>
				</div>
			</li><?php if(isset($_COOKIE["thorsessionid"])){
				echo
				('<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-list"></i> Stem</a>
					<div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
						<a class="nav-link bg-dark" href="'. URL .'stem"><i class="fa fa-link"></i> stem</a>
					</div>
				</li>');
				if(AUTHENTICATED){echo
					('<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-list"></i> AA</a>
						<div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
							<a class="nav-link bg-dark" href="'. URL .'abactis"><i class="fa fa-link"></i> Persoon</a>
							<a class="nav-link bg-dark" href="'. URL .'abactis/peter"><i class="fa fa-link"></i> Peter - meters</a>
							<a class="nav-link bg-dark" href="'. URL .'abactis/aanwezig"><i class="fa fa-link"></i> Aanwezigheden</a>
							<a class="nav-link bg-dark" href="'. URL .'abactis/titel"><i class="fa fa-link"></i> Titels</a>
							<a class="nav-link bg-dark" href="'. URL .'abactis/Verslagen"><i class="fa fa-link"></i> Verslagen</a>
							<a class="nav-link bg-dark" href="'. URL .'abactis/Alumni"><i class="fa fa-link"></i> Alumni</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-list"></i> SM</a>
						<div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
							<a class="nav-link bg-dark" href="'. URL .'schachtenmeester"><i class="fa fa-link"></i> Schachten</a>
							<a class="nav-link bg-dark" href="'. URL .'schachtenmeester/Doop"><i class="fa fa-link"></i> Doop</a>
							<a class="nav-link bg-dark" href="'. URL .'schachtenmeester/Ontgroening"><i class="fa fa-link"></i> Ontgroening</a>
							<a class="nav-link bg-dark" href="'. URL .'schachtenmeester/Schachtencursus"><i class="fa fa-link"></i> Schachtencursus</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-list"></i> Q</a>
						<div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
							<a class="nav-link bg-dark" href='. URL .'quaestor"><i class="fa fa-link"></i> Schachten</a>
							<a class="nav-link bg-dark" href='. URL .'quaestor/Doop"><i class="fa fa-link"></i> Doop</a>
							<a class="nav-link bg-dark" href='. URL .'quaestor/Ontgroening"><i class="fa fa-link"></i> Ontgroening</a>
							<a class="nav-link bg-dark" href='. URL .'quaestor/Schachtencursus"><i class="fa fa-link"></i> Schachtencursus</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-list"></i> H</a>
						<div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
							<a class="nav-link bg-dark" href="'. URL .'Heimdall"><i class="fa fa-link"></i> Rangen</a>
							<a class="nav-link bg-dark" href="'. URL .'>Heimdall/Uitleg"><i class="fa fa-link"></i> Uitleg</a>
						</div>
					</li>');
				}
				echo
				('<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-user"></i> User</a>
					<div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
						<a class="nav-link bg-dark" href="'. URL .'user">Profile</a>');
						if(AUTHENTICATED){
							echo ('<a class="nav-link bg-dark" href="'. URL .'requests">requests</a>');
						}
						echo ('<a class="nav-link bg-dark" href="'. URL .'logout">Logout</a>
					</div>
				</li>');
			}
			else{
				echo ('<li class="nav-item">
						<a class="nav-link bg-dark" href='. URL .'login><i class="fa fa-link"></i> Login</a>
					</li>');
			}
			?>
		</ul>
	</div>
</nav>