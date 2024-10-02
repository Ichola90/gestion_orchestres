<?php
include "config.php";
$idOeuvre=$_GET['idOeuvre'];
$requete="DELETE FROM oeuvre WHERE idOeuvre='$idOeuvre'";
$execution=mysqli_query($connexion,$requete);
if ($execution) { header("location:index.php");}
?>