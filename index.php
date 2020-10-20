<?php
$pdo = new PDO('mysql:host=mysql;dbname=basedetest;host=127.0.0.1', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    $pdoStat = $pdo->prepare("SELECT * FROM city");

    $pdoStat->execute();
    
    $country = $pdoStat->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="container text-center">

    <form method="get" action="index.php" class="bg-success mt-5 p-5 rounded">
        <select name="country" id="country" >
            <option selected="selected">Sélectionner un pays</option>
            <?php foreach ($country as $value): ?>
            <option <?= $value['country']; ?>><?= $value['country']; ?></option>
            <?php endforeach; ?>
        </select>
        <div class="mt-5">
            <input class="btn-lg btn-outline-success" type="submit" value="Rechercher !">
        </div>
    </form>

    <?php

    if ($_GET['country'] == 'France'){
    echo 'La capitale de la France est Paris !';
    } elseif ($_GET['country'] == 'Argentine'){
    echo 'La capitale de l\'Argentine est Buenos Aires !';
    } elseif ($_GET['country'] == 'Japon'){
    echo 'La capitale du Japon est Tokyo !';
    } else {
    echo '';
    };

?>

</body>

</html>