<?php

class Database {
    private $host = "localhost";
    private $dbname = "bibliotheque";
    private $user = "root";
    private $pass = "";

    public function connect() {
        try {
            $pdo = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->dbname,
                $this->user,
                $this->pass
            );

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;

        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}