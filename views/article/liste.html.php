<?php require DOSSIER_VIEWS . '/parties/haut_de_page.php'; ?>

<h1>Mes super articles</h1>
<div class="list-group my-4">

	<?php
	foreach ($articles as $article) { ?>
		<article class="list-group-item list-group-item-action">
			<div class="d-flex w-100 justify-content-between">
				<h2 class="mb-1"><?php echo $article->titre; ?></h2>
				<small class="text-muted">Le <?php echo date_formatee($article->date_de_publication); ?></small>
			</div>
			<p class="mb-1"><?php echo resume($article); ?></p>
			<small class="text-muted"><a href="<?php echo BASE_URL . '/details-article?id=' . $article->id; ?>">Lire l'article.</a></small>
			<?php if (isset($_SESSION['utilisateur']->role) && $_SESSION['utilisateur']->role == 'admin') { ?>
				<p class="m-0 mt-3">
					<a href="<?php echo BASE_URL . '/modifier-article?id=' . $article->id; ?>" class="btn btn-primary">Modifier</a>
					<a href="<?php echo BASE_URL . '/supprimer-article?id=' . $article->id; ?>" class="btn btn-danger">Supprimer</a>
				</p>
			<?php } ?>
		</article>
	<?php } ?>

</div>

<?php require DOSSIER_VIEWS . '/parties/bas_de_page.php'; ?>