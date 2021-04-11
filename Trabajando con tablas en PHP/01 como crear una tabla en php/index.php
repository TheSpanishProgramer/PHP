<table>
    <tr>
        <th>Nombre</th>
        <th>Apellido</th>
    </tr>
    <tr>
        <td>Ana</td>
        <td>Ortiz</td>
    </tr>
    <tr>
        <td>Pedro</td>
        <td>Duarte</td>
    </tr>
</table>

<?php
$nombre1   = "Adriana";
$apellido1 = "Ortiz";
$arr = array("Pedro", "Duarte");

echo "<table>";
echo "<tr>";
echo "  <th> Nombre  </th>";
echo "  <th> Apellido </th>";
echo "</tr>";
echo "<tr>";
echo "<td> " . $nombre1 . "</td>";
echo "<td> " . $apellido1 . "</td>";
echo "</tr>";
echo "<tr>  <td>" . $arr[0] . "</td> <td>" . $arr[1] ."</td>  </tr>" ;
echo "</table>";