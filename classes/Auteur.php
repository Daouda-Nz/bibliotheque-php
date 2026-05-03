<?php

require_once "Database.php";

class Auteur {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    // 🔹 Ajouter un auteur
    public function ajouter($nom, $prenom, $nationalite) {
        $sql = "INSERT INTO auteurs(nom, prenom, nationalite) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$nom, $prenom, $nationalite]);
    }

    // 🔹 Afficher tous les auteurs
    public function afficher() {
        $sql = "SELECT * FROM auteurs";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔹 Supprimer
    public function supprimer($id) {
        $sql = "DELETE FROM auteurs WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }

    // 🔹 Modifier
    public function modifier($id, $nom, $prenom, $nationalite) {
        $sql = "UPDATE auteurs SET nom=?, prenom=?, nationalite=? WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$nom, $prenom, $nationalite, $id]);
    }
}