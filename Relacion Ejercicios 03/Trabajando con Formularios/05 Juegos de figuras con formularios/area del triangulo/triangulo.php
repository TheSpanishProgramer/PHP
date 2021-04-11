<?php
$base = $_REQUEST["base"];
$altura = $_REQUEST ["altura"];
$AREA = ($base * $altura) / 2;
echo "El área del triángulo es ". $AREA. ".";
?>