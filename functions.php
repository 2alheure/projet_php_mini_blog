<?php

/**
 * Crée un résumé pour un article.
 * 
 * @param Article $article L'article duquel créer le résumé
 * @return string Le résumé de l'article
 */
function resume(Article $article): string {
	$mots = explode(' ', $article->contenu);
	$mots_selectionnes = array_slice($mots, 0, 30);
	$resume = implode(' ', $mots_selectionnes);

	$resume .= '...';

	return $resume;
}


/**
 * Redirige l'utilisateur vers une autre URL
 * 
 * @param string $ou Vers où rediriger l'utilisateur
 */
function rediriger(string $ou) {
	header('location: ' . BASE_URL . $ou);
	die(); // On n'oublie pas de die() pour éviter les éventuelles instruction suivantes, indésirables
}


/**
 * Affiche les erreurs
 * 
 * @param array $erreurs Les erreurs à afficher
 */
function afficher_erreurs(array $erreurs) {
	foreach ($erreurs as $erreur) { ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Erreur</strong> <?php echo $erreur; ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
<?php }
}


/**
 * Formate une date en format français (jj/mm/aaaa)
 * 
 * @param string $date Le timestamp de la base de données
 * @return string La date correctement formatée
 */
function date_formatee(string $date): string {
	return date_format(date_create($date), 'd/m/Y');
}


/**
 * Affiche une page d'erreur
 */
function erreur() {
	header('HTTP/1.0 500 Internal Server Error');	// On modifie l'entête
	require DOSSIER_VIEWS . '/erreurs/generique.html.php';	// On affiche la vue d'erreur
	die();
}


/**
 * Affiche une page d'erreur 404
 */
function erreur404() {
	header('HTTP/1.0 404 Not Found');
	require DOSSIER_VIEWS . '/erreurs/404.html.php';
	die();
}
