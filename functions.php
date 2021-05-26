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
