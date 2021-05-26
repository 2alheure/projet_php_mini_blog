<?php

require DOSSIER_MODELS . '/Article.php';

function afficher_liste_articles() {
	$articles = Article::all();
	require DOSSIER_VIEWS . '/article/liste.html.php';
}

function afficher_details_article() {
	if (!isset($_GET['id'])) {
		die();
	}

	$article = Article::retrieveByPK($_GET['id']);
	require DOSSIER_VIEWS . '/article/details.html.php';
}
