<?php
    include "config.php";
    $requete="SELECT oeuvre.nom AS nomOeuvre, artiste.nom AS nomArtiste, artiste.prenom, oeuvre.annee, categorie.nomCategorie, oeuvre.idOeuvre FROM oeuvre LEFT JOIN artiste ON oeuvre.idArtistes=artiste.idArtistes INNER JOIN categorie ON oeuvre.idCategorie=categorie.idCategorie";
    $execution=mysqli_query($connexion, $requete);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste des oeuvres</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="container d-flex justify-content-center">
    <div class="col-md-12 ">
    <div class="bg-dark text-center text-white rounded-3" >
        <h3>
            <b>
               La liste des oeuvres
            </b>
        </h3>
    </div>
    
    <div class="d-flex justify-content-end mb-2">
        <a href="create.php">
        <svg xmlns="bag-plus.svg" width="20" height="20" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5"/>
  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
</svg>
       </a>
    </div>
    <div class="">
        <table class="table table-bordered">
            <thead class="table table-secondary">
                <tr>
                    <th >
                        Oeuvre
                    </th>
                    <th>
                       Auteur
                    </th>
                    <th>
                        Année
                    </th>
                
                <th>
                    Catégorie
                </th>
                <th>
                    Actions
                </th>
                </tr>
            </thead>
            <tbody>
            <?php
                while($oeuvre=mysqli_fetch_assoc($execution)){
    
                    echo "<tr>";
                    echo "<td>".$oeuvre['nomOeuvre']."</td>" ;
                    echo "<td>".$oeuvre['prenom']." ".$oeuvre['nomArtiste']."</td>" ;
                    echo "<td>".$oeuvre['annee'].
                    "</td>" ;
                    echo "<td>".$oeuvre['nomCategorie'].
                    "</td>" ;
                
                    echo "<td class=''><a class='btn btn-primary m-1' href='modifier.php?idOeuvre=$oeuvre[idOeuvre]'><svg xmlns='pencil-fill.svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'><path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z'/></svg></a><a class='btn btn-danger'onclick='return confirm(\"Voulez-vous vraiment supprimer cet enregistrement ?\")' href='supprimer.php?idOeuvre=$oeuvre[idOeuvre]'><svg xmlns='v' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>         <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5'/></svg></a></td>";
                    echo "<tr>";
                 }
              ?>  
            </tbody>
        </table>
    </div>
    </div>
</body>
</html>