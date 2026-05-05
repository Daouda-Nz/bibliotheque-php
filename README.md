# 📚 Gestion de Bibliothèque - PHP POO + PDO

Projet complet de gestion de bibliothèque développé en **PHP orienté objet (POO)** avec **PDO et MySQL**.

---

## 🎯 Objectif

Développer une application web permettant de gérer une bibliothèque avec les fonctionnalités suivantes :

- Gestion des auteurs
- Gestion des catégories
- Gestion des livres
- Gestion des emprunts

---

## 🧱 Technologies utilisées

- PHP (Programmation Orientée Objet)
- MySQL
- PDO (sécurité des requêtes)
- HTML / CSS
- WAMP / XAMPP

---

## 📁 Structure du projet


bibliotheque/
│
├── classes/
│ ├── Database.php
│ ├── Auteur.php
│ ├── Categorie.php
│ ├── Livre.php
│ ├── Emprunt.php
│
├── public/
│ ├── index.php
│ ├── auteurs.php
│ ├── categories.php
│ ├── livres.php
│ ├── emprunts.php
│ ├── menu.php
│ ├── style.css
│
└── README.md




---

## 🧠 Fonctionnalités

### 👨‍🏫 Auteurs
- Ajouter un auteur
- Afficher les auteurs
- Supprimer un auteur

### 📂 Catégories
- Ajouter une catégorie
- Afficher les catégories
- Supprimer une catégorie

### 📚 Livres
- Ajouter un livre
- Afficher les livres
- Associer auteur + catégorie
- Supprimer un livre

### 🔁 Emprunts
- Emprunter un livre
- Afficher les emprunts
- Retourner un livre

---

## 🔐 Sécurité

- PDO utilisé pour la base de données
- Requêtes préparées
- Protection contre les injections SQL

---

## 🚀 Installation

### 1. Installer serveur local
- XAMPP ou WAMP

### 2. Créer la base de données

```sql
CREATE DATABASE bibliotheque;