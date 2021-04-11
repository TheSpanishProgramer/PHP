<?php
switch($beer)
{
    case 'tuborg';
    case 'carlsberg';
    case 'heineken';
        echo 'Buena elección';
    break;
    default;
        echo 'Por favor haga una nueva selección...';
    break;
}
?>