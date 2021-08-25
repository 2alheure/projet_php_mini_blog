<!doctype html>
<html lang="en">

<head>
	<title>Mon super blog</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="stylesheet" href="<?php echo ASSETS_URL . '/style.css'; ?>">
</head>

<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="<?php echo BASE_URL; ?>">Mon super blog</a>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo BASE_URL; ?>">Accueil</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo BASE_URL . '/liste-articles'; ?>">Liste des articles</a>
					</li>

					<?php
					if (isset($_SESSION['utilisateur'])) {
						// Si on a un utilisateur dans notre session,
						// Ca signifie que l'utilisateur est connecté
					?>
						<?php if (isset($_SESSION['utilisateur']->role) && $_SESSION['utilisateur']->role == 'admin') { ?>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo BASE_URL . '/ajouter-article'; ?>">Ajouter un article</a>
							</li>
						<?php } ?>

						<li class="nav-item">
							<a class="nav-link" href="<?php echo BASE_URL . '/deconnexion'; ?>">Se déconnecter</a>
						</li>
					<?php } else { ?>

						<li class="nav-item">
							<a class="nav-link" href="<?php echo BASE_URL . '/connexion'; ?>">Se connecter</a>
						</li>
					<?php } ?>
				</ul>

				<?php
				if (isset($_SESSION['utilisateur'])) {
					// Si on a un utilisateur dans notre session,
					// Ca signifie que l'utilisateur est connecté
				?>

					<p class="avatar my-2 text-light">
						<img src="<?php echo $_SESSION['utilisateur']->avatar; ?>" alt="Avatar de <?php echo $_SESSION['utilisateur']->pseudo; ?>"><?php echo $_SESSION['utilisateur']->pseudo; ?>
					</p>
				<?php } ?>
			</div>
		</nav>