<?php

require_once "Database.php";

class Categorie {

    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    // 🔥 AJOUTER
    public function ajouter($libelle) {
        $sql = "INSERT INTO categories (libelle) VALUES (?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$libelle]);
    }

    // 🔥 AFFICHER
    public function afficher() {
        $sql = "SELECT * FROM categories";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔥 SUPPRIMER
    public function supprimer($id) {
        $sql = "DELETE FROM categories WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}