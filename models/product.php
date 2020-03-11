<?php

//extends = héritage

class Product extends Database {

    public $pdo;
//attributs
//(seront utilisés lorsque l'on récupèrera des données à partir du formulaire) 
    public $id;
    public $name;
    public $reference;
    public $price;
    public $picture;
    public $id_c19v12_categories;
    public $formErrors = array();

    public function __construct() {
        $this->pdo = Database::getInstance(); // Création de l'instance de connexion
    }

    public function __destruct() {
        $this->pdo->db = NULL;
    }

    /*
     * Méthode démarrant une transaction SQL
     */

    public function beginTransaction() {
        return $this->pdo->db->beginTransaction();
    }

    /*
     * Méthode appliquant la transaction courante et rendant ses modifications permanentes
     */

    public function commit() {
        return $this->pdo->db->commit();
    }

    /*
     * Méthode faisant un rollback de la transaction courante et annulant ses modifications
     */

    public function rollBack() {
        return $this->pdo->db->rollBack();
    }

    /*
     * Method retournant l'id de la dernière rangée insérée en base de données
     */

    public function lastInsertId() {
        return $this->pdo->db->lastInsertId();
    }

    /* Méthode permettant d'insérer un nouveau patient dans la base de données
     * Renvoi TRUE si l'insertion est bien faite. Sinon renvoi FALSE en cas d'échec
     * @return boolean TRUE si succès sinon FALSE si échec
     */

    public function getProductList() {
        //Définition de la requête SQL
        $sql = 'SELECT `c19v12_products`.`id`,
            `c19v12_products`.`name` AS `productName`, 
            `c19v12_products`.`reference`,
            `c19v12_products`.`price`, 
            `c19v12_products`.`picture`, 
            `c19v12_categories`.`name` AS `categoryName`
                FROM `c19v12_products`
                INNER JOIN `c19v12_categories` ON `c19v12_categories`.`id` = `c19v12_products`.`id_c19v12_categories`';
        //Soumission de la requête au serveur de la base de données
        
        
        try {
            $results = $this->pdo->db->query($sql);
        } catch (Exception $e) {
            die('échec de la connexion :' . $e->getMessage());
        }

        return $results->fetchAll(PDO::FETCH_OBJ);
    }

    public function detailsProduct() {
        //Définition de la requête SQL
        $sql = 'SELECT `c19v12_categories`.`id`, 
            `c19v12_products`.`name` AS `productName`, 
            `c19v12_products`.`reference`, 
            `c19v12_products`.`price`, 
            `c19v12_products`.`picture`, 
            `c19v12_categories`.`name` AS `categoryName`,
            `c19v12_products`.`id_c19v12_categories` 
            FROM `c19v12_products`
                   INNER JOIN `c19v12_categories` ON `c19v12_categories`.`id` = `c19v12_products`.`id_c19v12_categories` 
                   WHERE `c19v12_products`.`id` = :id';
        //Soumission de la requête au serveur de la base de données
        $results = $this->pdo->db->prepare($sql);

        $results->bindValue(':id', $this->id, PDO::PARAM_INT);

        //Soumission de la requête au serveur de la base de données
        try {
        $results->execute();
        } catch (Exception $e) {
            die('échec de la connexion :' . $e->getMessage());
        }
        //récupération de la liste des clients sous forme d'un tableau d'objets
        return $results->fetch(PDO::FETCH_OBJ);
    }

    public function addProductBySupplier() {

        //Soumission de la requête au serveur de la base de données
        $results = $this->pdo->db->prepare('INSERT INTO `c19v12_products` (`name`, `reference`, `price`, `picture`, `id_c19v12_categories`)
                VALUES (:name, :reference, :price, :picture, :id_c19v12_categories)');
        // Associe une valeur à chaque marqueur nominatif de la requête
        $results->bindValue(':name', $this->name, PDO::PARAM_STR);
        $results->bindValue(':reference', $this->reference, PDO::PARAM_STR);
        $results->bindValue(':price', $this->price, PDO::PARAM_STR);
        $results->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $results->bindValue(':id_c19v12_categories', $this->id_c19v12_categories, PDO::PARAM_INT);

        // Exécution de la requête
        try {
            return $results->execute(); // Méthode execute() toujours avec prepare() sinon query()
        } catch (Exception $e) {
            die('échec de la connexion :' . $e->getMessage());
        }
    }

    public function getProfilProduct() {
        //Définition de la requête SQL
        $sql = 'SELECT `c19v12_categories`.`id`, 
            `c19v12_products`.`name` AS `productName`, 
            `c19v12_products`.`reference`, 
            `c19v12_products`.`price`, 
            `c19v12_products`.`picture`, 
            `c19v12_categories`.`name` AS `categoryName`,
            `c19v12_products`.`id_c19v12_categories` 
            FROM `c19v12_products`
                   INNER JOIN `c19v12_categories` ON `c19v12_categories`.`id` = `c19v12_products`.`id_c19v12_categories` 
                   WHERE `c19v12_products`.`id` = :id'; // :id est un marqueur nominatif
        // Préparation de la requête
        $results = $this->pdo->db->prepare($sql);
        // Associe une valeur au marqueur nominatif :id
        $results->bindValue(':id', $this->id, PDO::PARAM_INT);

        //Soumission de la requête au serveur de la base de données
        try {
            $results->execute();
        } catch (Exception $e) {
            die('échec de la connexion :' . $e->getMessage());
        }

        //récupération de la liste d'un client sous forme d'un tableau d'objets
        return $results->fetch(PDO::FETCH_OBJ);
        // fetch ne renvoit qu'un OBJET contrairement à fetchAll()qui renvoit un tableau d'OBJETS
    }
    
    public function updateProfilProduct() {


        //Soumission de la requête au serveur de la base de données
        $results = $this->pdo->db->prepare('UPDATE `c19v12_products` SET  `name` = :name, `reference` = :reference, `price` = :price, `picture` = :picture
                                WHERE `id` = :id');
        // :mail est un marqueur nominatif, pour éviter l'injection de code SQL
        // Associe une valeur à chaque marqueur nominatif de la requête
        $results->bindValue(':id', $this->id, PDO::PARAM_INT);
        $results->bindValue(':name', $this->name, PDO::PARAM_STR); //dans On nomme ce qu'on veut dans bindvalue
        $results->bindValue(':reference', $this->reference, PDO::PARAM_STR);
        $results->bindValue(':price', $this->price, PDO::PARAM_STR);
        $results->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $results->bindValue(':name', $this->name, PDO::PARAM_STR);

        // Exécution de la requête
        try {
            return $results->execute(); // Méthode execute() toujours avec prepare() sinon query()
            // execute retourne true ou false
        } catch (Exception $e) {
            die('échec de la connexion :' . $e->getMessage());
        }
    }
    
    public function deleteProduct() {
        //Définition de la requête SQL
        $results = $this->pdo->db->prepare('DELETE FROM `c19v12_products` WHERE `id` = :id');
        // :mail est un marqueur nominatif, pour éviter l'injection de code SQL
        // Associe une valeur à chaque marqueur nominatif de la requête

        $results->bindValue(':id', $this->id, PDO::PARAM_INT);

        //Soumission de la requête au serveur de la base de données
        try {
            return $results->execute();
        } catch (Exception $e) {
            die('échec de la connexion :' . $e->getMessage());
        }
    }

}

?>
