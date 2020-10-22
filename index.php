<?php
$pdo = new PDO('mysql:host=mysql;dbname=basedetest;host=127.0.0.1', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
         
        $country = $_GET['country'];

        $pdoStat = $pdo->query("SELECT * FROM city");

        $pdoStat->execute();

        $pays = $pdoStat->fetchAll();

        $req = $pdo->prepare("SELECT country FROM city WHERE country = :country");

        $req->bindParam(':country', $country);
        
        $req->execute();
    
        $reqe = $pdo->prepare("SELECT capital FROM city WHERE capital = :capital");

        $reqe->bindParam(':capital', $capital);
        
        $reqe->execute();
 
        $ville = $reqe->fetchAll();
    


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="container text-center" style="color: #fff;">

   <div class="w-50 bg-primary mt-5 pt-5 rounded d-flex">
        <form method="GET" action="index.php" >
            <select class="custom-select w-75 " name="country">
                <option>Sélectionner un pays</option>
                <?php foreach ($pays as $value): ?>
                <option ><?= $value['country']; ?></option>
                <?php endforeach; ?>
            </select>
            <input class="btn btn-outline-light mt-5 mb-5" type="submit" value="Rechercher !">
        </form>

        <?php
        if (isset($country)) {
            if ($country == $country) {
                echo "Pays : $country <br> 
                      Capitale : $capital";
            }
        }

        ?>
    </div>

</body>

</html>