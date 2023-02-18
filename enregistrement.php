<?php

$connection = mysqli_connect("localhost", "root", "", "prototype_sti23");

$permis = $_POST['permis'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$genre = $_POST['genre'];
$ville = $_POST['ville'];

$query = "SELECT * FROM testeur WHERE numpermis = '$permis'";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    echo "Ce numero de permis : " . $permis . "deja existe!";
} else {
    $idville = 0;
    switch ($ville) {
        case "Gafsa":
            $idville = 1;
            break;
        case "Kef":
            $idville = 2;
            break;
        case "Sousse":
            $idville = 3;
            break;
        case "Tunis":
            $idville = 4;
            break;
    }
    
    $query = "INSERT INTO testeur(numpermis, nom, prenom, genre, idville) VALUES('$permis', '$nom', '$prenom', '$genre', '$idville')";
    mysqli_query($connection, $query);
    
    echo "Enregistrement fait avec succes";
}

mysqli_close($connection);

?>