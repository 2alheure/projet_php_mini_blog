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

    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>

<?php require DOSSIER_VIEWS . '/parties/bas_de_page.php'; ?>