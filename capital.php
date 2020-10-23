<?php

// TODO : on se connect à la bdd
$pdo = new PDO('mysql:host=mysql;dbname=basedetest;host=127.0.0.1', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

// TODO : créer la query pour get toutes les capitales
    $query = "SELECT * FROM capital";
    
// TODO : executer la query
    $queryBuilder = $pdo->query($query);


    $countries = $queryBuilder->fetchAll();

// manière en 1 seule ligne ! ==>  $capital = $pdo->query('SELECT * FROM capital')->fetchAll(); 

// TODO : get countries dans l'url ($_GET) puis la stocker dans une variable
if(isset($_GET['country'])){
    $getCountry = $_GET['country'];

// TODO : préparer la requete pour chercher le country qui == capital
    $sql = "SELECT capital FROM capital WHERE country = :country";
    $prepare = $pdo->prepare($sql);

// TODO : passer les parametres à la query
    $prepare->bindParam(':country', $getCountry);

// TODO : executer la query
    $prepare->execute();
    $capital = $prepare->fetch();
    

// TODO : afficher le resultat
    $result = "Pays : $getCountry / Capitale : " . $capital['capital'] ;

}

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

    <form class="mt-5 pt-5 bg-primary rounded" action="capital.php" method="GET">

        <select class="form-control form-control-lg col-lg-6 offset-3" name="country">

        <option>Choisir un pays</option>

        <!-- TODO : afficher le resultat dans un foreach -->
        <?php foreach ($countries as $country): ?>

        <option><?= $country['country']?></option>

        <?php endforeach; ?>

        </select>

        <!-- TODO : submit le form -->
        <button type="submit" class="btn btn-outline-light btn-lg mt-5 mb-5">Submit</button>

    </form>
    
    <?php if(isset($result)): ?>

        <p class="text-primary mt-5"><?= $result ?></p>

        <?php else: ?>

        <p class="text-primary mt-5">il n'y a rien !</p>

    <?php endif; ?>


</body>
</html>