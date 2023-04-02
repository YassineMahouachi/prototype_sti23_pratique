<?php
    require("connection.php");
    if (isset($_POST)) {
        $permis = $_POST['permis'];
        $req = "SELECT * FROM testeur WHERE numpermis = '$permis'";
        $res = mysqli_query($server, $req);
        if (mysqli_num_rows($res) == 0) {
            echo "Ce permis n'existe pas dans la base!";
        }else {
            $model = $_POST['model'];
            $req = "SELECT idmodele FROM modelevoiture WHERE libelle = '$model'";
            $res = mysqli_query($server, $req);
            $idmodele = mysqli_fetch_array($res);
            $idmodele = $idmodele[0];
            $secu = $_POST['securite'];
            $cond = $_POST['conduite'];
            $conf = $_POST['confort'];
            $today = date("Y-m-d");
            $req = "SELECT * FROM evaluation WHERE numpermis = '$permis' AND idmodele = '$idmodele'";
            $res = mysqli_query($server, $req);
            if (mysqli_num_rows($res) > 0) {
                echo "Vous avez testé ce modele!";
            }else {
                $req = "INSERT INTO evaluation(numpermis, idmodele, datetest, securite, conduite, confort) VALUES ('$permis', '$idmodele', '$today', '$secu', '$cond', '$conf')";
                $res = mysqli_query($server, $req);
                if ($res) {
                    echo "Enregistré";
                }
            }
        }
    }
    mysqli_close($server);
?>