<?php
 include "config.php";
 if ($_SERVER['REQUEST_METHOD']=='POST') {
   

    $nom=$_POST['nom'];
    $description=$_POST['description'];
    $annee=$_POST['annee'];
    $artiste=$_POST['artiste'];
    $categorie=$_POST['categorie'];
    $idOeuvre=$_POST['idOeuvre'];

    if (empty($_POST['artiste'])) {
        $requete="UPDATE `oeuvre` SET `nom`='$nom',`description`='$description',`annee`='$annee',`idCategorie`='$categorie' WHERE `idOeuvre`='$idOeuvre'";
        
    } else {

        $requete="UPDATE `oeuvre` SET `nom`='$nom',`description`='$description',`annee`='$annee',`idArtistes`='$artiste',`idCategorie`='$categorie' WHERE `idOeuvre`='$idOeuvre'";
    }
       $execution=mysqli_query($connexion, $requete);
 
        if ($execution) {
           header("location:index.php");
       }

 }
?>