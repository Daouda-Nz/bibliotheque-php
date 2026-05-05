<?php
require_once "../classes/Auteur.php";
$auteur = new Auteur();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $auteur->ajouter($_POST["nom"], $_POST["prenom"], $_POST["nationalite"]);
    header("Location: auteurs.php");
    exit;
}

if (isset($_GET["delete"])) {
    $auteur->supprimer($_GET["delete"]);
    header("Location: auteurs.php");
    exit;
}

$liste = $auteur->afficher();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Auteurs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header><h1>👨‍🏫 Auteurs</h1></header>

<nav>
    <a href="index.php">Accueil</a>
    <a href="auteurs.php">Auteurs</a>
    <a href="categories.php">Catégories</a>
    <a href="livres.php">Livres</a>
    <a href="emprunts.php">Emprunts</a>
</nav>

<div class="container">

<h2>Ajouter auteur</h2>

<form method="POST">
    <input type="text" name="nom" placeholder="Nom">
    <input type="text" name="prenom" placeholder="Prénom">
    <input type="text" name="nationalite" placeholder="Nationalité">
    <button>Ajouter</button>
</form>

<h2>Liste</h2>

<?php foreach ($liste as $a) { ?>
    <div class="card">
        <?= $a["nom"] ?> <?= $a["prenom"] ?> - <?= $a["nationalite"] ?>
        <a href="?delete=<?= $a["id"] ?>">❌</a>
    </div>
<?php } ?>

</div>

</body>
</html>