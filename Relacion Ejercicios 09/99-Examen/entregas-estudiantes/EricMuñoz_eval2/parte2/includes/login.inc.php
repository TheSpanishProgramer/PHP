<?php
if(isset($_GET['error'])){
    if($_GET['error']==1){
        echo 'usuario o contraseña erroneos';
    }
}