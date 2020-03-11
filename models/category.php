<?php

//extends = héritage


class Category extends Database {

    //attributs
    //(seront utilisés lorsque l'on récupèrera des données à partir du formulaire)
    public $id;
    public $name;

    /**
     * Connexion à la base de données
     * Le constructeur hérite du __construct de la classe PARENT
     * Si je ne créé pas le __construct() et le __destruct(), j'en ai besoin pour définir les CLASSES FILLES
     */
    public function __construct() {
        parent::__construct();
    }

    public function __destruct() {
        parent::__destruct();
    }

    public function getCategories() {
        //Définition de la requête SQL
        $sql = 'SELECT `id`, `name` FROM `c19v12_categories`';

        //Soumission de la requête au serveur de la base de données
        $results = $this->db->query($sql);

        //récupération de la liste des clients sous forme d'un tableau d'objets
        return $results->fetchAll(PDO::FETCH_OBJ);
    }

}
