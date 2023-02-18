<?php

$base = mysqli_connect("localhost", "root", "", "prototype_sti23");

$query = "SELECT DISTINCT(idmodele), AVG(securite), AVG(conduite), AVG(confort), COUNT(idmodele) FROM evaluation GROUP BY idmodele";
$res = mysqli_query($base, $query);

?>
<table border="1" style="border-collapse: collapse; text-align: center;">
    <tr>
        <th>Modele</th>
        <th>Securite</th>
        <th>Conduite</th>
        <th>Confort</th>
        <th>Nbr Tests</th>
    </tr>
    <?php while ($row = mysqli_fetch_array($res)) { ?>
        <tr>
            <td><?php echo $row[0]; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[3]; ?></td>
            <td><?php echo $row[4]; ?></td>
        </tr>
    <?php } ?>
</table>

<?php
mysqli_close($base);
?>