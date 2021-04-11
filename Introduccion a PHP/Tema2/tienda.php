<?
$precio = 23;
$iva = 21;
$totaliva = 23*21/100;
$total = $precio+$totaliva;
echo "<table border='1'>";
$productos = array('gorra'=>10, 'nesquick'=>5, 'zapatos'=>27);
foreach ($productos as $clave => $valor)
{
echo "<tr><td>".$clave."</td><td>".$valor."</td></tr>";
}
echo "<tr><td>Subtotal: </td><td>".$precio."</td></tr>";
echo "<tr><td>Total iva (".$iva."): </td><td>".$totaliva."</td></tr>";
echo "<tr><td>Total: </td><td>".$total."</td></tr></table>";
?>