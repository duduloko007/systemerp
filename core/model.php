<?php
class model {
	
	 protected $db;

    public function __construct() {
        global $config;
        try {
            $options = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"];
            $this->db = new PDO("mysql:dbname=" . $config['dbname'] . ";host=" . $config['host'], $config['dbuser'], $config['dbpass'], $options);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          
        } catch (PDOException $e) {
            echo "Falhou a conexão" . $e->getMessage() . " -  confira a linha: " . $e->getLine();
        }
    }

}
?>