<?php

require DOSSIER_MODELS . '/Commentaire.php';

function poster_commentaire() {
    if (empty($_GET['id'])) erreur();

    if (isset($_SESSION['utilisateur'])) {
        // Le traitement est réservé à un utilisateur connecté
        if (!empty($_POST)) {
            // Si le $_POST n'est pas vide, ça veut dire que le formulaire a été envoyé

            // On vérifie le $_POST
            if (empty($_POST['commentaire'])) $erreurs = ['Le contenu est obligatoire.'];

            if (empty($erreurs)) {
                // S'il n'y a pas d'erreur

                // On crée un nouvel article
                $comm = new Commentaire;
                $comm->contenu = $_POST['commentaire'];
                $comm->date_publication = date('Y-m-d H:i:s');    // On met une date au bon format (format MySQL)
                $comm->save();
            }
        }
    }
    rediriger('/details-article?id=' . $_GET['id']);
}
