<?php

require DOSSIER_MODELS . '/Article.php';
require DOSSIER_MODELS . '/Commentaire.php';

function verifier_post_article(array $post = []): array {
	$erreurs = [];	// Je vais renvoyer un tableau d'erreurs (vide par défaut)

	if (empty($post['titre'])) {
		$erreurs[] = 'Le titre est obligatoire.'; // J'ajoute une erreur
	}

	if (empty($post['contenu'])) {
		$erreurs[] = 'Le contenu est obligatoire.';
	} elseif (strlen($post['contenu']) < 50) {
		$erreurs[] = 'Le contenu doit faire au moins 50 caractères.';
	}

	if (empty($post['image'])) {
		$erreurs[] = 'L\'image est obligatoire.';
	} elseif (filter_var($post['image'], FILTER_VALIDATE_URL) === false) {
		$erreurs[] = 'L\'image doit être une URL.';
	}

	if (empty($post['auteur'])) {
		$erreurs[] = 'L\'auteur est obligatoire.';
	}

	return $erreurs;
}

function construire_article_avec_post(array $post): Article {
	$article = new Article;

	$article->titre = $post['titre'];
	$article->contenu = $post['contenu'];
	$article->image = $post['image'];
	$article->auteur = $post['auteur'];

	if (!empty($post['date'])) $article->date_de_publication = $post['date'];
	else $article->date_de_publication = date('Y-m-d H:i:s');	// On est obligés de saisir une date

	return $article;
}

/****** Actions ******/
function afficher_liste_articles() {
	$articles = Article::all();
	require DOSSIER_VIEWS . '/article/liste.html.php';
}

function afficher_details_article() {
	if (!isset($_GET['id'])) {
		erreur404();
	}

	$article = Article::retrieveByPK($_GET['id']);
	$commentaires = Commentaire::retrieveByField('id_article', $_GET['id'], SimpleOrm::FETCH_MANY);
	require DOSSIER_VIEWS . '/article/details.html.php';
}

function creer_article() {
	if (isset($_SESSION['utilisateur']->role) && $_SESSION['utilisateur']->role == 'admin') {
		// Le traitement est réservé à l'admin
		if (!empty($_POST)) {
			// Si le $_POST n'est pas vide, ça veut dire que le formulaire a été envoyé

			// On vérifie le $_POST
			$erreurs = verifier_post_article($_POST);


			if (empty($erreurs)) {
				// S'il n'y a pas d'erreur

				// On crée un nouvel article
				$article = construire_article_avec_post($_POST);
				$article->save();

				// On redirige
				rediriger('/details-article?id=' . $article->id);
			}
		}

		require DOSSIER_VIEWS . '/article/creer.html.php';
	} else {
		erreur();
	}
}

function modifier_article() {
	if (isset($_SESSION['utilisateur']->role) && $_SESSION['utilisateur']->role == 'admin') {
		// Le traitement est réservé à l'admin

		if (empty($_GET['id'])) {
			// Si on n'a pas d'id, la page ne peut pas fonctionner
			erreur404();
		}

		// On récupère l'article
		$article = Article::retrieveByPK($_GET['id']);

		if (!empty($_POST)) {
			// Si le $_POST n'est pas vide, ça veut dire que le formulaire a été envoyé

			// On vérifie le $_POST
			$erreurs = verifier_post_article($_POST);


			if (empty($erreurs)) {
				// S'il n'y a pas d'erreur

				// On effectue les modification
				$article->titre = $_POST['titre'];
				$article->contenu = $_POST['contenu'];
				$article->image = $_POST['image'];
				$article->auteur = $_POST['auteur'];
				if (!empty($_POST['date'])) $article->date_de_publication = $_POST['date'];

				$article->save();

				// On redirige
				rediriger('/details-article?id=' . $article->id);
			}
		}

		require DOSSIER_VIEWS . '/article/modifier.html.php';
	} else {
		erreur();
	}
}

function supprimer_article() {
	if (isset($_SESSION['utilisateur']->role) && $_SESSION['utilisateur']->role == 'admin') {
		// Le traitement est réservé à l'admin

		if (empty($_GET['id'])) {
			// Si on n'a pas d'id, la page ne peut pas fonctionner
			erreur404();
		}

		// On récupère l'article
		$article = Article::retrieveByPK($_GET['id']);
		// On le supprime
		$article->delete();

		// On redirige
		rediriger('/liste-articles');
	} else {
		erreur();
	}
}
