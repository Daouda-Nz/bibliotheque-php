<?php
require_once "../classes/Categorie.php";
$cat = new Categorie();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cat->ajouter($_POST["libelle"]);
    header("Location: categories.php");
    exit;
}

if (isset($_GET["delete"])) {
    $cat->supprimer($_GET["delete"]);
    header("Location: categories.php");
    exit;
}

$liste = $cat->afficher();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Catégories</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header><h1>📂 Catégories</h1></header>

<nav>
    <a href="index.php">Accueil</a>
    <a href="auteurs.php">Auteurs</a>
    <a href="categories.php">Catégories</a>
    <a href="livres.php">Livres</a>
    <a href="emprunts.php">Emprunts</a>
</nav>

<div class="container">

<h2>Ajouter catégorie</h2>

<form method="POST">
    <input type="text" name="libelle" placeholder="Libellé">
    <button>Ajouter</button>
</form>

<h2>Liste</h2>

<?php foreach ($liste as $c) { ?>
    <div class="card">
        <?= $c["libelle"] ?>
        <a href="?delete=<?= $c["id"] ?>">❌</a>
    </div>
<?php } ?>

</div>

</body>
</html>