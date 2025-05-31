<?php
session_start();
include "connexion1.php";

$stmt=$conn->prepare("SELECT * FROM association");
$stmt->execute();
$associations=$stmt->fetchAll();


if(isset($_POST["association"]) && !empty($_POST["association"])){
$ass=$_POST["association"];
$stmt=$conn->prepare("SELECT * FROM stage WHERE id_association=? ORDER BY id_stage ");
$stmt->execute([$ass]);
$d=$stmt->fetchAll();


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>Affichage des Stagiaires</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 80%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        .header { display: flex; justify-content: space-between; }
        .actions { text-decoration: none; color: blue; }
    </style>
</head>
<body>
CONNEXION   id: <?php echo $_SESSION["id"]; ?>  <?php echo $_SESSION["nom"]; ?> <?php echo $_SESSION["prenom"] ."<br>"; ?> 
INSCRIPTION A UN STAGE 
<form action="profil.php" method="post"> 
associations : 
<select name="association" >
    <?php
    foreach($associations as $association){
        echo "<option value='$association[id_ass]'>$association[nom_ass]</option><br>";
    }
    ?>
</select>
<input type="submit" name="rech" value="rechercher">
<table border="1">
<tr>
    <td>id_stage</td>
    <td>date_debut</td>
    <td>date_fin</td>
    <td>selectionner</td>
</tr>
<?php if(isset($d)){
foreach($d as $stage){
echo "<tr>
    <td>$stage[id_stage]</td>
    <td>$stage[date_debut]</td>
    <td>$stage[date_fin]</td>
    <td><a href='#' >selectionner</a></td>
    </tr> ";
}}
?>
</table>
</form>


   
</body>
</html>