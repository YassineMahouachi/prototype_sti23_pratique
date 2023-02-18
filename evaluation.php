<?php

$connection = mysqli_connect("localhost", "root", "", "prototype_sti23");

$numpermis = $_POST["permis"];

$query = "SELECT * FROM testeur WHERE numpermis = '$numpermis'";
$res= mysqli_query($connection, $query);

if (mysqli_num_rows($res) == 0) {
    echo "Le numero du permis : " . $numpermis . " n'existe pas!";
} else {
    $query = "SELECT * FROM testeur, evaluation WHERE testeur.numpermis = evaluation.numpermis AND testeur.numpermis = '$numpermis'";
    $res = mysqli_query($connection, $query);

    if (mysqli_num_rows($res) == 0) {
        $model = $_POST['model'];
        $sec = $_POST['securite'];
        $cnd = $_POST['conduite'];
        $con = $_POST['confort'];
        //$dt = date('Y-m-d');
        $query = "INSERT INTO evaluation(numpermis, idmodele, datetest, securite, conduite, confort) VALUES ('$numpermis', '$model', 'NOW()', '$sec', '$cnd', '$con')";
        mysqli_query($connection, $query);
        echo "L'évaluation a été ajoutée avec succès.";
    } else {
        echo "Vous avez déjà testé ce modèle !";
    }
}

$mysqli_close();

?>