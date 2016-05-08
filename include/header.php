<?php
include 'include/classes/session.php';
session::start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-override.css">
	 <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
	<title></title>
</head>

<body>
	<header class="header">
		<nav class="navbar__top navbar navbar-default">
			<div class="container">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".menu__dropdown" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>


				<div class="menu__dropdown collapse navbar-collapse" aria-expanded="true">
					<ul class="navbar__links centered nav navbar-nav ">
					<?php 
					if(isset($_SESSION['admin_role'])){ ?>
						<li><a href="admin-panel.php"><span class='fa fa-sign-in fa-1x' aria-hidden='true'><b>Back to admin panel</b></span></a></li>
					<?php }
					?>
						<li><a href="index.php">Forside</a></li>
						<li><a href="#">Om Sunrise</a></li>
						<li><a href="#">Kompetencer</a></li>
						<li><a href="#">Cases</a></li>
						<li><a href="#">Kunder</a></li>
						<li><a href="#">Os på Sunrise</a></li>
						<li><a href="#">Jobs</a></li>
						<li><a href="#">Kontakter</a></li>
					</ul>
				</div>

			</div>

		</nav>
	</header>