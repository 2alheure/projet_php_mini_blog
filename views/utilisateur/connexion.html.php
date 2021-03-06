<?php require DOSSIER_VIEWS . '/parties/haut_de_page.php'; ?>

<h1>Se connecter</h1>

<?php if (!empty($erreurs)) afficher_erreurs($erreurs); ?>

<form action="" method="POST">
    <div class="form-group">
        <label for="login">Identifiant</label>
        <input type="text" class="form-control" name="login" id="login" placeholder="Identifiant" required autofocus>
    </div>

    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
    </div>

    <div class="form-check">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="souvenir" id="souvenir" value="oui">
            Se souvenir de moi
        </label>
    </div>

    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>
<p>Vous n'avez pas encore de compte ? <a href="<?php echo BASE_URL . '/s-enregistrer'; ?>">Créez-en un !</a></p>

<?php require DOSSIER_VIEWS . '/parties/bas_de_page.php'; ?>