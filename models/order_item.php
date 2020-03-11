<?php

//extends = héritage

class Order_item extends Database {

    public $pdo;
//attributs
//(seront utilisés lorsque l'on récupèrera des données à partir du formulaire) 
    public $id;
    public $quantity;
    public $id_c19v12_products;
    public $id_c19v12_orders;

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

    
    public function createOrderItems() {

        //Soumission de la requête au serveur de la base de données
        $results = $this->pdo->db->prepare('INSERT INTO `c19v12_order_items` (`quantity`,`id_c19v12_products`,`id_c19v12_orders`)
                VALUES (:quantity, :id_c19v12_products, :id_c19v12_orders)');
        // Associe une valeur à chaque marqueur nominatif de la requête
        $results->bindValue(':quantity', $this->quantity, PDO::PARAM_INT);
        $results->bindValue(':id_c19v12_products', $this->id_c19v12_products, PDO::PARAM_INT);
        $results->bindValue(':id_c19v12_orders', $this->id_c19v12_orders, PDO::PARAM_INT);
        
        // Exécution de la requête
        try {
            return $results->execute(); // Méthode execute() toujours avec prepare() sinon query()
        } catch (Exception $e) {
            die('échec de la connexion :' . $e->getMessage());
        }
    }

  public function getOrderItem() {
        //Définition de la requête SQL
        $sql = 'SELECT `id`, `quantity`, `id_c19v12_products`, `id_c19v12_orders` FROM `c19v12_orders` WHERE `id` = :id';
        // Préparation de la requête
        $results = $this->pdo->db->prepare($sql);
        // Associe une valeur au marqueur nominatif :id
        $results->bindValue(':id', $this->id, PDO::PARAM_INT); //marqueur nominatif = bindValue
        //Soumission de la requête au serveur de la base de données
        try {
            $results->execute();
        } catch (Exception $e) {
            die('échec de la connexion :' . $e->getMessage());
        }

        //récupération de la liste d'un patient sous forme d'un tableau d'objets
        return $results->fetch(PDO::FETCH_OBJ);
        // fetch ne renvoit qu'un OBJET contrairement à fetchAll()qui renvoit un tableau d'OBJETS
    }
    
}

?>
