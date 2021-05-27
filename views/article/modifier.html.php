<?php require DOSSIER_VIEWS . '/parties/haut_de_page.php'; ?>

<h1>Ajouter un article</h1>

<?php if (!empty($erreurs)) afficher_erreurs($erreurs); ?>

<form action="" method="POST">
    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" class="form-control" name="titre" value="<?php echo $article->titre; ?>" id="titre" placeholder="Titre" required autofocus>
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input type="url" class="form-control" name="image" value="<?php echo $article->image; ?>" id="image" placeholder="Image" required>
    </div>

    <div class="form-group">
        <label for="contenu">Contenu</label>
        <textarea class="form-control" name="contenu" id="contenu" rows="3" required minlength="50"><?php echo $article->contenu; ?></textarea>
    </div>

    <div class="form-group">
        <label for="date">Date</label>
        <input type="datetime-local" class="form-control" name="date" value="<?php echo $article->date_de_publication; ?>" id="date" placeholder="Date">
    </div>

    <div class="form-group">
        <label for="auteur">Auteur</label>
        <input type="text" class="form-control" name="auteur" value="<?php echo $article->auteur; ?>" id="auteur" placeholder="Auteur" required>
    </div>

    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

<?php require DOSSIER_VIEWS . '/parties/bas_de_page.php'; ?>