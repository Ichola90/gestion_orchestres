<?php
$hostname="localhost";
$username="root";
$password="";
$database="tresor";
$connexion=mysqli_connect($hostname,$username,$password,$database,);
if (!$connexion) { echo "Connexion reussie ";
}

?>