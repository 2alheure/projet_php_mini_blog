<!doctype html>
<html lang="en">

<head>
	<title>Mon super blog</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container-fluid">
				<a class="navbar-brand" href="<?php echo BASE_URL; ?>">Mon super blog</a>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="<?php echo BASE_URL; ?>">Accueil</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo BASE_URL . '/liste-articles'; ?>">Liste des articles</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo BASE_URL . '/ajouter-article'; ?>">Ajouter un article</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo BASE_URL . '/connexion'; ?>">Se connecter</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>