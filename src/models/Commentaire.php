<?php

class Commentaire extends SimpleOrm {
    public $id;
    public $id_utilisateur;
    public $id_article;
    public $contenu;
    public $date_publication;
}