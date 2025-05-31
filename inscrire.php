<?php
require "connexion1.php";
$villes=[];
$stmt=$conn->prepare("SELECT * FROM ville");
$stmt->execute();
$villes=$stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <style>
        a{
            text-decoration: none;
            color: black;
        }
        </style>
</head>
<body class="container ms-3">
    <form action="inscrire.php" method="post">
        <legend>ajouter un volontaire</legend>
        <label>nom :</label>
        <input type="text" name="nom" required><br><br> 
        <label>prenom :</label>
        <input type="text" name="prenom" required><br><br>
        <label>email :</label>
        <input type="text" name="email" required><br><br>
        <label>mot de passe :</label>
        <input type="password" name="mot" required><br><br>
        <label>confirmer mot de passe :</label>
        <input type="password" name="mot1" required><br><br>
        <label>actif</Label>
        <select name="actif"> 
            <option>oui</option>
            <option>non</option>
        </select><br><br>
        <label>ville :</label>
        <select name="ville">
            <?php
            foreach($villes as $ville){
                echo "<option value='$ville[id_ville]'>$ville[nom_ville]</option>";
            }
            ?>
</select>
<br><br>
        <input type="submit" value="ajouter" name="ajouter">
    </form>
    <?php
    if(isset($_POST["ajouter"])){
        if(empty($_POST["nom"]) || empty($_POST["prenom"]) || empty($_POST["email"]) || empty($_POST["mot"]) || empty($_POST["actif"]) || empty($_POST["ville"])||empty($_POST["mot1"])){
            echo "remplire les champs vides";
        }else{
            if($_POST["mot"]==$_POST["mot1"]){
                if(filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
            $nom=$_POST["nom"];
            $idville=$_POST["ville"];
            $prenom=$_POST["prenom"];
            $email=$_POST["email"];
            $mot=$_POST["mot"];
            $actif=$_POST["actif"];
            $stmt = $conn->prepare("INSERT INTO volontaire ( nom_vlt, prenom_vlt, mail, mot_passe, id_ville, actif) VALUES ( ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$nom, $prenom, $email, $mot, $idville, $actif]);
            echo "ajout avec succes";
        }else{
            echo "email incorrect";
        }
    }else{
    echo "les mots de passe ne sont pas identiques";
}
    
    }
}

    ?>
</body>
</html>
