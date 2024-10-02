<?php
 include "config.php";

 


 
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
                <h2>Ajoutez votre oeuvre</h2>
            </em>
        </u>
    </div>
    <div>
        <a class="btn btn-secondary mt-1" href="index.php">Retour a la liste</a>
    </div>
   <form action="traitement.php" method="post">
    <div>
       <label class="form-label" for="nom"class="form-label">Nom</label> <br>
       <input class="form-control" type="text" name="nom" id="nom"class="form-control">   
    </div>
    <div>
    <label class="form-label" for="description"class="form-label">Description</label> <br>
        <input class="form-control" type="text" name="description"id="description"class="form-control">
    </div> 
    <div> 
    <div>
  <label class="form-label" for="annee"class="form-label">Année</label> <br>
      <input class="form-control" type="number" name="annee"id="annee"class="form-control">
  </div>
  <div> 
 <label class="form-label" for="artiste"class="form-label">Auteur</label> <br>
  <select class="form-select" name="artiste" id="artiste">
    <?php
    echo "<option value=''>Selectionnez un artiste</option>" ;
    $requeteArtiste="SELECT * FROM artiste";
 
    $executionArtiste=mysqli_query($connexion, $requeteArtiste);

        while ($data=mysqli_fetch_assoc($executionArtiste)) {
            echo " <option value='$data[idArtistes]'>".$data['nom']." ".$data['prenom']."</option>";
        }
    ?>
  </select>
 </div>
 <div> 
 <label class="form-label" for="categorie"class="form-label">Catégorie</label> 
  <select class="form-select" name="categorie" id="categorie">
    
    <?php
   echo "<option value=''>Selectionnez une categorie</option>" ;
    $requeteCategorie="SELECT * FROM categorie";
 
    $executionCategorie=mysqli_query($connexion, $requeteCategorie);

        while ($data=mysqli_fetch_assoc($executionCategorie)) {
            echo " <option value='$data[idCategorie]'>".$data['nomCategorie']."</option>";
        }
    ?>
  </select>
   <div>
  </div>   
    <div class="m-2">
        <input type="reset" name="" value="Annuler"class="btn btn-danger">

        <input type="submit" name="submit" value="Envoyer"class="btn btn-primary">
    
</div>
</form>    
</body>
</html>
