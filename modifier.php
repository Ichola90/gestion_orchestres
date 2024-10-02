<?php
include "config.php";
$idOeuvre=$_GET['idOeuvre'];
$requeteOeuvre="SELECT * FROM oeuvre WHERE idOeuvre='$idOeuvre'";
$executionOeuvre=mysqli_query($connexion,$requeteOeuvre);
$oeuvre=mysqli_fetch_assoc($executionOeuvre);
$nom=$oeuvre['nom'];
$description=$oeuvre['description'];
$annee=$oeuvre['annee'];
$idArtistes=$oeuvre['idArtistes'];
$idCategorie=$oeuvre['idCategorie'];



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout des oeuvres</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="container col-sm-6">
    <div class="text-center text-white bg-success rounded-3">
        <u>
            <em>
                <h2>Modification d'une oeuvre</h2>
            </em>
        </u>
    </div>
    <div>
        <a class="btn btn-secondary mt-1" href="index.php">Retour a la liste</a>
    </div>
   <form action="tr_modifier.php" method="post">    
    <input type="hidden" name="idOeuvre" value="<?php echo$idOeuvre; ?>">
    <div class="mt-2">
       <label class="form-label" for="nom"class="form-label">Nom</label> 
       <input class="form-control" type="text" name="nom" id="nom"class="form-control" required value="<?=$nom?>">   
    </div>
    <div>
    <label class="form-label" for="description"class="form-label">Description</label> 
        <input class="form-control" type="text" name="description"id="description"class="form-control" required value="<?=$description?>">
    </div> 
    <div> 
    <div>
  <label class="form-label" for="annee"class="form-label">Année</label> 
      <input class="form-control" type="number" name="annee"id="annee"class="form-control" required value="<?=$annee?>">
  </div>
  <div> 
 <label class="form-label" for="artistes"class="form-label">Auteur</label> 
  <select class="form-select" name="artiste" id="artiste">
  
    <?php
    if ($idArtistes===null) {
           echo" <option value=''>Selectionnez un artiste</option>";
        
    }
    $requeteArtiste="SELECT * FROM artiste";

    $executionArtiste=mysqli_query($connexion, $requeteArtiste);

        while ($artiste=mysqli_fetch_assoc($executionArtiste)) {
            $selected=(($idArtistes==$artiste['idArtistes'])?"selected":"");
            echo " <option value='$artiste[idArtistes]' $selected>".$artiste['nom']." ".$artiste['prenom']."</option>";
        }
    ?>
  </select>
 </div>
 <div> 
 <label class="form-label" for="categorie"class="form-label">Catégorie</label> 
  <select class="form-select" name="categorie" id="categorie">
    <?php
    $requeteCategorie="SELECT * FROM categorie";
    $executionCategorie=mysqli_query($connexion, $requeteCategorie);

        while ($categorie=mysqli_fetch_assoc($executionCategorie)) {
            $selected=(($idCategorie==$categorie['idCategorie'])?"selected":"");
            echo " <option value='$categorie[idCategorie]' $selected>".$categorie['nomCategorie']."</option>";
        }
    ?>
  </select>
   <div>
  </div>   
    <div class="m-2">
        <input type="reset" name="" onclick="window.location.href='index.php'" value="Annuler"class="btn btn-danger">

        <input type="submit" name="submit" value="Envoyer"class="btn btn-primary">
    
</div>
</form>    
</body>
</html