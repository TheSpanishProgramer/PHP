<?php
$numero=$_REQUEST["numero"];
for($i=1;$i<=10;$i++)
{
	$resultado=$numero*$i;
	echo $i."x".$numero."=".$resultado."<p>";
}
?>