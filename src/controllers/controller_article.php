<?php

require DOSSIER_MODELS . '/Article.php';

function afficher_liste_articles() {
	$articles = Article::all();
	require DOSSIER_VIEWS . '/article/liste.html.php';
}
