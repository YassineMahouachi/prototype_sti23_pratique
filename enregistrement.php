<?php
    require("connection.php");
    if (isset($_POST)) {
        $permis = $_POST['permis'];
        $req = "SELECT * FROM testeur WHERE numpermis = '$permis'";
        $res = mysqli_query($server, $req);
        if (mysqli_num_rows($res) != 0) {
            echo "Ce permis deja existe dans la base";
        }else {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $genre = $_POST['genre'];
            $villes = $_POST['ville'];
            $req = "SELECT idville FROM ville WHERE libville = '$villes'";
            $res = mysqli_query($server, $req);
            $idville = mysqli_fetch_array($res);
            $idville = $idville[0];
            $req = "INSERT INTO testeur(numpermis, nom, prenom, genre, idville) VALUES ('$permis', '$nom', '$prenom', '$genre', '$idville')";
            $res = mysqli_query($server, $req);
            if ($res) {
                echo "Enregisté";
            }
        }
    }
    mysqli_close($server);
?>