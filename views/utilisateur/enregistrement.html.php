<?php require DOSSIER_VIEWS . '/parties/haut_de_page.php'; ?>

<h1>Se connecter</h1>

<?php if (!empty($erreurs)) afficher_erreurs($erreurs); ?>

<form action="" method="POST">
    <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Pseudo" required autofocus>
    </div>

    <div class="form-group">
        <label for="login">Identifiant</label>
        <input type="text" class="form-control" name="login" id="login" placeholder="Identifiant" required>
    </div>

    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" minlength="8" required>
    </div>

    <div class="form-group">
        <label for="password-conf">Confirmation du mot de passe</label>
        <input type="password" class="form-control" name="password-conf" id="password-conf" placeholder="Confirmation du mot de passe" required>
    </div>

    <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="url" class="form-control" name="avatar" id="avatar" placeholder="Avatar" required>
    </div>

    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>
<p>Vous avez déjà un compte ? <a href="<?php echo BASE_URL . '/connexion'; ?>">Connectez-vous !</a></p>

<?php require DOSSIER_VIEWS . '/parties/bas_de_page.php'; ?>