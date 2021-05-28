<?php require DOSSIER_VIEWS . '/parties/haut_de_page.php'; ?>


<div class="container-fluid">
	<img src="<?php echo $article->image; ?>" alt="Image d'illustration de l'article" class="img-fluid" />
</div>
<small>Publié le <?php echo date_formatee($article->date_de_publication); ?> par <?php echo $article->auteur; ?></small>

<p>
	<a href="<?php echo BASE_URL . '/modifier-article?id=' . $article->id; ?>" class="btn btn-primary">Modifier</a>
	<a href="<?php echo BASE_URL . '/supprimer-article?id=' . $article->id; ?>" class="btn btn-danger">Supprimer</a>
</p>

<h1 class="mb-4"><?php echo $article->titre; ?></h1>

<p><?php echo $article->contenu; ?></p>

<?php require DOSSIER_VIEWS . '/parties/bas_de_page.php'; ?>