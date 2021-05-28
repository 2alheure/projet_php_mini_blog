<?php

// Définition de mes constantes utiles
const BASE_URL = 'http://localhost/test/projet_php_mini_blog/router.php';
const ASSETS_URL = 'http://localhost/test/projet_php_mini_blog/assets';
const DOSSIER_MODELS = __DIR__ . '/src/models';
const DOSSIER_VIEWS = __DIR__ . '/views';
const DOSSIER_CONTROLLERS = __DIR__ . '/src/controllers';

// Connexion à la base de données
include __DIR__ . '/SimpleOrm.class.php';
$conn = new mysqli('localhost', 'root', '');
SimpleOrm::useConnection($conn, 'projet_php');

// Import de mes fonctions (si besoin)
require 'functions.php';

// On commence la session ici, comme ça on est sûr de l'avoir sur toutes nos pages
// Notre session contient un Utilisateur...
// Donc il nous faut son modèle
require DOSSIER_MODELS . '/Utilisateur.php';
session_start();

// Gestion de mes routes en fonction de mes URLs

if (!isset($_SERVER['PATH_INFO'])) {
	// S'il n'y a pas de segment d'URL après "router.php"
	// J'affiche la page d'accueil

	// J'inclus le controller
	require DOSSIER_CONTROLLERS . '/controller_accueil.php';
	// J'appelle la fonction du controller
	afficher_accueil();
} else {
	/**
	 * Pour la valeur du $_SERVER['PATH_INFO']
	 * Je pourrais faire des if ... elseif ... elseif ... etc
	 * Mais c'est trop lourd à écrire à mes yeux
	 * 
	 * Donc je pars sur un switch
	 */

	// if ($_SERVER['PATH_INFO'] == '/' || $_SERVER['PATH_INFO'] == '/accueil' || $_SERVER['PATH_INFO'] == '/home') {
	// 	// Si le segment d'URL qui suit "router.php" est "/", "/accueil" ou "/home"
	// 	// J'affiche la page d'accueil

	// 	// J'inclus le controller
	// 	require DOSSIER_CONTROLLERS . '/controller_accueil.php';
	// 	// J'appelle la fonction du controller
	// 	afficher_accueil();
	// } elseif ($_SERVER['PATH_INFO'] == '/liste-articles') {
	// 	// ...
	// }


	switch ($_SERVER['PATH_INFO']) {
		case '/':
		case '/accueil':
		case '/home':
			// Si le segment d'URL qui suit "router.php" est "/", "/accueil" ou "/home"
			// J'affiche la page d'accueil

			// J'inclus le controller
			require DOSSIER_CONTROLLERS . '/controller_accueil.php';
			// J'appelle la fonction du controller
			afficher_accueil();
			break;


		case '/liste-articles':
			require DOSSIER_CONTROLLERS . '/controller_article.php';
			afficher_liste_articles();
			break;


		case '/details-article':
			require DOSSIER_CONTROLLERS . '/controller_article.php';
			afficher_details_article();
			break;


		case '/ajouter-article':
			require DOSSIER_CONTROLLERS . '/controller_article.php';
			creer_article();
			break;


		case '/modifier-article':
			require DOSSIER_CONTROLLERS . '/controller_article.php';
			modifier_article();
			break;


		case '/supprimer-article':
			require DOSSIER_CONTROLLERS . '/controller_article.php';
			supprimer_article();
			break;


		case '/connexion':
			require DOSSIER_CONTROLLERS . '/controller_utilisateur.php';
			connexion();
			break;


		case '/deconnexion':
			require DOSSIER_CONTROLLERS . '/controller_utilisateur.php';
			deconnexion();
			break;


		case '/s-enregistrer':
			require DOSSIER_CONTROLLERS . '/controller_utilisateur.php';
			s_enregistrer();
			break;


		case '/poster-commentaire':
			require DOSSIER_CONTROLLERS . '/controller_commentaire.php';
			poster_commentaire();
			break;


		default:
			// Si aucune route ne correspond
			// On affiche une erreur 404
			erreur404();
	}
}
