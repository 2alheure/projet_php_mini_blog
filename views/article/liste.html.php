<?php require DOSSIER_VIEWS . '/parties/haut_de_page.php'; ?>

<h1>Mes super articles</h1>
<div class="list-group my-4">

	<?php
	foreach ($articles as $article) { ?>
		<article class="list-group-item list-group-item-action">
			<div class="d-flex w-100 justify-content-between">
				<h2 class="mb-1"><?php echo $article->titre; ?></h2>
				<small class="text-muted">Le <?php echo date('d/m/Y', intval($article->date_de_publication)); ?></small>
			</div>
			<p class="mb-1"><?php echo resume($article); ?></p>
			<small class="text-muted"><a href="<?php echo BASE_URL . '/details-article?id=' . $article->id; ?>">Lire l'article.</a></small>
		</article>
	<?php } ?>

</div>

<?php require DOSSIER_VIEWS . '/parties/bas_de_page.php'; ?>