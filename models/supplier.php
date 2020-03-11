<?php

//extends = héritage

class Supplier extends Database {

    public $pdo;
//attributs
//(seront utilisés lorsque l'on récupèrera des données à partir du formulaire) 
    public $id;
    public $siret;
    public $society;
    public $website;
    public $mail;
    public $password;
    public $passwordConfirmation;
    public $id_c19v12_roles;
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

    public function supplierPassword() {
        //Définition de la requête SQL
        $sql = 'SELECT `c19v12_suppliers`.`id`, 
                  `c19v12_suppliers`.`mail`, 
                  `c19v12_suppliers`.`password` FROM `c19v12_suppliers`
                 INNER JOIN `c19v12_roles` ON `c19v12_roles`.`id` = `c19v12_suppliers`.`id_c19v12_roles`
                  WHERE `c19v12_suppliers`.`mail`= :mail'; // :mail est un marqueur nominatif
        // Préparation de la requête
        $results = $this->pdo->db->prepare($sql);
        // Associe une valeur au marqueur nominatif :mail
        $results->bindValue(':mail', $this->mail, PDO::PARAM_STR);

        //Soumission de la requête au serveur de la base de données
        try {
            $results->execute();
        } catch (Exception $e) {
            die('échec de la connexion :' . $e->getMessage());
        }

        return $results->fetch(PDO::FETCH_OBJ);
    }

    public function createSupplier() {

        //Soumission de la requête au serveur de la base de données
        $results = $this->pdo->db->prepare('INSERT INTO `c19v12_suppliers` (`siret`, `society`, `website`, `mail`, `password`, `id_c19v12_roles`)
                VALUES (:siret, :society, :website, :mail, :password, :id_c19v12_roles)');
        // :mail est un marqueur nominatif, pour éviter l'injection de code SQL
        // Associe une valeur à chaque marqueur nominatif de la requête
        $results->bindValue(':siret', $this->siret, PDO::PARAM_INT);
        $results->bindValue(':society', $this->society, PDO::PARAM_STR);
        $results->bindValue(':website', $this->website, PDO::PARAM_STR);
        $results->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $results->bindValue(':password', $this->password, PDO::PARAM_STR);
        $results->bindValue(':id_c19v12_roles', $this->id_c19v12_roles, PDO::PARAM_INT);
        // Exécution de la requête
        try {
            return $results->execute(); // Méthode execute() toujours avec prepare() sinon query()
        } catch (Exception $e) {
            die('échec de la connexion :' . $e->getMessage());
        }
    }

    public function mailExist() {
        //Définition de la requête SQL
        $sql = 'SELECT `id`, `mail` FROM `c19v12_suppliers` WHERE `mail`= :mail'; // :mail est un marqueur nominatif
        // Préparation de la requête
        $results = $this->pdo->db->prepare($sql);
        // Associe une valeur au marqueur nominatif :mail
        $results->bindValue(':mail', $this->mail, PDO::PARAM_STR);

        //Soumission de la requête au serveur de la base de données
        try {
            $results->execute();
        } catch (Exception $e) {
            die('échec de la connexion :' . $e->getMessage());
        }

        //récupération de la liste d'un patient sous forme d'un tableau d'objets
        $foundSupplier = $results->fetch(PDO::FETCH_OBJ);
        // fetch ne renvoit qu'un OBJET contrairement à fetchAll()qui renvoit un tableau d'OBJETS
        if (is_object($foundSupplier) && $foundSupplier->id !== $this->id) {
            return false;
        } else {
            return true;
        }
    }

    public function getSupplierList() {
        //Définition de la requête SQL
        $sql = 'SELECT `id`, `siret`, `society`, `website`, `mail`, `password` FROM `c19v12_suppliers`';
        //Soumission de la requête au serveur de la base de données
        $results = $this->pdo->db->query($sql);

        //récupération de la liste des clients sous forme d'un tableau d'objets
        return $results->fetchAll(PDO::FETCH_OBJ);
    }

    public function getSupplierProfile() {
        //Définition de la requête SQL
        $sql = 'SELECT `id`, `siret`, `society`, `website`, `mail` FROM `c19v12_suppliers`';

        //Soumission de la requête au serveur de la base de données
        $results = $this->pdo->db->query($sql);

        //récupération de la liste des clients sous forme d'un tableau d'objets
        return $results->fetchAll(PDO::FETCH_OBJ);
    }

    public function profileOneSupplier() {
        //Définition de la requête SQL
        $sql = 'SELECT `id`, `siret`, `society`, `website`, `mail`, `password` FROM `c19v12_suppliers` WHERE `id`= :id'; // :id est un marqueur nominatif
        // Préparation de la requête
        $results = $this->pdo->db->prepare($sql);
        // Associe une valeur au marqueur nominatif :id
        $results->bindValue(':id', $this->id, PDO::PARAM_STR);

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

    public function updateProfilSupplier() {


        //Soumission de la requête au serveur de la base de données
        $results = $this->pdo->db->prepare('UPDATE `c19v12_suppliers` SET  `siret` = :siret, `society` = :society, `website` = :website, `mail` = :mail, `password` = :password WHERE `id` = :id');
        // :mail est un marqueur nominatif, pour éviter l'injection de code SQL
        // Associe une valeur à chaque marqueur nominatif de la requête
        $results->bindValue(':id', $this->id, PDO::PARAM_INT);
        $results->bindValue(':siret', $this->siret, PDO::PARAM_INT);
        $results->bindValue(':society', $this->society, PDO::PARAM_STR);
        $results->bindValue(':website', $this->website, PDO::PARAM_STR);
        $results->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $results->bindValue(':password', $this->password, PDO::PARAM_STR);

        // Exécution de la requête
        try {
            return $results->execute(); // Méthode execute() toujours avec prepare() sinon query()
            // execute retourne true ou false
        } catch (Exception $e) {
            die('échec de la connexion :' . $e->getMessage());
        }
    }

    public function getSupplierByMail() {
        //Définition de la requête SQL
        $sql = 'SELECT `id` FROM `c19v12_suppliers` WHERE `mail` = :mail';
        // Préparation de la requête
        $results = $this->pdo->db->prepare($sql);
        // Associe une valeur au marqueur nominatif :id
        $results->bindValue(':mail', $this->mail, PDO::PARAM_STR); //marqueur nominatif = bindValue
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

    public function deleteSupplier() {
        //Définition de la requête SQL
        $results = $this->pdo->db->prepare('DELETE FROM `c19v12_suppliers` WHERE `id` = :id');
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

    public function countSupplier() {
        //Définition de la requête SQL
        $sql = 'SELECT COUNT(*) AS `totalPages` FROM `c19v12_suppliers`';

        //Soumission de la requête au serveur de la base de données

        try {
            $results = $this->pdo->db->query($sql);
        } catch (Exception $e) {
            die('échec de la connexion :' . $e->getMessage());
        }

        return $results->fetchColumn();
    }

    public function paginationSupplier($perPage, $offset) {
        //Définition de la requête SQL
        $sql = 'SELECT `id`, `society`, `siret` FROM `c19v12_suppliers` ORDER BY `society` LIMIT :perPage OFFSET :offset';
        // Préparation de la requête
        $results = $this->pdo->db->prepare($sql);
        $results->bindValue(':perPage', $perPage, PDO::PARAM_INT);
        $results->bindValue(':offset', $offset, PDO::PARAM_INT);
        //Soumission de la requête au serveur de la base de données
        try {
            $results->execute();
        } catch (Exception $e) {
            die('échec de la connexion :' . $e->getMessage());
        }
        //récupération de la liste des clients sous forme d'un tableau d'objets
        return $results->fetchAll(PDO::FETCH_OBJ);
    }

    public function countSupplierSearch($search) {
        $sql = 'SELECT COUNT(*) AS `totalSupplier` FROM `c19v12_supplier` WHERE `society` LIKE :search1 OR `siret` LIKE :search2';
        $results = $this->pdo->db->prepare($sql);

        $results->bindValue(':search1', "%$search%", PDO::PARAM_STR);
        $results->bindValue(':search2', "%$search%", PDO::PARAM_INT);
        try {
            $results->execute();
        } catch (Exception $e) {
            die('échec de la connexion :' . $e->getMessage());
        }
        return $results->fetchColumn();
    }

    public function paginationSearchSupplier($perPage, $offset, $search) {
        //Définition de la requête SQL
        $sql = 'SELECT `id`, `society`, `siret` 
                   FROM `c19v12_suppliers`
                   WHERE `society` LIKE :search1 OR `siret` LIKE :search2 
                   ORDER BY `society` 
                   LIMIT :perPage OFFSET :offset';
        $results = $this->pdo->db->prepare($sql);

        $results->bindValue(':search1', "%$search%", PDO::PARAM_STR);
        $results->bindValue(':search2', "%$search%", PDO::PARAM_INT);
        $results->bindValue(':perPage', $perPage, PDO::PARAM_INT);
        $results->bindValue(':offset', $offset, PDO::PARAM_INT);
        //Soumission de la requête au serveur de la base de données
        try {
            $results->execute();
        } catch (Exception $e) {
            die('échec de la connexion :' . $e->getMessage());
        }
        //récupération de la liste d'un patient sous forme d'un tableau d'objets
        return $results->fetchAll(PDO::FETCH_OBJ);
    }

}

?>
