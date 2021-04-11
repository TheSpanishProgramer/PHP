<?php
// Tabla de 10 x 10 que genera colores aleatorios en cada celda y cada vez que cargue
// excepto en la primera
$filas = 10;
$columnas = 10;
function coloraleatorio() {
    return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
}
function dibujarTabla($filas, $columnas){
echo "<table border='0' align='center' cellpadding='4' cellspacing='4'>"; 

for($tr=1;$tr<=$filas;$tr++){ 

    echo "<tr>";
	        for($td=1;$td<=$columnas;$td++){
	        $colorfondo =  coloraleatorio();
			echo "<td align='center' bgcolor='$colorfondo'>".$tr*$td."</td>";
			
        } 
    echo "</tr>"; 
} 

echo "</table>";
}

dibujarTabla(10, 10);
?>