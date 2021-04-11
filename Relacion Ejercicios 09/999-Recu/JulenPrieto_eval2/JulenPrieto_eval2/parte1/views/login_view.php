<?php include_once("partitials/header.php") ?>

<h1>Login</h1>

<form action="" method="post">

    <input type="hidden" id="accion" name="accion" value="login"/>
    <input type="text" name="usuario" id="usuario" placeholder="usuario"/>
    <input type="text" name="password" id="password" placeholder="password"/>
    <input type="submit" id="entrar" name="entrar" value="Entrar"/>



</form>

<?php include_once("partitials/footer.php") ?>
