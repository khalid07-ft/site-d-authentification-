<?php
$host = "localhost";
$user="root";
$mot="";
$db="résaux";

try{
    $conn=new PDO("mysql:host=$host;port=3308;dbname=$db;",$user,$mot);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo"echoue". $e->getMessage();
}
$pdo=null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <style>
        a{
            text-decoration: none;
            color: black;
        }
        </style>
</head>
<body>
    
<div class="containeer row ">
<div class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="nav navbar-nav">
        <li class="nav-link"><a class="nav-item active" href="inscrire.php">s'inscrire</a></li>
        <li class="nav-link"><a class="nav-item" href="authentification.php">Connexion</a></li>
        <li class="nav-link"><a class="nav-item" href="nscription.php">Inscription</a></li>
</div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>