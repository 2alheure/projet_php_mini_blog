<?php

require DOSSIER_MODELS . '/Utilisateur.php';

function verifier_post_connexion(array $post): array {
    $erreurs = [];    // Je vais renvoyer un tableau d'erreurs (vide par défaut)

    if (empty($post['login'])) {
        $erreurs[] = 'L\'identifiant est manquant.'; // J'ajoute une erreur
    }

    if (empty($post['password'])) {
        $erreurs[] = 'Le mot de passe est manquant.';
    }

    return $erreurs;
}

function verifier_post_enregistrement(array $post = []): array {
	$erreurs = [];	// Je vais renvoyer un tableau d'erreurs (vide par défaut)

	if (empty($post['pseudo'])) {
		$erreurs[] = 'Le pseudo est obligatoire.'; // J'ajoute une erreur
	}

	if (empty($post['password'])) {
		$erreurs[] = 'Le mot de passe est obligatoire.';
	} elseif (strlen($post['password']) < 8) {
		$erreurs[] = 'Le mot de passe doit faire au moins 8 caractères.';
	}

	if (empty($post['password-conf'])) {
		$erreurs[] = 'Le mot de passe de confirmation est obligatoire.';
	} elseif ($post['password'] !== $post['password-conf']) {
		$erreurs[] = 'Les mots de passe doivent correspondre.';
	}

	if (empty($post['avatar'])) {
		$erreurs[] = 'L\'avatar est obligatoire.';
	} elseif (filter_var($post['avatar'], FILTER_VALIDATE_URL) === false) {
		$erreurs[] = 'L\'avatar doit être une URL.';
	}

	if (empty($post['login'])) {
		$erreurs[] = 'L\'identifiant est obligatoire.';
	}

	return $erreurs;
}

function construire_utilisateur_avec_post(array $post): Utilisateur {
	$utilisateur = new Utilisateur;

	$utilisateur->pseudo = $post['pseudo'];
	$utilisateur->avatar = $post['avatar'];
	$utilisateur->identifiant = $post['login'];
	$utilisateur->mot_de_passe = password_hash($post['password'], PASSWORD_BCRYPT); // On n'oublie pas de hasher le mot de passe !
	$utilisateur->role = null;


	return $utilisateur;
}

/****** Actions ******/
function connexion() {
    if (!empty($_POST)) {
        // Si le $_POST n'est pas vide, ça veut dire que le formulaire a été envoyé

        // On vérifie le $_POST
        $erreurs = verifier_post_connexion($_POST);


        if (empty($erreurs)) {
            // S'il n'y a pas d'erreur

            // On récupère l'utilisateur par son identifiant
            $utilisateur = Utilisateur::retrieveByField('identifiant', $_POST['login'], SimpleOrm::FETCH_ONE);

            if ($utilisateur !== null) {
                // Si l'utilisateur a été trouvé (différent de null)

                if (password_verify($_POST['password'], $utilisateur->mot_de_passe)) {
                    // On utilise password_verify pour voir
                    // Si le mot de passe saisi correspond
                    // Au mot de passe de l'utilisateur qu'on a récupéré de la BDD
                    // Qui est hashé

                    // On démarre une session
                    session_start();
                    // On y stocke notre utilisateur
                    $_SESSION['utilisateur'] = $utilisateur;

                    // On redirige
                    rediriger('/accueil');
                } else {
                    $erreurs[] = 'Mauvais mot de passe.';
                }
            } else {
                $erreurs[] = 'Cet identifiant n\'existe pas.';
            }
        }
    }

    require DOSSIER_VIEWS . '/utilisateur/connexion.html.php';
}

function deconnexion() {
    // Pour pouvoir détruire une session...
    // Il faut qu'elle existe
    session_start();
    session_destroy();

    rediriger('/accueil');
}

function s_enregistrer() {
    if (!empty($_POST)) {
        // Si le $_POST n'est pas vide, ça veut dire que le formulaire a été envoyé

        // On vérifie le $_POST
        $erreurs = verifier_post_enregistrement($_POST);


        if (empty($erreurs)) {
            // S'il n'y a pas d'erreur

            // On crée un nouvel utilisateur
            $utilisateur = construire_utilisateur_avec_post($_POST);
            $utilisateur->save();

            // On redirige
            rediriger('/connexion');
        }
    }

    require DOSSIER_VIEWS . '/utilisateur/enregistrement.html.php';
}
