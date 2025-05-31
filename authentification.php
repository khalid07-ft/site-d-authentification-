<?php
session_start();
require "connexion1.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="mx-2">
<form  action="authentification.php" method="post">
    <label>email :</label>
    <input type="text" name="mail" required><br><br>
    <label>mot de passe :</label>
    <input type="password" name="mot" required><br><br>
    <input type="submit" value="connexion" name="connexion">
</form>
<?php
if(!isset($_SESSION["tentative"]))
$_SESSION["tentative"]=0;
if(isset($_POST["connexion"])){
    if(!empty($_POST["mail"]) && !empty($_POST["mot"]) ){
$stmt=$conn->prepare("SELECT * FROM volontaire WHERE mail=? AND mot_passe=? ");
$stmt->execute([$_POST["mail"],$_POST["mot"]]);
$volontaire=$stmt->fetchAll();
$r=$stmt->rowcount();
if($r>0){
    $_SESSION["mail"]=$_POST["mail"];
    $_SESSION["mot"]=$_POST["mot"];
    $_SESSION["id"]=$volontaire[0]["id_vlt"];
    $_SESSION["nom"]=$volontaire[0]["nom_vlt"];
    $_SESSION["prenom"]=$volontaire[0]["prenom_vlt"];
    header("location:profil.php");
}
if($r==0){
    if($_SESSION["tentative"]>=2){
        echo "vous avez depasser le nombre de tentatives";
        header("location:inscrire.php");
    }
    else{
        $_SESSION["tentative"]=$_SESSION["tentative"]+1;
        echo "email ou mot de passe incorrect";
        echo "votre tentative est ".(3-$_SESSION["tentative"]);
    }
}
}
else{
    echo "remplire les champs vides";
}}

?>
</body>
</html>