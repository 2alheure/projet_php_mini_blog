<?php

// Définition de mes constantes utiles
const BASE_URL = 'http://localhost2/formawave_fil_rouge/dwwm6/projet_php_mini_blog/router.php';
const DOSSIER_VIEWS = __DIR__ . '/views';
const DOSSIER_CONTROLLERS = __DIR__ . '/src/controllers';


// Import de mes fonctions (si besoin)
require 'functions.php';


// Gestion de mes routes en fonction de mes URLs


if (!isset($_SERVER['PATH_INFO'])) {
	// S'il n'y a pas de segment d'URL après "router.php"
	// J'affiche la page d'accueil

	// J'inclus le controller
	require DOSSIER_CONTROLLERS . '/controller_accueil.php';
	// J'appelle la fonction du controller
	afficher_accueil();
}

if ($_SERVER['PATH_INFO'] == '/' || $_SERVER['PATH_INFO'] == '/accueil' || $_SERVER['PATH_INFO'] == '/home') {
	// Si le segment d'URL qui suit "router.php" est "/", "/accueil" ou "/home"
	// J'affiche la page d'accueil

	// J'inclus le controller
	require DOSSIER_CONTROLLERS . '/controller_accueil.php';
	// J'appelle la fonction du controller
	afficher_accueil();
}