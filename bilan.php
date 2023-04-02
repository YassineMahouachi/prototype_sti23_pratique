<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 20px;
    }
</style>
<?php 
    require("connection.php");
    $req = "SELECT V.libelle, AVG(E.securite), AVG(E.conduite), AVG(E.confort), COUNT(E.idmodele) FROM evaluation AS E, modelevoiture AS V WHERE V.idmodele = E.idmodele GROUP BY (V.libelle)";
    $res = mysqli_query($server, $req);
    echo "<table>";
    echo "<tr><th>Modele</th><th>Securite</th><th>Conduite</th><th>Confort</th><th>Nbr Tests</th></tr>";
    while ($row = mysqli_fetch_array($res)) {
        echo "<tr>";
        echo "<td>". $row[0] . "</td>";
        echo "<td>". $row[1] . "</td>";
        echo "<td>". $row[2] . "</td>";
        echo "<td>". $row[3] . "</td>";
        echo "<td>". $row[4] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
?>