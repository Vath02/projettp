<?php

  class Database {
    // Objet de connexion PDO
    public $db;

    // Objet auto-instancié utilisé avec les méthodes de transaction SQL
    private static $instance;

    private $host     = DB_HOST;
    private $database = DB_NAME;
    private $username = DB_USER;
    private $password = DB_PWD;


    /**
    * Initialise une connection à la base de données
    **/
    public function __construct() {

      try {
        // -- IMPORTANT --
        // Les tables doivent être du type innoDB pour prendre en charge les transactions.
        // Les tables de type MyISAM ne gèrent pas les transactions.
        $this->db = new PDO('mysql:host=' . $this->host .';dbname=' . $this->database . ';charset=utf8',
                            $this->username,
                            $this->password);

        // En mode ERRMODE_EXCEPTION, si un échec survient, le script est
        // interrompu, la connexion fermée, et mysql effectue un roll back
        // sur la transaction
        $this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

      } catch (Exception $e) {
        die('Error : ' . $e->getMessage());
      }

    }


    /**
     * Méthode retournant une instance de classe PDO
     * @return object
     */
    public static function getInstance() {

      if ( is_null( self::$instance ) ) {
        self::$instance = NEW Database();
      }

      return self::$instance;

    }


    /**
     * Fermeture automatique de la connexion lorsqu'une instance de classe est détruite
     */
    public function __destruct() {
      $this->db = NULL;
    }

  }

?>
