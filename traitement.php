<?php
 include "config.php";
 if ($_SERVER['REQUEST_METHOD']=='POST') {
    $nom=$_POST['nom'];
    $description=$_POST['description'];
    $annee=$_POST['annee'];
    $artiste=$_POST['artiste'];
    $categorie=$_POST['categorie'];
    if (empty($_POST['$artiste'])) {
        $requete="INSERT INTO `oeuvre`(`nom`, `description`, `annee`, `idCategorie`) VALUES ('$nom', '$description', '$annee', '$categorie')";
       
    }else {
       
   
        $requete="INSERT INTO `oeuvre`(`nom`, `description`, `annee`, `idArtistes`, `idCategorie`) VALUES ('$nom', '$description', '$annee', '$artiste', '$categorie')";
    }
        $execution=mysqli_query($connexion, $requete);
 
        if ($execution) {
            header("location:index.php");
        }

 }
?>